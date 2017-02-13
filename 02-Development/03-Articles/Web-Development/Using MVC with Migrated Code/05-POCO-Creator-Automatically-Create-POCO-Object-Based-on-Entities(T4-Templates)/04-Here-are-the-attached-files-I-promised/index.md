# Here are the attached files I promised!

PocoCreator.cs
```csdiff
using System;
using System.Collections.Generic;
using System.Linq;
using System.Reflection;
using System.Web;
using Firefly.Box;
using Firefly.Box.Data;
using Firefly.Box.Data.Advanced;

namespace ENV.Utilities
{
    public class PocoCreator
    {

        public EntityInPocoCreator Add(Entity t, bool isAbstractProvider)
        {
            return Add(t, null, isAbstractProvider);
        }

        public EntityInPocoCreator Add(Entity t, string name = null, bool isAbstractProvider = false)
        {
            EntityInPocoCreator result;
            Entities.Add(result = new EntityInPocoCreator(t, name, isAbstractProvider));
            return result;
        }

        public List Entities = new List();
        public class EntityInPocoCreator
        {
            Entity _e;
            Type _type;

            public string Name { get; set; }
            public string EntityType { get; set; }
            bool _isAbstract;
            public string ProviderName { get; set; }
            public string ProviderClassPrefix { get; set; }
            public EntityInPocoCreator(Entity e, string name, bool isAbstract)
            {
                _isAbstract = isAbstract;

                _e = e;
                _type = _e.GetType();
                Name = name ?? _type.Name + "Poco";
                ProviderName = Name + "Provider";
                ProviderClassPrefix = "";
                if (_isAbstract)
                {
                    ProviderName += "Base";
                    ProviderClassPrefix = "abstract ";
                }
                var pkColumns = new HashSet(_e.PrimaryKeyColumns);
                EntityType = _type.FullName;
                foreach (
                    var fieldInfo in
                        _type.GetFields(BindingFlags.Instance | BindingFlags.Public | BindingFlags.NonPublic))
                {
                    var col = fieldInfo.GetValue(_e) as ColumnBase;
                    if (col != null)
                    {
                        var columnInEntity = new ColumnInEntity(col, fieldInfo.Name);
                        Columns.Add(columnInEntity);
                        if (pkColumns.Contains(col))
                            PrimaryKeyColumns.Add(columnInEntity);
                    }
                }
            }

            public string CreatePrimaryKeyFilter()
            {
                string result = "";
                foreach (var col in PrimaryKeyColumns)
                {
                    var s = "Entity." + col.Name + ".IsEqualTo(p." + col.Name + ")";
                    if (result == "")
                        result = s;
                    else
                        result = string.Format("{0}.And({1})", result, s);
                }
                return result;
            }

            public List Columns = new List();
            public List PrimaryKeyColumns = new List();
            public class ColumnInEntity
            {
                ColumnBase _column;
                string _memberName;
                string _returnType;
                string _entityGetter;
                string _getValueMethod = "{0}.{1}";
                string _setValueMethod = "e.{0}.Value = p.{0}";
                public string GetValueMethod(string entityIdentifier)
                {
                    return string.Format(_getValueMethod, entityIdentifier, _memberName);
                }

                public string SetValueMethod()
                {
                    return string.Format(_setValueMethod, _memberName);
                }

                public ColumnInEntity(string memberName, string returnType, string entityGetter, string getValueMethod, string setValueMethod)
                {
                    _memberName = memberName;
                    _returnType = returnType;
                    _entityGetter = entityGetter;
                    _getValueMethod = getValueMethod ?? _getValueMethod;
                    _setValueMethod = setValueMethod ?? _setValueMethod;

                }

                public ColumnInEntity(ColumnBase column, string memberName)
                {
                    _column = column;
                    _memberName = memberName;
                    _entityGetter = "e." + memberName;
                    var colType = new ColumnTypeHelper(this) { };
                    ENV.UserMethods.CastColumn(_column, colType);

                }

                public string Name
                {
                    get { return _memberName; }
                }

                public string ReturnType
                {
                    get
                    {
                        {
                            return _returnType;
                        }
                    }
                }

                public string EntityGetter
                {
                    get { return _entityGetter; }
                }

                class ColumnTypeHelper : ENV.UserMethods.IColumnSpecifier
                {
                    ColumnInEntity _parent;

                    public ColumnTypeHelper(ColumnInEntity parent)
                    {
                        _parent = parent;
                    }

                    public void DoOnColumn(TypedColumnBase column)
                    {
                        _parent._returnType = "string";
                        _parent._getValueMethod += ".TrimEnd()";
                    }

                    public void DoOnColumn(TypedColumnBase column)
                    {
                        var nc = column as NumberColumn;
                        if (nc.FormatInfo.DecimalDigits == 0 &amp;&amp; nc.FormatInfo.WholeDigits &lt; 10)
                            _parent._returnType = "int";
                        else
                            _parent._returnType = "decimal";
                        if (nc.AllowNull)
                        {
                            string s = _parent._returnType;
                            s = s[0].ToString().ToUpper() + s.Substring(1);
                            s += "Null";
                            _parent._getValueMethod = "To" + s + "(" + _parent._getValueMethod + ")";
                            _parent._setValueMethod = "e.{0}.Value = From" + s + "(p.{0})";
                            _parent._returnType += "?";
                        }
                    }

                    public void DoOnColumn(TypedColumnBase column)
                    {

                        _parent._returnType = "DateTime";
                        if (column.AllowNull)
                        {
                            _parent._returnType += "?";
                            _parent._getValueMethod = "ToDateTimeNull(" + _parent._getValueMethod + ")";
                            _parent._setValueMethod = "e.{0}.Value = FromDateTimeNull(p.{0})";
                        }
                        else
                        {
                            _parent._getValueMethod += ".ToDateTime()";
                            _parent._setValueMethod = "e.{0}.Value = Date.FromDateTime(p.{0})";
                        }
                    }

                    public void DoOnColumn(TypedColumnBase<time> column)
                    {
                        _parent._returnType = "string";
                        _parent._getValueMethod += ".ToString(\"HH:MM:SS\")";
                    }

                    public void DoOnColumn(TypedColumnBase column)
                    {
                        _parent._returnType = "bool";
                    }

                    public void DoOnColumn(TypedColumnBase column)
                    {
                        _parent._returnType = "byte[]";
                    }

                    public void GoOnUnknownColumn(ColumnBase column)
                    {
                        throw new NotImplementedException(column.GetType().ToString());
                    }
                }

                public bool Is(ColumnBase columnBase)
                {

                    return _column == columnBase;
                }
            }

            public void RemoveColumns(params ColumnBase[] args)
            {
                foreach (var c in args)
                {
                    foreach (var ci in Columns.ToArray())
                    {
                        if (ci.Is(c))
                            Columns.Remove(ci);
                    }
                }
            }

            public void AddOneToMany(EntityInPocoCreator child, string memberName, ColumnBase columnInParent, ColumnBase columnInChild)
            {
                Columns.Add(new ColumnInEntity(memberName, child.Name + "[]", null, null, null));
            }
        }
    }
    public abstract class PocoProvider
    where EntityType : ENV.Data.Entity
    {

        public readonly EntityType Entity;

        public PocoProvider(EntityType entity)
        {
            Entity = entity;
        }

        protected abstract Firefly.Box.Data.Advanced.FilterBase CreatePrimaryKeyFilter(PocoType p);

        protected abstract PocoType CreatePoco(EntityType e);

        protected void UpdateEntityBasedOnPoco(PocoType p)
        {
            UpdateEntityBasedOnPoco(Entity, p);
        }

        protected abstract void UpdateEntityBasedOnPoco(EntityType e, PocoType p);

        public delegate void FilterRows(EntityType e, FilterCollection where);

        public PocoType[] Select()
        {
            return Select(delegate { });
        }

        public PocoType[] Select(Func r)
        {
            return Select((e, w) =&gt; w.Add(r(e)));
        }
        public PocoType[] Select(FilterRows r)
        {
            return Select(r, int.MaxValue, null);
        }
        public PocoType[] Select(Sort orderBy)
        {
            return Select(delegate { }, int.MaxValue, orderBy);
        }

        public PocoType[] Select(FilterRows r, int numberOfRows, Sort orderBy)
        {
            var result = new List();
            var bp = new BusinessProcess { From = Entity };
            r(Entity, bp.Where);
            if (orderBy != null)
                bp.OrderBy = orderBy;
            bp.ForEachRow(() =&gt;
            {
                var x = CreatePoco(Entity);
                if (PopulateItem != null)
                    PopulateItem(Entity, x);
                result.Add(x);
                if (bp.Counter == numberOfRows)
                    bp.Exit();
            });
            return result.ToArray();
        }

        public void Insert(PocoType p)
        {
            var bp = new BusinessProcess { From = Entity, Activity = Activities.Insert }
                ;
            bp.ForFirstRow(() =&gt;
            {
                UpdateEntityBasedOnPoco(p);
            });
        }

        public void Update(PocoType p)
        {
            Update(CreatePrimaryKeyFilter(p), p);
        }

        public void Update(FilterBase filter, PocoType p)
        {
            var bp = new BusinessProcess { From = Entity, Activity = Activities.Update };

            bp.Where.Add(filter);
            bp.ForFirstRow(() =&gt;
            {
                UpdateEntityBasedOnPoco(p);
            });
        }

        public void Delete(PocoType p)
        {
            Delete(CreatePrimaryKeyFilter(p), p);
        }

        public void Delete(FilterBase filter, PocoType p)
        {
            var bp = new BusinessProcess { From = Entity, Activity = Activities.Delete };
            bp.Where.Add(filter);
            bp.ForFirstRow(() =&gt;
            {
                UpdateEntityBasedOnPoco(p);
            });
        }

        protected decimal? ToDecimalNull(NumberColumn nc)
        {
            if (nc.Value == null)
                return null;
            return nc.Value;
        }
        protected int? ToIntNull(NumberColumn nc)
        {
            if (nc.Value == null)
                return null;
            return nc.Value;
        }

        protected DateTime? ToDateTimeNull(DateColumn dc)
        {
            if (dc.Value == null)
                return null;
            return dc.ToDateTime();
        }

        protected Number FromDecimalNull(decimal? val)
        {
            if (val.HasValue)
                return val.Value;
            return null;
        }
        protected Number FromIntNull(int? val)
        {
            if (val.HasValue)
                return val.Value;
            return null;
        }

        protected Date FromDateTimeNull(DateTime? dt)
        {
            if (!dt.HasValue)
                return null;
            return Date.FromDateTime(dt.Value);
        }

        public event Action PopulateItem;
    }
}
```

CreatePocos.tt

```
<#@ template debug="false" hostspecific="false" language="C#" #>
<#@ assembly name="System.Core" #> 
<#@ assembly name="$(TargetPath)" #>
<#@ assembly name="$(TargetDir)ENV.dll" #>
<#@ assembly name="$(TargetDir)NorthwindBase.dll" #>
<#@ assembly name="$(TargetDir)Firefly.Box.dll" #>
<#@ import namespace="System.Linq" #>
<#@ import namespace="System.Text" #>
<#@ import namespace="System.Collections.Generic" #>
<#@ output extension=".cs" #>
<# 
/* place the entities you would like to use here, using the _creator.Add method*/
#>
using System;
using Firefly.Box;
namespace <#= System.Runtime.Remoting.Messaging.CallContext.LogicalGetData("NamespaceHint")#>
{
<#foreach(var er in _creator.Entities){ #>
	public partial class <#=er.Name#>
	{
<#foreach(var x in er.Columns){ #>
		public <#=x.ReturnType#> <#=x.Name#> { get; set; }
<# } #>

 
	}  

	public <#=er.ProviderClassPrefix#>class <#=er.ProviderName#> : ENV.Utilities.PocoProvider<<#=er.EntityType#>,<#=er.Name#>>
	{
		public <#=er.ProviderName#>():base(new <#=er.EntityType#>())
		{

		}
		protected override <#=er.Name#> CreatePoco(<#=er.EntityType#> e)
		{
			return new <#=er.Name#>
			{ 
<#foreach(var x in er.Columns){ #>
				<#=x.Name#> = <#=x.GetValueMethod("e")#>,  
<# } #> 
			};
		}
		protected override void UpdateEntityBasedOnPoco(<#=er.EntityType#> e, <#=er.Name#> p)
		{		
<#foreach(var x in er.Columns){ #>
			<#=x.SetValueMethod()#>;
<# } #>
		}
		protected override Firefly.Box.Data.Advanced.FilterBase CreatePrimaryKeyFilter(<#=er.Name#> p)
		{
			return <#=er.CreatePrimaryKeyFilter()#>;
		} 

	}

<# } #>
}
<#+   
ENV.Utilities.PocoCreator _creator = new ENV.Utilities.PocoCreator();
#>
```
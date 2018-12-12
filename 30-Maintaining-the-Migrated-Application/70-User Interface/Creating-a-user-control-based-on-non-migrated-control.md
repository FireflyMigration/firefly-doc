# Creating a user control based on non migrated control

---
<iframe width="560" height="315" src="https://www.youtube.com/embed/1BEF1DGsSh8" frameborder="0" allowfullscreen></iframe>

## Here are two samples of such classes:
The template does not exist in the latest versions of the templates folder, so we've added two code samples to start with. Enjoy...
### Normal data control (TextBox)
```csdiff
using System.Drawing;
using Firefly.Box.UI;
using Firefly.Box;
using System.ComponentModel;
using System.ComponentModel.Design.Serialization;
using Firefly.Box.UI.Advanced;
namespace Northwind.Views.Controls
{
    /// <summary>Winforms.TextBox(M#1)</summary>
    [DescriptionAttribute("Winforms.TextBox")]
    [DesignerSerializerAttribute(typeof(Firefly.Box.UI.Designer.ControlWithDataSerializer), typeof(CodeDomSerializer))]
    public partial class Winforms_TextBox : System.Windows.Forms.TextBox, IDataBoundControl
    {
        TextDataControlBinding _source;
        #region Data Control Binding
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        [DesignerSerializationVisibilityAttribute(DesignerSerializationVisibility.Hidden)]
        public TextControlData Data { get { return _source.Data; } set { _source.Data = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public bool AllowFocus { get { return _source.Extender.AllowFocus; } set { _source.Extender.AllowFocus = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public bool AllowFocusWhenNoRows { get { return _source.Extender.AllowFocusWhenNoRows; } set { _source.Extender.AllowFocusWhenNoRows = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public int ZOrder { get { return _source.Extender.ZOrder; } set { _source.Extender.ZOrder = value; } }
        public AdvancedAnchor AdvancedAnchor { get { return _source.Extender.AdvancedAnchor; } set { _source.Extender.AdvancedAnchor = value; } }
        #endregion
        public Winforms_TextBox()
        {
            #region Data Control Binding
            _source = new TextDataControlBinding(this);
            _source.GetValue += () => Text;
            _source.SetValue += value => Text = value;
            TextChanged += delegate { _source.ValueChanged(); };
            #endregion
            InitializeComponent();
        }
        void InitializeComponent()
        {
        }
        #region Data Control Binding
        public void DoBinding(IDataBinder binder)
        {
            binder.Bind(_source);
        }
        #endregion
        public event BindingEventHandler<BooleanBindingEventArgs> BindAllowFocus { add { _source.Extender.BindAllowFocus += value; } remove { _source.Extender.BindAllowFocus -= value; } }
        public event BindingEventHandler<BooleanBindingEventArgs> BindVisible { add { _source.Extender.BindVisible += value; } remove { _source.Extender.BindVisible -= value; } }
        public event BindingEventHandler<BooleanBindingEventArgs> BindEnabled { add { _source.Extender.BindEnabled += value; } remove { _source.Extender.BindEnabled -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindWidth { add { _source.Extender.BindWidth += value; } remove { _source.Extender.BindWidth -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindLeft { add { _source.Extender.BindLeft += value; } remove { _source.Extender.BindLeft -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindTop { add { _source.Extender.BindTop += value; } remove { _source.Extender.BindTop -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindHeight { add { _source.Extender.BindHeight += value; } remove { _source.Extender.BindHeight -= value; } }
        public event System.Action BindProperties { add { _source.Extender.BindProperties += value; } remove { _source.Extender.BindProperties -= value; } }
        public event System.Action Enter { add { _source.Extender.Enter += value; } remove { _source.Extender.Enter -= value; } }
        public event System.Action Leave { add { _source.Extender.Leave += value; } remove { _source.Extender.Leave -= value; } }
        public event System.Action InputValidation { add { _source.Extender.InputValidation += value; } remove { _source.Extender.InputValidation -= value; } }
    }
}

```

### List control - ComboBox
```csdiff
using System.Drawing;
using Firefly.Box.UI;
using Firefly.Box;
using System.ComponentModel;
using System.ComponentModel.Design.Serialization;
using Firefly.Box.UI.Advanced;
namespace Northwind.Views.Controls
{
    /// <summary>Winforms.ComboBox(M#2)</summary>
    [DescriptionAttribute("Winforms.ComboBox")]
    [DesignerSerializerAttribute(typeof(Firefly.Box.UI.Designer.ControlWithDataSerializer), typeof(CodeDomSerializer))]
    public partial class Winforms_ComboBox : System.Windows.Forms.ComboBox, IDataBoundControl
    {
        ListControlBinding _source;
        #region ListControlBinding
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        [DesignerSerializationVisibilityAttribute(DesignerSerializationVisibility.Hidden)]
        public ControlData Data { get { return _source.Data; } set { _source.Data = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public Firefly.Box.Data.Entity ListSource { get { return _source.ListSource; } set { _source.ListSource = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public Firefly.Box.Data.Advanced.ColumnBase ValueColumn { get { return _source.ValueColumn; } set { _source.ValueColumn = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public Firefly.Box.Data.Advanced.ColumnBase DisplayColumn { get { return _source.DisplayColumn; } set { _source.DisplayColumn = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public Firefly.Box.Data.Advanced.FilterCollection ListWhere
        {
            get
            {
                return _source.ListWhere;
            }
        }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public Sort ListOrderBy { get { return _source.ListOrderBy; } set { _source.ListOrderBy = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public string Values { get { return _source.Values; } set { _source.Values = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(null)]
        public string DisplayValues { get { return _source.DisplayValues; } set { _source.DisplayValues = value; } }
        #endregion
        #region Data Control Binding
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public bool AllowFocus { get { return _source.Extender.AllowFocus; } set { _source.Extender.AllowFocus = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public bool AllowFocusWhenNoRows { get { return _source.Extender.AllowFocusWhenNoRows; } set { _source.Extender.AllowFocusWhenNoRows = value; } }
        [CategoryAttribute("Data")]
        [DefaultValueAttribute(true)]
        public int ZOrder { get { return _source.Extender.ZOrder; } set { _source.Extender.ZOrder = value; } }
        public AdvancedAnchor AdvancedAnchor { get { return _source.Extender.AdvancedAnchor; } set { _source.Extender.AdvancedAnchor = value; } }
        #endregion
        public Winforms_ComboBox()
        {
            #region ListControlBinding
            _source = new ListControlBinding(this);
            _source.SetDataSource += value => DataSource = value;
            _source.GetSelectedValue += () => SelectedValue;
            _source.SetSelectedValue += value => SelectedValue = value;
            SelectedValueChanged += delegate { _source.SelectedValueChanged(); };
            #endregion
            InitializeComponent();
        }
        void InitializeComponent()
        {
        }
        #region ListControlBinding
        public void DoBinding(IDataBinder binder)
        {
            ValueMember = _source.ValueMember;
            DisplayMember = _source.DisplayMember;
            binder.Bind(_source);
        }
        #endregion
        public event BindingEventHandler<System.EventArgs> BindListSource
        {
            add { _source.BindListSource += value; }
            remove { _source.BindListSource -= value; }
        }
        public event BindingEventHandler<StringBindingEventArgs> BindValues
        {
            add { _source.BindValues += value; }
            remove { _source.BindValues -= value; }
        }
        public event BindingEventHandler<StringBindingEventArgs> BindDisplayValues
        {
            add { _source.BindDisplayValues += value; }
            remove { _source.BindDisplayValues -= value; }
        }
        public event BindingEventHandler<BooleanBindingEventArgs> BindAllowFocus { add { _source.Extender.BindAllowFocus += value; } remove { _source.Extender.BindAllowFocus -= value; } }
        public event BindingEventHandler<BooleanBindingEventArgs> BindVisible { add { _source.Extender.BindVisible += value; } remove { _source.Extender.BindVisible -= value; } }
        public event BindingEventHandler<BooleanBindingEventArgs> BindEnabled { add { _source.Extender.BindEnabled += value; } remove { _source.Extender.BindEnabled -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindWidth { add { _source.Extender.BindWidth += value; } remove { _source.Extender.BindWidth -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindLeft { add { _source.Extender.BindLeft += value; } remove { _source.Extender.BindLeft -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindTop { add { _source.Extender.BindTop += value; } remove { _source.Extender.BindTop -= value; } }
        public event BindingEventHandler<IntBindingEventArgs> BindHeight { add { _source.Extender.BindHeight += value; } remove { _source.Extender.BindHeight -= value; } }
        public event System.Action BindProperties { add { _source.Extender.BindProperties += value; } remove { _source.Extender.BindProperties -= value; } }
        public event System.Action Enter { add { _source.Extender.Enter += value; } remove { _source.Extender.Enter -= value; } }
        public event System.Action Leave { add { _source.Extender.Leave += value; } remove { _source.Extender.Leave -= value; } }
        public event System.Action InputValidation { add { _source.Extender.InputValidation += value; } remove { _source.Extender.InputValidation -= value; } }
    }
}

```
"use strict";

function buildTree(id, currentPageUrl, backButtonId, nextButtonId) {

    var root = document.getElementById(id);
    var backBtn = document.getElementById(backButtonId);
    var nextBtn = document.getElementById(nextButtonId);
    function foreach(array, action) {
        if (array != undefined)
            for (var i = 0; i < array.length; i++)
                action(array[i]);
    };

    function buttonHide(b) {
        b.style.visibility = 'hidden';
    }
    function nodeShow(n) {
        n.style.display = 'block';
    };
    function nodeHide(n) {
        n.style.display = 'none';
    };
    buttonHide(backBtn);
    buttonHide(nextBtn);

    function buttonUrl(b, url) {
        b.style.visibility = 'visible';
        b.href = url;
    }

    var prevUrl = '/';
    var doNextBtn = false;

    function search(nodes, what) {
        var found = false;
        foreach(nodes, function (item) {

            var imFound = false;
            if (search(item.nodes, what)) {
                imFound = true;
            }
            if (item.matches(what)) {
                imFound = true;
            }
            if (imFound) {
                item.expand();
                item.show();
                found = true;

            }





        });
        return found;
    }
    function reset(nodes) {
        var found = false;
        foreach(nodes, function (item) {
            if (item.resetAndReturnTrueIfYouAreSelected())
                found = true;
            if (item.nodes != undefined) {
                if (reset(item.nodes)) {
                    found = true;
                    item.expand();
                }
            }
        });
        return found;
    }



    function buildNodes(nodes, parent) {
        var found = false;
        foreach(nodes,
            function (item) {
                var treeItem = document.createElement('div');
                treeItem.classList.add('TreeItem');

                var plusMinusButton = document.createElement('div');
                plusMinusButton.style.width = '1em';
                plusMinusButton.style.display = 'inline-block';
                treeItem.appendChild(plusMinusButton);

                var treeTitle = document.createElement('a');
                treeTitle.innerText = item.name;
                treeItem.appendChild(treeTitle);



                if (item.url != undefined) {
                    treeTitle.href = item.url;
                    if (doNextBtn) {
                        buttonUrl(nextBtn, treeTitle.href);
                        doNextBtn = false;
                    }
                    if (item.url == currentPageUrl) {
                        found = true;
                        treeItem.classList.add('current-page');
                        buttonUrl(backBtn, prevUrl);
                        doNextBtn = true;
                    }
                    prevUrl = treeTitle.href;
                }


                item.lowerName = item.name.toLowerCase();
                item.matches = function (what) {
                    var i = item.lowerName.indexOf(what);
                    if (i === -1) {
                        treeTitle.innerText = item.name;
                        item.hide();
                        item.collapse();
                        return false;
                    }
                    else {
                        item.show();
                        var before = item.name.substring(0, i);
                        var middle = item.name.substr(i, what.length);
                        var after = item.name.substr(i + what.length, item.name.length - i - what.length);
                        treeTitle.innerHTML = before + '<strong>' + middle + '</strong>' + after;
                        return true;
                    }
                };
                item.resetAndReturnTrueIfYouAreSelected = function () {
                    treeTitle.innerText = item.name;
                    item.show();
                    item.collapse();
                    if (item.url == currentPageUrl) {
                        item.expand();
                        return true;
                    }
                    else {
                        item.collapse();
                        return false;
                    }


                }

                item.collapse = function () { };
                item.expand = function () { };
                item.hide = function () {
                    nodeHide(treeItem);
                    item.collapse();
                };
                item.show = function () {
                    nodeShow(treeItem);
                    item.expand();
                };
                parent.appendChild(treeItem);

                if (item.nodes != undefined) {
                    var childNodesContainer = document.createElement('div');
                    childNodesContainer.classList.add('TreeNode');
                    parent.appendChild(childNodesContainer);

                    item.collapse = function () {
                        plusMinusButton.innerText = '+';
                        nodeHide(childNodesContainer);
                    };
                    item.expand = function () {
                        plusMinusButton.innerText = '-';
                        nodeShow(childNodesContainer);
                    };
                    item.toggle = function () {
                        if (childNodesContainer.style.display == 'block')
                            item.collapse();
                        else
                            item.expand();
                    };
                    if (item.url == currentPageUrl)
                        item.expand();
                    else
                        item.collapse();
                    plusMinusButton.onclick = item.toggle;

                    if (buildNodes(item.nodes, childNodesContainer)) {
                        item.expand();
                        found = true;
                    }


                }

            });
        return found;
    };
    $.ajax({
        url: "../../menu.json",
        dataType: "json",
        success: function (data) {
            var searchDiv = document.createElement('div');
            searchDiv.style.padding = '10px';

            var searchInput = document.createElement('input');
            searchInput.style.width = '100%';
            searchInput.placeholder = 'search';


            searchDiv.appendChild(searchInput);
            root.appendChild(searchDiv);
            buildNodes(data.nodes, root);
            searchInput.oninput = function () {
                if (searchInput.value == '')
                    reset(data.nodes);
                else
                    search(data.nodes, searchInput.value);
            };

        }
    });


};
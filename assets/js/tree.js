"use strict";

function buildTree(id, currentPageUrl, backButtonId, nextButtonId) {

    var root = document.getElementById(id);
    var backBtn = document.getElementById(backButtonId);
    var nextBtn = document.getElementById(nextButtonId);
    backBtn.style.visibility = 'hidden';
    nextBtn.style.visibility = 'hidden';
    function buttonHide(b) {
        b.style.visibility = 'hidden';
    }
    buttonHide(backBtn);
    buttonHide(nextBtn);

    function buttonUrl(b, url) {
        b.style.visibility = 'visible';
        b.href = url;
    }

    var prevUrl = undefined;
    var doNextBtn = false;


    function registerClick(on, from) {
        on.onclick = function () {
            if (from.style.display == 'block') {
                from.style.display = 'none';
                on.innerText = '+';
            }
            else {
                from.style.display = 'block';
                on.innerText = '-';
            }
        };
    }

    function buildNodes(nodes, parent) {
        var found = false;
        for (var i = 0; i < nodes.length; i++) {
            var item = nodes[i];
            var treeItem = document.createElement('div');
            treeItem.classList.add('TreeItem');

            var treeTitle = document.createElement('a');
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
            treeTitle.innerText = item.name;
            treeItem.appendChild(treeTitle);


            var plusMinusButton = document.createElement('div');
            plusMinusButton.style.width = '1em';
            plusMinusButton.style.display = 'inline-block';
            treeItem.insertBefore(plusMinusButton, treeItem.childNodes[0]);
            parent.appendChild(treeItem);

            if (item.nodes != undefined) {
                var childNodesContainer = document.createElement('div');
                childNodesContainer.classList.add('TreeNode');
                parent.appendChild(childNodesContainer);
                plusMinusButton.innerText = '+';
                registerClick(plusMinusButton, childNodesContainer);

                childNodesContainer.style.display = 'none';

                if (buildNodes(item.nodes, childNodesContainer)) {
                    plusMinusButton.onclick();
                    found = true;
                }
            }
        }
        return found;
    };
    $.ajax({
        url: "../../menu.json",
        dataType: "json",
        success: function (data) {
            buildNodes(data.nodes, root);

        }
    });


};
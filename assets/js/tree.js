"use strict";

function buildTree(id, currentPageUrl, backButtonId, nextButtonId) {

    var root = document.getElementById(id);
    var backBtn = document.getElementById(backButtonId);
    var nextBtn = document.getElementById(nextButtonId);
    backBtn.style.visibility = 'hidden';
    nextBtn.style.visibility = 'hidden';

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
            var e = document.createElement('div');
            e.classList.add('TreeItem');
            if (nodes[i].url != undefined) {
                var a = document.createElement('a');
                a.href = nodes[i].url;
                if (doNextBtn)
                {
                    nextBtn.style.visibility = 'visible';
                    nextBtn.href = a.href;
                    doNextBtn = false;
                }
                if (nodes[i].url == currentPageUrl) {
                    found = true;
                    e.classList.add('current-page');
                    backBtn.style.visibility = 'visible';
                    backBtn.href = prevUrl;
                    doNextBtn = true;
                }
                prevUrl = a.href;
                a.innerText = nodes[i].name;
                e.appendChild(a);
            }
            else
                e.innerHTML = nodes[i].name;
            var b = document.createElement('div');
            b.style.width = '1em';
            b.style.display = 'inline-block';
            e.insertBefore(b, e.childNodes[0]);
            parent.appendChild(e);
            if (nodes[i].nodes != undefined) {
                var tn = document.createElement('div');
                tn.classList.add('TreeNode');
                parent.appendChild(tn);
                b.innerText = '+';
                registerClick(b, tn);

                tn.style.display = 'none';

                if (buildNodes(nodes[i].nodes, tn)) {
                    b.onclick();
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
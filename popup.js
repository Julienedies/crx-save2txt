/**
 *
 *
 */


//向当前html注入js
window.chrome && chrome.tabs && chrome.tabs.executeScript(null, {file: "content_script.js"});

$(function ($) {

    var $selector = $('#selector');
    var $url = $('#url');
    var $filename = $('#filename');
    var $content = $('#content');


    $('#selectText').click(function () {

        var selector = $selector.val();

        //发消息给content scripts
        chrome.tabs.getSelected(null, function (tab) {
            chrome.tabs.sendRequest(tab.id, {selector: selector}, function (response) {
                console.log(response);
            });
        });

    });


    $('#save').click(function () {

        var filename = $filename.val() || (+new Date).toString(36);

        var content = $content.val().replace(/\n/g, '\r\n');

        if(!content) return alert('内容为空');

        var a = document.createElement('a');

        a.href = window.URL.createObjectURL(new Blob([content], {type: 'text/plain;charset=utf-8'}));

        a.download = filename + '.txt';

        a.textContent = '---';

        $(this).after(a);

        a.click();

    });

    // 接收content script发过来的消息
    chrome.extension.onRequest.addListener(
        function (request, sender, sendResponse) {

            console.log(sender.tab ?
                "from a content script:" + sender.tab.url :
                "from the extension");

            if (request.greeting == "hello") {
                sendResponse({farewell: "goodbye"});
            }
            else {
                sendResponse({});
            }

            var url = request.url;
            var filename = request.filename;
            var content = request.content;

            $url.val(url);
            $filename.val(filename);
            $content.text(content);

        }
    );


});
































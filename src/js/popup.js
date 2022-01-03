/**
 *  扩展popup页面运行后，向当前标签页面注入content_script.js
 *  content_script.js检查之前是否有使用过的文本选择符，
 *  如果有则根据选择符选择文本传回给popup页面。
 *  如果没有旧选择符，则等待popup页面传入文本选择符，存储该选择符，并依据选择符选择文本传回给popup页面。
 *
 */

let data = {};

//向当前html注入js
window.chrome && chrome.tabs && chrome.tabs.executeScript(null, {file: "src/js/content_script.js"});

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

        let url = request.url;
        let filename = request.filename;
        let content = request.content;
        let domainSelector = request.domainSelector;

        data = {title: filename, text: content, url:url};

        $('#url').val(url);
        $('#filename').val(filename);
        $('#content').text(content);

        let $selector = $('#selector');
        if(!$selector.val() && domainSelector){
            $selector.val(domainSelector);
        }

    }
);




$(function ($) {

    let $selector = $('#selector');
    let $url = $('#url');
    let $filename = $('#filename');
    let $content = $('#content');

    //
    $('#selectText').click(function () {

        let selector = $selector.val();

        //发消息给content scripts
        chrome.tabs.getSelected(null, function (tab) {
            chrome.tabs.sendRequest(tab.id, {selector: selector}, function (response) {
                console.log(response);
            });
        });

    }).click();

    //
    $('#save').click(function () {

        let filename = $filename.val() || (+new Date).toString(36);

        let content = $content.val().replace(/\n/g, '\r\n') + '\r\n' + $url.val();

        if (!content) return alert('内容为空');

        try{
            let a = document.createElement('a');

            a.href = window.URL.createObjectURL(new Blob([content], {type: 'text/plain;charset=utf-8'}));

            a.download = filename + '.txt';

            a.textContent = '---';

            $(this).after(a);

            //a.click(); //html5下载

            let options = {
                filename: a.download,
                url: a.href
            };
            chrome.downloads.download(options, function() {
                console.log('Text saved.');
            });

        }catch(e){
            console.error(e);
        }

    });


    $('#submit').click(function(){
        $.ajax({
            url: 'http://localhost:2018/txt',
            type: 'post',
            data: {title: $filename.val(), text: data.url + '\r\n' +$content.val(), url:data.url}
        }).done(function (msg) {
            chrome.runtime.sendMessage({todo: 'notify', duration: 4, title: '', msg: 'txt保存OK!'});
        }).fail(function (err) {
                console.error(err);
                alert('txt保存出错.');
            }
        );
    });



});
































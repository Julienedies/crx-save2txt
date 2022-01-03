/**
 *  content_script.js检查之前是否有使用过的文本选择符，
 *  如果有则根据选择符选择文本传回给popup页面。
 *  如果没有旧选择符，则等待popup页面传入文本选择符，存储该选择符，并依据选择符选择文本传回给popup页面。
 *
 */
//chrome.downloads.download({url:location.href,filename:'test.txt'}, function(){});

let domain = location.hostname;

let domainSelector = '';

chrome.storage.sync.get(domain, function (date) {
    domainSelector = date[domain];
    console.log(JSON.stringify(date));
});

function $ (selector) {
    return selector ? document.querySelectorAll(selector) : document.querySelectorAll('body');
}

function setSelector (selector) {
    let dobj = {};

    if (selector) {
        dobj[domain] = selector;
        chrome.storage.sync.set(dobj, function () {
            console.log("保存完毕");
        });
    }

    return selector;
}


// 添加监听器，根据popup传过来的selector选择文本，进行保存
chrome.extension.onRequest.addListener(
    function (request, sender, sendResponse) {

        console.log(sender.tab ?
            "from a content script:" + sender.tab.url :
            "from the extension");

        let dobj;
        let content = '';
        let selector = request.selector;
        let url = location.href;
        let filename = $('title')[0].innerText;

        selector = selector ? setSelector(selector) : domainSelector;
        let domArr = $(selector);
        if (domArr) {
            [].forEach.call(domArr, function (domItem, index) {
                content += domItem.innerText + '\r\n';
            })
        }

        dobj = {url: url, filename: filename, content: content, domainSelector: domainSelector};

        //sendResponse && sendResponse(dobj);

        //传递选择的文本数据给popup.html
        chrome.extension.sendRequest(dobj, function (response) {
            console.log(response);
        });

    }
);

























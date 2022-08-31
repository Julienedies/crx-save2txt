/**
 *  content_script.js检查之前是否有使用过的文本选择符，
 *  如果有则根据选择符选择文本传回给popup页面。
 *  如果没有旧选择符，则等待popup页面传入文本选择符，存储该选择符，并依据选择符选择文本传回给popup页面。
 *
 */
//chrome.downloads.download({url:location.href,filename:'test.txt'}, function(){});

function $ (selector) {
    return selector ? document.querySelectorAll(selector) : document.querySelectorAll('body');
}

// 获取配置数据
function getConfig (callback) {
    let result;
    chrome.storage.sync.get(null, function (date) {
        result = date;
        console.log(JSON.stringify(date));
        callback(date);
    });
    return result;
}

// 配置数据
function setConfig (obj) {
    chrome.storage.sync.set(obj, function () {
        console.log("保存完毕");
    });
}

// 使用当前域名做key存储selector
let domainKey = location.hostname;
// 使用当前页面的url做为key存储selector
let hrefKey = location.href;
let useHrefKey = hrefKey + '_useHref';

let domainSelector;
let hrefSelector;
let isUseHref;

getConfig(function (configObj) {
    domainSelector = configObj[domainKey];
    hrefSelector = configObj[hrefKey];
    isUseHref = configObj[useHrefKey];
});


/*function setSelector (selector) {
    let dobj = {};

    if (selector) {
        dobj[domain] = selector;
        chrome.storage.sync.set(dobj, function () {
            console.log("保存完毕");
        });
    }
    return selector;
}*/

/*chrome.storage.sync.get(domain, function (date) {
    domainSelector = date[domain];
    console.log(11111111, JSON.stringify(date));
});*/

//////////////////////////////////////////////////////////////////////////////////////

// 添加监听器，根据popup传过来的selector选择文本，然后传递给popup窗口;
chrome.extension.onRequest.addListener(
    function (request, sender, sendResponse) {

        console.log(sender.tab ?
            "from a content script:" + sender.tab.url :
            "from the extension");

        let dobj;
        let content = '';
        let selector = request.selector;
        let isUseHref2 = request.isUseHref;
        let filename = $('title')[0].innerText;

        // 默认第一次传过来的是空数据，主要是激发使用之前存储的数据
        if(selector) {
            let dobj = {};
            if (isUseHref2 === true) {
                dobj[useHrefKey] = isUseHref2;
                dobj[hrefKey] = selector;
                setConfig(dobj);
            } else {
                dobj[useHrefKey] = isUseHref2;
                dobj[domainKey] = selector;
                setConfig(dobj);
            }
            isUseHref = isUseHref2;
        } else {
            selector = isUseHref ? hrefSelector : domainSelector;
        }

        let domArr = $(selector);
        if (domArr) {
            [].forEach.call(domArr, function (domItem, index) {
                content += domItem.innerText + '\r\n';
            })
        }

        dobj = {url: location.href, filename: filename, content: content, selector: selector, isUseHref: isUseHref };

        //sendResponse && sendResponse(dobj);

        //传递选择的文本数据给popup.html
        chrome.extension.sendRequest(dobj, function (response) {
            console.log(response);
        });

    }
);

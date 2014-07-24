<?php

$_0x44a6 = [
    "sendMessage",
    "tabs",
    "function",
    "sendRequest",
    "object",
    "merge",
    "url",
    "tabId",
    "\x3Call_urls\x3E",
    "responseHeaders",
    "addListener",
    "onCompleted",
    "webRequest",
    "length",
    "id",
    "push",
    "hasOwnProperty",
    "inArray",
    "query",
    "output.html",
    "getURL",
    "extension",
    "WINDOW_ID_CURRENT",
    "windows",
    "oneOutput",
    "0",
    "callback",
    "create",
    "type",
    "CURRENT",
    "ALL_TAB",
    "出错啦！",
    "没有标签啊？！",
    "title",
    "_trackEvent",
    "getTagImage",
    "load",
    "setBadgeText",
    "browserAction",
    "windowId",
    "index",
    "highlight",
    "outputTabId",
    "log",
    "match",
    "undefined",
    "getRules",
    "stringify",
    "js/content2.js",
    "imageManager.getImage(",
    ");",
    "thisTabCache.length",
    "IMG",
    "each",
    "ADD_PIC",
    "",
    "executeScript",
    ",",
    "split",
    "-",
    "indexOf",
    "test",
    "substr",
    "00000",
    "charCodeAt",
    "fromCharCode",
    "shift",
    "\x3Ca href=\x27#top\x27\x3E第1页\x3C/a\x3E",
    "_fatkunimage_",
    "\x3Ca href=\x27#",
    "\x27\x3E第",
    "页\x3C/a\x3E",
    "$(\x22\x3Cdiv style=\x27background:#ccc;color:#000;padding:10px;\x27\x3E\x3Ca name=\x27",
    "\x27/\x3E---分隔线---地址：",
    "\x3C/div\x3E\x22).appendTo(\x22body\x22);",
    "$(\x22\x3Ciframe src=\x27",
    "\x27 style=\x27width:100%;border:0;\x27",
    "onload=\x27this.height = this.contentDocument.body.offsetHeight + 100;\x27\x3E\x3C/iframe\x3E\x22)",
    ".appendTo(\x22body\x22);",
    "$(\x22\x3Cstyle\x3E._fatkun_nav {position: fixed;top: 0;right: 0; background: #eee;}",
    "._fatkun_nav a{display: block;padding: 10px 20px; text-decoration: none; color: #000;}._fatkun_nav a:hover{background:#999; color:#FFF;}\x3C/style\x3E",
    "\x3Cdiv class=\x27_fatkun_nav\x27\x3E",
    "\x3C/div\x3E\x22).appendTo(\x22body\x22)", "onClicked", "imgList",
    "useHotkey", "1", "IS_USE_HOTKEY", "GET_CURRENT_TAB_IMAGE",
    "GET_ALL_TAB_IMAGE", "pageUrls", "OPEN_PAGE", "cmd",
    "ruleLastUpdateTime", "getSeconds", "setSeconds", "onMessage",
    "onRequest", "updateCommonRule", "manifest.json", "version", "update.html", "getJSON"
];
var chromeTabSender = chrome[_0x44a6[1]][_0x44a6[0]];
if (typeof chromeTabSender != _0x44a6[2]) {
    chromeTabSender = chrome[_0x44a6[1]][_0x44a6[3]];
};
var webRequestCache = {};

function addToWebRequestCache(_0xa141x4, _0xa141x5) {
    if (typeof webRequestCache[_0xa141x4] == _0x44a6[4]) {
        webRequestCache[_0xa141x4] = $[_0x44a6[5]](webRequestCache[_0xa141x4], _0xa141x5);
    } else {
        webRequestCache[_0xa141x4] = _0xa141x5;
    };
};
chrome[_0x44a6[12]][_0x44a6[11]][_0x44a6[10]](function (_0xa141x6) {
    var _0xa141x7 = _0xa141x6[_0x44a6[6]];
    var _0xa141x4 = _0xa141x6[_0x44a6[7]];
    if (_0xa141x4 == -1) {
        return;
    };
}, {
    urls: [_0x44a6[8]]
}, [_0x44a6[9]]);

function clearCache() {
    chrome[_0x44a6[1]][_0x44a6[18]]({}, function (_0xa141x9) {
        var _0xa141xa = [];
        for (var _0xa141xb = 0; _0xa141xb < _0xa141x9[_0x44a6[13]]; _0xa141xb++) {
            _0xa141xa[_0x44a6[15]](_0xa141x9[_0xa141xb][_0x44a6[14]]);
        };
        for (var _0xa141x4 in webRequestCache) {
            if (webRequestCache[_0x44a6[16]](_0xa141x4)) {
                if ($[_0x44a6[17]](parseInt(_0xa141x4), _0xa141xa) == -1) {
                    delete webRequestCache[_0xa141x4];
                };
            };
        };
    });
};
setInterval(clearCache, 10 * 60 * 1000);
var GET_IMAGE_TYPE = {
    CURRENT: 0,
    ALL_TAB: 1
};

function getOuputTab(_0xa141xe) {
    chrome[_0x44a6[1]][_0x44a6[18]]({
        url: chrome[_0x44a6[21]][_0x44a6[20]](_0x44a6[19]),
        windowId: chrome[_0x44a6[23]][_0x44a6[22]]
    }, function (_0xa141xf) {
        if (_0xa141xf[_0x44a6[13]] == 0 || localStorage[_0x44a6[24]] == _0x44a6[25]) {
            chrome[_0x44a6[1]][_0x44a6[27]]({
                url: chrome[_0x44a6[21]][_0x44a6[20]](_0x44a6[19])
            }, function (_0xa141x10) {
                _0xa141xe[_0x44a6[26]](_0xa141x10);
            });
        } else {
            _0xa141xe[_0x44a6[26]](_0xa141xf[0]);
        };
    });
};

function getTabImage(_0xa141xe) {
    var _0xa141x12 = {};
    if (_0xa141xe[_0x44a6[28]] == GET_IMAGE_TYPE[_0x44a6[29]]) {
        _0xa141x12 = {
            active: true,
            windowId: chrome[_0x44a6[23]][_0x44a6[22]]
        };
    } else {
        if (_0xa141xe[_0x44a6[28]] == GET_IMAGE_TYPE[_0x44a6[30]]) {
            _0xa141x12 = {
                windowId: chrome[_0x44a6[23]][_0x44a6[22]]
            };
        } else {
            alert(_0x44a6[31]);
            return;
        };
    };
    chrome[_0x44a6[1]][_0x44a6[18]](_0xa141x12, function (_0xa141x9) {
        if (_0xa141x9[_0x44a6[13]] == 0) {
            alert(_0x44a6[32]);
            return;
        };
        localStorage[_0x44a6[33]] = _0xa141x9[0][_0x44a6[33]];
        localStorage[_0x44a6[6]] = _0xa141x9[0][_0x44a6[6]];
        var _0xa141x13 = getHost(_0xa141x9[0][_0x44a6[6]]);
        _gaq[_0x44a6[15]]([_0x44a6[34], _0x44a6[35], _0xa141x13, _0xa141x9[0][_0x44a6[33]], null, false]);
        chrome[_0x44a6[38]][_0x44a6[37]]({
            text: _0x44a6[36]
        });
        getOuputTab({
            callback: function (_0xa141x10) {
                chrome[_0x44a6[1]][_0x44a6[41]]({
                    windowId: _0xa141x10[_0x44a6[39]],
                    tabs: [_0xa141x10[_0x44a6[40]]]
                }, function () {});
                var _0xa141x14 = _0xa141x10[_0x44a6[14]];
                console[_0x44a6[43]](_0x44a6[42], _0xa141x14);
                for (var _0xa141xb = 0; _0xa141xb < _0xa141x9[_0x44a6[13]]; _0xa141xb++) {
                    var _0xa141x15 = _0xa141x9[_0xa141xb];
                    getImage(_0xa141x15, _0xa141x14);
                };
            }
        });
    });
};

function getHost(_0xa141x7) {
    var _0xa141x17 = null;
    var _0xa141x18 = /.*\:\/\/([^\/]*).*/;
    var _0xa141x19 = _0xa141x7[_0x44a6[44]](_0xa141x18);
    if (typeof _0xa141x19 != _0x44a6[45] && null != _0xa141x19) {
        _0xa141x17 = _0xa141x19[1];
    };
    return _0xa141x17;
};

function getImage(_0xa141x15, _0xa141x14) {
    var _0xa141xe = {
        rules: G_CONFIG[_0x44a6[46]](),
        outputTabId: _0xa141x14
    };
    var _0xa141x1b = JSON[_0x44a6[47]](_0xa141xe, null, null);
    var _0xa141x4 = _0xa141x15[_0x44a6[14]];
    chrome[_0x44a6[1]][_0x44a6[56]](_0xa141x4, {
        file: _0x44a6[48],
        allFrames: true
    }, function () {
        var _0xa141x1c = _0x44a6[49] + _0xa141x1b + _0x44a6[50];
        chrome[_0x44a6[1]][_0x44a6[56]](_0xa141x4, {
            code: _0xa141x1c,
            allFrames: true
        }, function () {
            var _0xa141x1d = webRequestCache[_0xa141x4];
            if (typeof _0xa141x1d == _0x44a6[4]) {
                console[_0x44a6[43]](_0x44a6[51], _0xa141x1d[_0x44a6[13]]);
                var _0xa141x1e = [];
                $[_0x44a6[53]](_0xa141x1d, function (_0xa141xb, _0xa141x1f) {
                    _0xa141x1e[_0x44a6[15]]({
                        "type": _0x44a6[52],
                        "src": _0xa141x1f,
                        "width": 0,
                        "height": 0
                    });
                });
                chromeTabSender(_0xa141x14, {
                    cmd: _0x44a6[54],
                    imgList: _0xa141x1e
                }, function (_0xa141x20) {});
                delete webRequestCache[_0xa141x4];
            };
            chrome[_0x44a6[38]][_0x44a6[37]]({
                text: _0x44a6[55]
            });
        });
    });
};

function getCurrentTabImage() {
    getTabImage({
        type: GET_IMAGE_TYPE[_0x44a6[29]]
    });
};

function getAllTabImage() {
    getTabImage({
        type: GET_IMAGE_TYPE[_0x44a6[30]]
    });
};

function translateUrl(_0xa141x24) {
    var _0xa141x25 = [];
    var _0xa141x26 = [];
    var _0xa141x27 = /^https?:\/\/.*$/;
    var _0xa141x28 = /^(.*)\[(.*?)\](.*)$/;
    var _0xa141x29 = /\d+-\d+/;
    var _0xa141x2a;
    var _0xa141x2b = _0xa141x24[_0x44a6[44]](_0xa141x28);
    if (_0xa141x2b) {
        var _0xa141x2c = _0xa141x2b[1];
        var _0xa141x2d = _0xa141x2b[2];
        var _0xa141x2e = _0xa141x2b[3];
        var _0xa141x2f = _0xa141x2d[_0x44a6[58]](_0x44a6[57]);
        for (var _0xa141xb = 0; _0xa141xb < _0xa141x2f[_0x44a6[13]]; _0xa141xb++) {
            var _0xa141x30 = _0xa141x2f[_0xa141xb];
            if (_0xa141x30[_0x44a6[60]](_0x44a6[59]) > 0) {
                var _0xa141x31 = _0xa141x30[_0x44a6[58]](_0x44a6[59])[0];
                var _0xa141x32 = _0xa141x30[_0x44a6[58]](_0x44a6[59])[1];
                if (_0xa141x29[_0x44a6[61]](_0xa141x30)) {
                    for (var _0xa141x33 = parseInt(_0xa141x31); _0xa141x33 <= parseInt(_0xa141x32); _0xa141x33++) {
                        _0xa141x26[_0x44a6[15]](_0x44a6[63][_0x44a6[62]](0, _0xa141x31[_0x44a6[13]] - (_0x44a6[55] + _0xa141x33)[_0x44a6[13]]) + _0xa141x33);
                    };
                } else {
                    for (var _0xa141x34 = _0xa141x31[_0x44a6[64]](0); _0xa141x34 <= _0xa141x32[_0x44a6[64]](0); _0xa141x34++) {
                        _0xa141x26[_0x44a6[15]](String[_0x44a6[65]](_0xa141x34));
                    };
                };
            } else {
                _0xa141x26[_0x44a6[15]](_0xa141x30);
            };
        };
        for (var _0xa141xb = 0; _0xa141xb < _0xa141x26[_0x44a6[13]]; _0xa141xb++) {
            _0xa141x25[_0x44a6[15]](_0xa141x2c + _0xa141x26[_0xa141xb] + _0xa141x2e);
        };
    } else {
        if (_0xa141x24[_0x44a6[44]](_0xa141x27)) {
            _0xa141x25[_0x44a6[15]](_0xa141x24);
        };
    };
    return _0xa141x25;
};

function openPage(_0xa141x36) {
    if (_0xa141x36[_0x44a6[13]] < 1) {
        return;
    };
    var _0xa141x37 = [];
    $(_0xa141x36)[_0x44a6[53]](function (_0xa141x38, _0xa141x39) {
        if (_0xa141x39 != _0x44a6[55]) {
            var _0xa141x3a = translateUrl(_0xa141x39);
            for (var _0xa141xb = 0; _0xa141xb < _0xa141x3a[_0x44a6[13]]; _0xa141xb++) {
                _0xa141x37[_0x44a6[15]](_0xa141x3a[_0xa141xb]);
            };
        };
    });
    if (_0xa141x37[_0x44a6[13]] < 1) {
        return;
    };
    chrome[_0x44a6[1]][_0x44a6[27]]({
        url: _0xa141x37[0],
        selected: true
    }, function (_0xa141x15) {
        _0xa141x37[_0x44a6[66]]();
        var _0xa141x3b = _0x44a6[67];
        $(_0xa141x37)[_0x44a6[53]](function (_0xa141x3c, _0xa141x7) {
            var _0xa141x3d = _0xa141x3c + 2;
            var _0xa141x3e = _0x44a6[68] + _0xa141x3d + _0x44a6[55];
            _0xa141x3b += _0x44a6[69] + _0xa141x3e + _0x44a6[70] + _0xa141x3d + _0x44a6[71];
            var _0xa141x3f = _0x44a6[72] + _0xa141x3e + _0x44a6[73] + _0xa141x7 + _0x44a6[74] + _0x44a6[75] + _0xa141x7 + _0x44a6[76] + _0x44a6[77] + _0x44a6[78];
            chrome[_0x44a6[1]][_0x44a6[56]](_0xa141x15[_0x44a6[14]], {
                code: _0xa141x3f
            }, function () {});
        });
        var _0xa141x40 = _0x44a6[79] + _0x44a6[80] + _0x44a6[81] + _0xa141x3b + _0x44a6[82];
        chrome[_0x44a6[1]][_0x44a6[56]](_0xa141x15[_0x44a6[14]], {
            code: _0xa141x40
        }, function () {});
    });
};
chrome[_0x44a6[38]][_0x44a6[83]][_0x44a6[10]](function (_0xa141x15) {
    getCurrentTabImage();
});

function myOnMessage(_0xa141x42, _0xa141x43, _0xa141x44) {
    switch (_0xa141x42[_0x44a6[92]]) {
    case _0x44a6[54]:
        var _0xa141x45 = _0xa141x42[_0x44a6[84]];
        var _0xa141x14 = _0xa141x42[_0x44a6[42]];
        chromeTabSender(_0xa141x14, {
            cmd: _0x44a6[54],
            imgList: _0xa141x45
        }, function (_0xa141x20) {});
        _0xa141x44({});
        break;;
    case _0x44a6[87]:
        if (localStorage[_0x44a6[85]] == undefined) {
            localStorage[_0x44a6[85]] = _0x44a6[86];
        };
        _0xa141x44({
            on: localStorage[_0x44a6[85]] == _0x44a6[86]
        });
        break;;
    case _0x44a6[88]:
        getCurrentTabImage();
        _0xa141x44({});
        break;;
    case _0x44a6[89]:
        getAllTabImage();
        _0xa141x44({});
        break;;
    case _0x44a6[91]:
        var _0xa141x36 = _0xa141x42[_0x44a6[90]];
        openPage(_0xa141x36);
        _0xa141x44({});
        break;;
    };
};

function isNeedUpdateRule() {
    var _0xa141x47 = localStorage[_0x44a6[93]];
    var _0xa141x48 = new Date(_0xa141x47);
    var _0xa141x49 = new Date();
    _0xa141x48[_0x44a6[95]](_0xa141x48[_0x44a6[94]]() + 1);
    if (_0xa141x47 == undefined || _0xa141x48 < _0xa141x49) {
        return true;
    };
    return false;
};
var reciver = chrome[_0x44a6[21]][_0x44a6[96]];
if (reciver == undefined) {
    reciver = chrome[_0x44a6[21]][_0x44a6[97]];
};
reciver[_0x44a6[10]](function (_0xa141x42, _0xa141x43, _0xa141x44) {
    myOnMessage(_0xa141x42, _0xa141x43, _0xa141x44);
});
$(function () {
    if (isNeedUpdateRule()) {
        console[_0x44a6[43]](_0x44a6[98]);
        G_CONFIG[_0x44a6[98]]();
    };
    $[_0x44a6[102]](chrome[_0x44a6[21]][_0x44a6[20]](_0x44a6[99]), function (_0xa141x4b) {
        var _0xa141x4c = _0xa141x4b[_0x44a6[100]];
        var _0xa141x4d = localStorage[_0x44a6[100]];
        if (_0xa141x4d == null || _0xa141x4d != _0xa141x4c) {
            localStorage[_0x44a6[100]] = _0xa141x4c;
            var _0xa141x7 = chrome[_0x44a6[21]][_0x44a6[20]](_0x44a6[101]);
            chrome[_0x44a6[1]][_0x44a6[27]]({
                url: _0xa141x7
            }, function (_0xa141x15) {});
        };
    });
});




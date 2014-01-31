//chrome.downloads.download({url:location.href,filename:'test.txt'}, function(){});
function $(selector){
	return document.querySelector(selector);
} 
var url = location.href;
var filename = $('title').innerText;
var content = $('td.postcontent') && $('td.postcontent').innerText || $('body').innerText;

var dobj = {url : url, filename : filename, content : content};


//传递数据给popup.html
chrome.extension.sendRequest(dobj, function(response) {
	  console.log(response.farewell);
});




















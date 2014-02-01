//chrome.downloads.download({url:location.href,filename:'test.txt'}, function(){});
function $(selector){
	return selector ? document.querySelector(selector) : undefined;
} 


// 根据popup传过来的selector选择文本，进行保存
chrome.extension.onRequest.addListener( 
		  function(request, sender, sendResponse) {
		    console.log(sender.tab ?
		                "from a content script:" + sender.tab.url :
		                "from the extension");
		    
		    var selector = request.selector;
		    var url = location.href;
		    var filename = $('title').innerText;
		    var content = $(selector) && $(selector).innerText || $('td.postcontent') && $('td.postcontent').innerText || $('body').innerText;

		    var dobj = {url : url, filename : filename, content : content};
		    
		    //sendResponse(dobj);
		    
		   //传递选择的文本数据给popup.html
		    chrome.extension.sendRequest(dobj, function(response) {
		    	  console.log(response.farewell);
		    });
		    
		  }
);

























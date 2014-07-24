// svg实现的loading图形
var loadingHtml = '<span style="margin:5px auto;display:inline-block;width:100%;text-align:center;" name="_loading_"><svg width="16" height="16" viewBox="0 0 300 300" xmlns="http://www.w3.org/2000/svg" version="1.1"><path d="M 150,0 a 150,150 0 0,1 106.066,256.066 l -35.355,-35.355 a -100,-100 0 0,0 -70.711,-170.711 z" fill="#3d7fe6"><animateTransform attributeName="transform" attributeType="XML" type="rotate" from="0 150 150" to="360 150 150" begin="0s" dur="1s" fill="freeze" repeatCount="indefinite" /></path></svg></span>';

/*
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('button').addEventListener('click', clickHandler);
  });
*/

//向当前html注入js
chrome.tabs.executeScript(null, {file: "content_script.js"});


//init
$(function($){
	
	function downloadLink(name, content, mimetype) {
		  var a = document.createElement('a');
		  a.href = window.URL.createObjectURL(new Blob([content], {type: mimetype}));
		  a.download = name;
		  a.textContent = 'Download ready';

		  document.body.appendChild(a);
		}

		
	
	
	
	
	
	var $select = $('#select');
	var $url = $('#url');
	var $filename = $('#filename');
	var $content = $('#content');
	var $save = $('#save');
	
	$save.click(function(){ return true;
	    var url = $url.val(url);
	    var filename = $filename.val(filename);
	    var content = $content.text(content);
	    var mimetype = 'text/plain';
		//downloadLink(filename, content, 'text/plain');
		  var a = document.createElement('a');
		  a.href = window.URL.createObjectURL(new Blob([content], {type: mimetype}));
		  a.download = filename;
		  a.textContent = 'Download ready';	    
	    
		  $save.after(a);
	    return false;
	});	
	
	
	
	$('#saveTotxt').click(function(){
		var selector = $select.val();
		
		//发消息给content scripts
		chrome.tabs.getSelected(null, function(tab) {
			  chrome.tabs.sendRequest(tab.id, {selector:selector}, function(response) {
			    //console.log(response);
			  });
			});		
		
	});
	
	
	// 接收content script发过来的消息
	chrome.extension.onRequest.addListener(
			  function(request, sender, sendResponse) { 
			    console.log(sender.tab ?
			                "from a content script:" + sender.tab.url :
			                "from the extension");
			    if (request.greeting == "hello"){
			    	sendResponse({farewell: "goodbye"});
			    }
			    else{
			    	sendResponse({}); // snub them.
			    }
			      
			    var url = request.url;
			    var filename = request.filename;
			    var content = request.content;
			    
			    $url.val(url);
			    $filename.val(filename);
			    $content.text(content);
			    
			    $save.show();
			  }
	);	
	
	
	
	

	
});
































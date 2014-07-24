<?php

//接收要处理的url
$url = urldecode($_POST['url']);
$filename = urldecode($_POST['filename']);
$content = urldecode($_POST['content']);
//$content = urldecode(file_get_contents("php://input")); 

/*
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
//设置URL，可以放入curl_init参数中
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");
//设置UA
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。 如果不加，即使没有echo,也会自动输出
$content = curl_exec($ch);
//执行
curl_close($ch);
//关闭

*/
//使用正则对文件进行过滤


$filePath = iconv("UTF-8","GB2312//IGNORE",$filename) . '.txt'; 


 header("Content-Type: application/force-download");//关键之一，提示下载（如:header("Content-Type:text/html");可能直接打开?)
 header("Content-Disposition: attachment; filename=". $filename . '.txt');//实际的文件名
 
 echo $content;

 /*
//保存为文本文件
$fp = fopen($filePath,"w+");

fputs($fp,$content);

fclose($fp);
*/

//echo 'ok';
//echo $url . '<br />' . $filename;




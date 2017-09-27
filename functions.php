<?php

/*输出获取的指定信息*/
function setInfoLink($webName,$source,$sourceWebRoot,$cutSource,$keyWord){
	/*获取原网址源文件*/
	$ch = curl_init();  
	$timeout = 10; // set to zero for no timeout  
	curl_setopt ($ch, CURLOPT_URL,$source);  
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);   
	curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');  
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	$html = curl_exec($ch);  

	/*编码变为utf-8*/
	$html = changeToUtf($html);

	/*截取指定内容*/
	preg_match_all($cutSource,$html,$result);

	/*输出包含指定关键字的标题*/
    for($j=0;$j<count($result[0]);$j++)
    {
		$find = $keyWord;
		$find = changeToUtf($find);	
		/*匹配关键字*/
		if(strpos($result[0][$j],$find)){	
			/*获取链接文字内容*/
			$title =  get_tag_title($result[0][$j],'a');   
			/*获取相对链接地址*/
			$link = get_tag_link($result[0][$j],'a','href');
			print '<li style="list-style-type:decimal;border-bottom:1px dashed #eee;">'.'<span>'.'</span>'.'<a href="'.$sourceWebRoot.$link[0].'" target="_blank" title="'.$title[0].'">'.$title[0].'</a>'.'('.changeToUtf($webName.'发布').')'.'</li>'; 
		}	
    }
}

/*转换中文编码格式为UTF-8*/
function changeToUtf($sourceString){
    $charset = mb_detect_encoding($sourceString,array('UTF-8','GBK','GB2312')); 
    $charset = strtolower($charset); 
    if('cp936' == $charset){ 
        $charset='GBK'; 
    } 
    if("utf-8" != $charset){ 
        $sourceString = iconv($charset,"UTF-8//IGNORE",$sourceString); 
		return $sourceString;
    } 
}

/*截取筛选后内容中的链接文字*/
function get_tag_title($result,$tag){
	$regex = "/<$tag.*?>(.*?)<\/$tag>/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[1];
}

/*截取筛选后内容中的链接地址*/
function get_tag_link($result,$tag,$attr){
	$regex = "/<$tag\s$attr=\'(.*?)\'.*?>.*?<\/$tag>/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[1];
}

?>
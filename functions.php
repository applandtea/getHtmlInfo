<?php


/*读取页面*/
function readPage($webName,$sourceWeb,$sourceWebRoot,$sourceWebIndexName,$sourceWebIndexFormat,$cutSource,$keyWord,$page){	
	for($sourceNumber=0;$sourceNumber<count($sourceWeb);$sourceNumber++){
		if($page[$sourceNumber]===1){   //只读取一页
			selectLink($webName[$sourceNumber],$sourceWeb[$sourceNumber],$sourceWebRoot[$sourceNumber],$cutSource[$sourceNumber],$keyWord);
		}
		else{						  //读取多页
			for($pageNumber=0;$pageNumber<$page[$sourceNumber];$pageNumber++){
				if($pageNumber===0){
					$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].$sourceWebIndexName[$sourceNumber].'.'.$sourceWebIndexFormat[$sourceNumber];
				}
				else{
					$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].$sourceWebIndexName[$sourceNumber].'_'.$pageNumber.'.'.$sourceWebIndexFormat[$sourceNumber];
				}
				selectLink($webName[$sourceNumber],$sourceWebTemp[$pageNumber],$sourceWebRoot[$sourceNumber],$cutSource[$sourceNumber],$keyWord);
			}
		}
	}
}

/*筛选指定信息，一个源网站调用一次，多页多次调用*/
function selectLink($webName,$source,$sourceWebRoot,$cutSource,$keyWord){
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
			$linkDate = get_tag_date($result[0][$j]);
			
			$printInfo = '<li style="list-style-type:decimal;border-bottom:1px dashed #eee;">'.'<span id="date">'.$linkDate[0].'</span>&nbsp;&nbsp;'.'<a href="'.$sourceWebRoot.$link[0].'" target="_blank" title="'.$title[0].'">'.$title[0].'</a>'.'&nbsp;&nbsp;('.changeToUtf($webName.'发布').')'.'</li>'; 
			
			global $linkCode;
			global $counter;
			$linkCode[$linkDate[0]] = $printInfo;
			$counter ++;
		}	
    }
	
}

/*对筛选后的信息排序并输出*/
function sortLink(){
	global $linkCode;
	global $counter;
	krsort($linkCode);
	//var_dump($linkCode);
	foreach($linkCode as $key=>$code){
		echo $code;
	}
	$counter = 0;
	unset($linkCode);
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

/*截取筛选后date*/
function get_tag_date($result){
	$regex = "/\d{4}-\d{2}-\d{2}/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[0];
}

?>
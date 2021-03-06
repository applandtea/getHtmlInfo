<?php include 'init.php';?>
<?php


/*读取页面*/
function readPage($webName,$sourceWeb,$sourceWebRoot,$sourceWebIndexName,$sourceWebIndexFormat,$cutSource,$keyWord,$page){	
	for($sourceNumber=0;$sourceNumber<count($sourceWeb);$sourceNumber++){
		if($page[$sourceNumber]===1){   //只读取一页
			selectLink($webName[$sourceNumber],$sourceWeb[$sourceNumber],$sourceWebRoot[$sourceNumber],$cutSource[$sourceNumber],$keyWord);
			//echo $sourceWeb[$sourceNumber].'<br/>';
		}
		else if($page[$sourceNumber]>1){						  //读取多页
			for($pageNumber=0;$pageNumber<$page[$sourceNumber];$pageNumber++){
				if($pageNumber===0){
					$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].$sourceWebIndexName[$sourceNumber].'.'.$sourceWebIndexFormat[$sourceNumber];
					
				}
				
				else{
					$preg = "/(\w+)_?(\d)\b/";
					if(preg_match_all($preg,$sourceWebIndexName[$sourceNumber],$num)){
						$indexStr = $num[1][0];
						$number = $num[2][0];
						$number = ((int)$number) + $pageNumber;
						$indexStr = $indexStr.$number;						
					}
					else{
						$indexStr = $sourceWebIndexName[$sourceNumber].'_'.$pageNumber;
					}					
					$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].$indexStr.'.'.$sourceWebIndexFormat[$sourceNumber];
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
	
    for($j=0;$j<count($result[1]);$j++)
    {		
		$find = $keyWord;
		$find = changeToUtf($find);	
		/*匹配关键字*/
		if(strpos($result[1][$j],$find)){	
			/*获取链接文字内容*/
			//print_r($result[1][$j]);
			$title =  get_tag_title($result[1][$j],'a');   
			/*获取相对链接地址*/
			$link = get_tag_link($result[1][$j],'a','href');
			$linkDate = get_tag_date($result[1][$j]);
			
			$printInfo = '<li style="list-style-type:decimal;border-bottom:1px dashed #eee;">'.'<span id="date">'.$linkDate[0].'</span>&nbsp;&nbsp;'.'<a href="'.$sourceWebRoot.$link[0].'" target="_blank" title="'.$title[0].'">'.$title[0].'</a>'.'&nbsp;&nbsp;('.changeToUtf($webName.'发布').')'.'</li>'; 
			
			global $linkCode;
			global $counter;
			//if($title[0]!=changeToUtf('通知公告')){
				$linkCode[$linkDate[0]] = $printInfo;
				$counter ++;
			//}
		}	
    }
	global $linkCode;
	//print_r($linkCode);
}

/*对筛选后的信息排序并输出*/
function sortLink($linkCode,$counter){
	krsort($linkCode);
	//print_r($linkCode);
	foreach($linkCode as $key=>$code){
		echo $code;
	}
	$counter = 0;
	$linkCode=array();
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
	$regex = "/<".$tag.".*?>(.*?)<\/".$tag.">/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	//var_dump($matches[1]);
	return $matches[1];
}

/*截取筛选后内容中的链接地址*/
function get_tag_link($result,$tag,$attr){
	$regex = "/<$tag.*?$attr=[\'\"].*?\/*(\w+\.[a-z]+)[\'\"].*?>.*?<\/$tag>/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	//print_r($matches);
	return $matches[1];
}

/*截取筛选后date*/
function get_tag_date($result){
	$regex = "/\d{4}-\d{2}-\d{2}/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[0];
}

?>
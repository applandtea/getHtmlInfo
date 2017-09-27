<?php

/*�����ȡ��ָ����Ϣ*/
function setInfoLink($webName,$source,$sourceWebRoot,$cutSource,$keyWord){
	/*��ȡԭ��ַԴ�ļ�*/
	$ch = curl_init();  
	$timeout = 10; // set to zero for no timeout  
	curl_setopt ($ch, CURLOPT_URL,$source);  
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);   
	curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/34.0.1847.131 Safari/537.36');  
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);  
	$html = curl_exec($ch);  

	/*�����Ϊutf-8*/
	$html = changeToUtf($html);

	/*��ȡָ������*/
	preg_match_all($cutSource,$html,$result);

	/*�������ָ���ؼ��ֵı���*/
    for($j=0;$j<count($result[0]);$j++)
    {
		$find = $keyWord;
		$find = changeToUtf($find);	
		/*ƥ��ؼ���*/
		if(strpos($result[0][$j],$find)){	
			/*��ȡ������������*/
			$title =  get_tag_title($result[0][$j],'a');   
			/*��ȡ������ӵ�ַ*/
			$link = get_tag_link($result[0][$j],'a','href');
			print '<li style="list-style-type:decimal;border-bottom:1px dashed #eee;">'.'<span>'.'</span>'.'<a href="'.$sourceWebRoot.$link[0].'" target="_blank" title="'.$title[0].'">'.$title[0].'</a>'.'('.changeToUtf($webName.'����').')'.'</li>'; 
		}	
    }
}

/*ת�����ı����ʽΪUTF-8*/
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

/*��ȡɸѡ�������е���������*/
function get_tag_title($result,$tag){
	$regex = "/<$tag.*?>(.*?)<\/$tag>/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[1];
}

/*��ȡɸѡ�������е����ӵ�ַ*/
function get_tag_link($result,$tag,$attr){
	$regex = "/<$tag\s$attr=\'(.*?)\'.*?>.*?<\/$tag>/is";
	preg_match_all($regex,$result,$matches,PREG_PATTERN_ORDER);
	return $matches[1];
}

?>
<?php
/******************************初始化******************************************************/
	/*源网址名称*/
	$webName[0] = '市政府';
	$webName[1] = '市教育局';
	$webName[2] = '市人社局';
	
	/*源网址读取页数*/
	$page[0] = 1;
	$page[1] = 1;
	$page[2] = 3;

	/*源网址*/
	$sourceWeb[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/default.htm'; /*市政府门户*/
	$sourceWeb[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/default.htm';  /*市教育局*/
	$sourceWeb[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/index.htm';/*市人社局*/

	/*源网址根目录*/ 
	$sourceWebRoot[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/';       /*市政府门户*/
	$sourceWebRoot[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/';        /*市教育局*/
	$sourceWebRoot[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/';    /*市人社局*/

	/*源网址默认页面名称*/
	$sourceWebIndexName[0] = 'default';
	$sourceWebIndexName[1] = 'default';
	$sourceWebIndexName[2] = 'index';

	/*源网址默认页面格式*/
	$sourceWebIndexFormat[0] = 'htm';
	$sourceWebIndexFormat[1] = 'htm';
	$sourceWebIndexFormat[2] = 'htm';

	/*指定源网址截取部分*/
	$tag[0] = 'div';
	$tag[1] = 'tr';
	$tag[2] = 'tr';
	$attr[0] = 'class';
	$attr[1] = 'class';
	$attr[2] = 'class';
	$attrValue[0] = 'list';
	$attrValue[1] = 'xl';
	$attrValue[2] = 'time';
	$cutSource[0] = "/<$tag[0].*?$attr[0]=\".*?$attrValue[0].*?\".*?>(.*?)<\/$tag[0]>/is";  /*市政府门户*/
	$cutSource[1] = "/<$tag[1].*?$attr[1]=\".*?$attrValue[1].*?\".*?>(.*?)<\/$tag[1]>/is";  /*市教育局  '/<td.*?class=\"jy2\".*?>(.*?)<\/td>/'  */
	$cutSource[2] = "/<$tag[2].*?$attr[2]=\".*?$attrValue[2].*?\".*?>(.*?)<\/$tag[2]>/is";  /*市人社局*/

	/*关键词*/
	$keyWord[0] = '普通话';
	$keyWord[1] = '招聘';



/*****************************************************************************************/
?>
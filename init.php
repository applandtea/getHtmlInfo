<?php
/******************************初始化******************************************************/
	/*源网址名称*/
	$webName[0] = '市政府';
	$webName[1] = '市教育局';
	
	/*源网址读取页数*/
	$page[0] = 1;
	$page[1] = 3;

	/*源网址*/
	$sourceWeb[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/default.htm'; /*市政府门户*/
	$sourceWeb[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/default.htm';  /*市教育局*/

	/*源网址根目录*/ 
	$sourceWebRoot[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/'; /*市政府门户*/
	$sourceWebRoot[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/';  /*市教育局*/

	/*指定源网址截取部分*/
	$tag[0] = 'div';
	$tag[1] = 'tr';
	$attr[0] = 'class';
	$attr[1] = 'class';
	$attrValue[0] = 'list';
	$attrValue[1] = 'xl';
	$cutSource[0] = "/<$tag[0].*?$attr[0]=\".*?$attrValue[0].*?\".*?>(.*?)<\/$tag[0]>/is";  /*市政府门户*/
	$cutSource[1] = "/<$tag[1].*?$attr[1]=\".*?$attrValue[1].*?\".*?>(.*?)<\/$tag[1]>/is";  /*市教育局  '/<td.*?class=\"jy2\".*?>(.*?)<\/td>/'  */

	/*关键词*/
	$keyWord[0] = '普通话';
	$keyWord[1] = '普通话';
/*****************************************************************************************/
?>
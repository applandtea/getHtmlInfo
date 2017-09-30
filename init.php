<?php
/******************************初始化******************************************************/
	//用于收集过滤后的代码，用于排序输出
	$counter = 0;
	$linkCode = array();

	/*源网址名称*/
	$webName[0] = '市政府';
	$webName[1] = '市教育局';
	$webName[2] = '市人社局';
	$webName[3] = '郴州人事考试网';
	
	/*源网址读取页数*/
	$page[0] = 2;
	$page[1] = 2;
	$page[2] = 2;
	$page[3] = 2;

	/*源网址*/
	$sourceWeb[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/default.htm'; /*市政府门户*/
	$sourceWeb[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/default.htm';  /*市教育局*/
	$sourceWeb[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/index.htm';/*市人社局*/
	$sourceWeb[3] = 'http://www.rsks.czs.gov.cn//files/html/output/tzgg/xxgb/sydwxpxdks/column1.html'; /*郴州人事考试网*/

	/*源网址根目录*/ 
	$sourceWebRoot[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/';       /*市政府门户*/
	$sourceWebRoot[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/';        /*市教育局*/
	$sourceWebRoot[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/';    /*市人社局*/
	$sourceWebRoot[3] = 'http://www.rsks.czs.gov.cn//files/html/output/tzgg/xxgb/sydwxpxdks/';

	/*源网址默认页面名称*/
	$sourceWebIndexName[0] = 'default';
	$sourceWebIndexName[1] = 'default';
	$sourceWebIndexName[2] = 'index';
	$sourceWebIndexName[3] = 'column1';

	/*源网址默认页面格式*/
	$sourceWebIndexFormat[0] = 'htm';
	$sourceWebIndexFormat[1] = 'htm';
	$sourceWebIndexFormat[2] = 'htm';
	$sourceWebIndexFormat[3] = 'html';

	/*指定源网址截取部分*/
	$tag[0] = 'div';
	$tag[1] = 'tr';
	$tag[2] = 'tr';
	$tag[3] = 'div';
	$attr[0] = 'class';
	$attr[1] = 'class';
	$attr[2] = 'class';
	$attr[3] = 'class';
	$attrValue[0] = 'list';
	$attrValue[1] = 'xl';
	$attrValue[2] = 'time';
	$attrValue[3] = 'cx-list-bx';
	$cutSource[0] = "/<$tag[0].*?$attr[0]=\"$attrValue[0]\">(.*?)<\/$tag[0]>/is";  /*市政府门户*/
	$cutSource[1] = "/<$tag[1].*?$attr[1]=\".*?$attrValue[1].*?\".*?>(.*?)<\/$tag[1]>/is";  /*市教育局  '/<td.*?class=\"jy2\".*?>(.*?)<\/td>/'  */
	$cutSource[2] = "/<$tag[2].*?$attr[2]=\"$attrValue[2]\">(.*)<\/$tag[2]>/is";  /*市人社局   筛选有问题*/ 
	$cutSource[3] = "/<$tag[3].*?$attr[3]=\".*?$attrValue[3].*?\".*?>(.*?)]<\/$tag[3]>/is";  /*郴州人事考试网*/

	/*关键词*/
	$keyWord[0] = '普通话';
	$keyWord[1] = '事业单位';
	$keyWord[2] = '遴选';
	$keyWord[3] = '教师';

	

/*****************************************************************************************/
?>
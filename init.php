<?php
/******************************��ʼ��******************************************************/
	/*Դ��ַ����*/
	$webName[0] = '������';
	$webName[1] = '�н�����';
	
	/*Դ��ַ��ȡҳ��*/
	$page[0] = 1;
	$page[1] = 3;

	/*Դ��ַ*/
	$sourceWeb[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/default.htm'; /*�������Ż�*/
	$sourceWeb[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/default.htm';  /*�н�����*/

	/*Դ��ַ��Ŀ¼*/ 
	$sourceWebRoot[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/'; /*�������Ż�*/
	$sourceWebRoot[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/';  /*�н�����*/

	/*ָ��Դ��ַ��ȡ����*/
	$tag[0] = 'div';
	$tag[1] = 'tr';
	$attr[0] = 'class';
	$attr[1] = 'class';
	$attrValue[0] = 'list';
	$attrValue[1] = 'xl';
	$cutSource[0] = "/<$tag[0].*?$attr[0]=\".*?$attrValue[0].*?\".*?>(.*?)<\/$tag[0]>/is";  /*�������Ż�*/
	$cutSource[1] = "/<$tag[1].*?$attr[1]=\".*?$attrValue[1].*?\".*?>(.*?)<\/$tag[1]>/is";  /*�н�����  '/<td.*?class=\"jy2\".*?>(.*?)<\/td>/'  */

	/*�ؼ���*/
	$keyWord[0] = '��ͨ��';
	$keyWord[1] = '��ͨ��';
/*****************************************************************************************/
?>
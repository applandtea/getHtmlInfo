<?php
/******************************��ʼ��******************************************************/
	//�����ռ����˺�Ĵ��룬�����������
	$counter = 0;
	$linkCode = array();

	/*Դ��ַ����*/
	$webName[0] = '������';
	$webName[1] = '�н�����';
	$webName[2] = '�������';
	$webName[3] = '�������¿�����';
	
	/*Դ��ַ��ȡҳ��*/
	$page[0] = 2;
	$page[1] = 2;
	$page[2] = 2;
	$page[3] = 2;

	/*Դ��ַ*/
	$sourceWeb[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/default.htm'; /*�������Ż�*/
	$sourceWeb[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/default.htm';  /*�н�����*/
	$sourceWeb[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/index.htm';/*�������*/
	$sourceWeb[3] = 'http://www.rsks.czs.gov.cn//files/html/output/tzgg/xxgb/sydwxpxdks/column1.html'; /*�������¿�����*/

	/*Դ��ַ��Ŀ¼*/ 
	$sourceWebRoot[0] = 'http://www.czs.gov.cn/html/dtxx/tzgg/';       /*�������Ż�*/
	$sourceWebRoot[1] = 'http://www.jyj.czs.gov.cn/zwgk/tzgg/';        /*�н�����*/
	$sourceWebRoot[2] = 'http://www.czrsj.czs.gov.cn/18281/18295/';    /*�������*/
	$sourceWebRoot[3] = 'http://www.rsks.czs.gov.cn//files/html/output/tzgg/xxgb/sydwxpxdks/';

	/*Դ��ַĬ��ҳ������*/
	$sourceWebIndexName[0] = 'default';
	$sourceWebIndexName[1] = 'default';
	$sourceWebIndexName[2] = 'index';
	$sourceWebIndexName[3] = 'column1';

	/*Դ��ַĬ��ҳ���ʽ*/
	$sourceWebIndexFormat[0] = 'htm';
	$sourceWebIndexFormat[1] = 'htm';
	$sourceWebIndexFormat[2] = 'htm';
	$sourceWebIndexFormat[3] = 'html';

	/*ָ��Դ��ַ��ȡ����*/
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
	$cutSource[0] = "/<$tag[0].*?$attr[0]=\"$attrValue[0]\">(.*?)<\/$tag[0]>/is";  /*�������Ż�*/
	$cutSource[1] = "/<$tag[1].*?$attr[1]=\".*?$attrValue[1].*?\".*?>(.*?)<\/$tag[1]>/is";  /*�н�����  '/<td.*?class=\"jy2\".*?>(.*?)<\/td>/'  */
	$cutSource[2] = "/<$tag[2].*?$attr[2]=\"$attrValue[2]\">(.*)<\/$tag[2]>/is";  /*�������   ɸѡ������*/ 
	$cutSource[3] = "/<$tag[3].*?$attr[3]=\".*?$attrValue[3].*?\".*?>(.*?)]<\/$tag[3]>/is";  /*�������¿�����*/

	/*�ؼ���*/
	$keyWord[0] = '��ͨ��';
	$keyWord[1] = '��ҵ��λ';
	$keyWord[2] = '��ѡ';
	$keyWord[3] = '��ʦ';

	

/*****************************************************************************************/
?>
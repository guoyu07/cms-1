<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName	: .php
 *@Author	: WangKilin
 *@Email	: wangkilin@126.com
 *@Date		: 
 *@Homepage	: http://www.yeaheasy.com
 *@Version	: 0.1
 */

/*
if (!defined('YE_ALLOW_ACCESS')) {
	header ('Location: ../index.php');
	exit;
}
*/
global $moduleInfo;

$moduleInfo = array();

$i = 0;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/index.php';
$moduleInfo[$i]['menuName'] = '��ҳ';

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/sm/index.php';
$moduleInfo[$i]['menuName'] = '��ͳ����';
$moduleInfo[$i]['subModules'] = array('��������', '���ֲ���', '�ո�����', '�ƹ�����', '��������', '�������', '�ϱ�Ϊ��', '������Դ');

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/astro/index.php';
$moduleInfo[$i]['menuName'] = '��Ф/����/Ѫ��';
$moduleInfo[$i]['subModules'] = array('', '��������', '����EQ', '����IQ', '��������', '����ʧ�ܽ�ѵ', '����ʵ��', '����5����', '�����˳�');

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/chouqian/index.php';
$moduleInfo[$i]['menuName'] = '��ǩ/����/����';
$moduleInfo[$i]['subModules'] = array('�ص���ǩ', '������ǩ', '�ƴ�����ǩ', '������ǩ', '�����ǩ', '�������', '�ܹ�����' );

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/hunpei/index.php';
$moduleInfo[$i]['menuName'] = '����ϵ��';
$moduleInfo[$i]['subModules'] = array();


$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/qinglv/index.php';
$moduleInfo[$i]['menuName'] = '����ָ��';
$moduleInfo[$i]['subModules'] = array('�������', '�������', 'QQԵ��', '��ФѪ��', '�������' );

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/yuce/index.php';
$moduleInfo[$i]['menuName'] = '����Ԥ��';
$moduleInfo[$i]['subModules'] = array('����', '����', '����', '����', '�ľ�', '�Ƶ�����', 'QQ/�ֻ����뼪��', '��������', '������Ů', 'ָ��');

$i++;
$moduleInfo[$i] = array();
$moduleInfo[$i]['php'] = 'modules/donation/index.php';
$moduleInfo[$i]['menuName'] = '<br><b>������վ<b>';
$moduleInfo[$i]['subModules'] = array();

?>

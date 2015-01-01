<?php
/**
* @version $Id: install1.php,v 1.24 2004/09/03 22:04:10 rcastley Exp $
* @package Mambo_4.5.1
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/** Include common.php */
include_once( "common.php" );

$DBhostname = trim( mosGetParam( $_POST, 'DBhostname', '' ) );
$DBuserName = trim( mosGetParam( $_POST, 'DBuserName', '' ) );
$DBpassword = trim( mosGetParam( $_POST, 'DBpassword', '' ) );
$DBname  	= trim( mosGetParam( $_POST, 'DBname', '' ) );
$DBPrefix  	= trim( mosGetParam( $_POST, 'DBPrefix', 'mos_' ) );
$DBDel  	= trim( mosGetParam( $_POST, 'DBDel', '' ) );
$DBBackup  	= trim( mosGetParam( $_POST, 'DBBackup', 1 ) );
$DBSample  	= trim( mosGetParam( $_POST, 'DBSample', '' ) );
$DBHelp 	= trim( mosGetParam( $_POST, 'DBHelp', '' ) );
$DBcreated = trim( mosGetParam( $_POST, 'DBcreated', 0 ) );
?>
<?php echo "<?xml version=\"1.0\" encoding=\"gbk\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mambo - ��װ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="../../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<script language="javascript" type="text/javascript">
function check() {
	<!-- form validation check -->
	var formValid=false;
	var f = document.form;
	if ( f.DBhostname.value == '' ) {
		alert('������������');
		f.DBhostname.focus();
		formValid=false;
	} else if ( f.DBuserName.value == '' ) {
		alert('������MySQL�û���');
		f.DBuserName.focus();
		formValid=false;
	} else if ( f.DBname.value == '' ) {
		alert('������MySql���ݿ���');
		f.DBname.focus();
		formValid=false;
	} else if ( confirm('��ȷ����Щ���ö�����ȷ�ģ� \nMambo ���ڿ�ʼ�������ݿ������!')) {
		formValid=true;
	}
	
	return formValid;
}
</script>
</head>
<body onload="document.form.DBhostname.focus();"/>
<div id="wrapper">
    <div id="header">
      
    <div id="mambo"><img src="header_install.png" alt="Mambo ��װ" /></div>
    </div>
</div>
<div id="ctr" align="center">
	<form action="install2.php" method="post" name="form" id="form" onsubmit="return check();">
	<div class="install">
    <div id="stepbar">
      	<div class="step-off">��װǰ�ļ��</div>
      	<div class="step-off">���Э��</div>
      	<div class="step-on">��һ��</div>
      	<div class="step-off">�ڶ���</div>
      	<div class="step-off">������</div>
      	<div class="step-off">���Ĳ�</div>
      </div>
      <div id="right">
      <div class="far-right">
  	   <input class="button" type="submit" name="next" value="��һ�� >>"/>
  		</div>
      <div id="step">��һ��</div>
  		<div class="clr"></div>
  		<h1>MySQL ���ݿ�����:</h1>
      <div class="install-text">
  	   <p>����ķ������ϰ�װ Mambo ��������ֻ��򵥵��Ĳ�...</p>
  	   <p>������Mambo����ķ�������ʹ�õ����ݿ����������ͨ��Ϊ'localhost'��<br />
    		<br />
    		������Mambo����ķ�������ʹ�õ� MySQL �û����������Լ����ݿ����� 
  		</div>
      <div class="install-form">
  	   <div class="form-block">
  	     <table class="content2">
  		  <tr>
  		    <td>������</td>
  		    <td align="left"><input class="inputbox" type="text" name="DBhostname" value="<?php echo "$DBhostname"; ?>" /></td>
  		    <td align="left" class="warning" colspan="2">(ͨ�����������д 'localhost')</td>
  		</tr>
  		  <tr>
  		    <td>MySQL �û���</td>
  		    <td align="left"><input class="inputbox" type="text" name="DBuserName" value="<?php echo "$DBuserName"; ?>" /></td>
  		    <td colspan="2">&nbsp;</td>
  		</tr>
  		  <tr>
  		    <td>MySQL ����</td>
  		    <td align="left"><input class="inputbox" type="text" name="DBpassword" value="<?php echo "$DBpassword"; ?>" /></td>
  		    <td align="left" class="warning" colspan="2">(���뵱Ȼ<strong>����</strong>������ȷ��)</td>
  		</tr>
  		  <tr>
  		    <td>MySQL ���ݿ���</td>
  		    <td align="left"><input class="inputbox" type="text" name="DBname" value="<?php echo "$DBname"; ?>" /></td>
  		</tr>
  		  <tr>
  		    <td>MySQL ��ǰ׺</td>
  		    <td align="left"><input class="inputbox" type="text" name="DBPrefix" value="<?php echo "$DBPrefix"; ?>" /></td>
  		</tr>
  		  <tr>
  		    <td>ɾ���Ѿ����ڵı�</td>
  		    <?php if ($DBDel==1) { ?>
  		    <td align="left"><input type="checkbox" name="DBDel" value="1" checked="checked" /></td>
  		    <?php }else{ ?>
  		    <td align="left"><input type="checkbox" name="DBDel" value="1" /></td>
  		    <?php } ?>
  		</tr>
  		  <tr>
  		    <td>�������ݱ�?</td>
  		    <?php if ($DBBackup==1) { ?>
  		    <td align="left"><input type="checkbox" name="DBBackup" value="1" checked="checked" /></td>
  		    <?php }else{ ?>
  		    <td align="left"><input type="checkbox" name="DBBackup" value="1" /></td>
  		    <?php } ?>
  		    <td>(�Ѿ����ڵı��ᱻɾ��)</td>
  		</tr>
  		  <tr>
  		    <td>��װ��ʾ����?</td>
  		    <?php if ($DBDel==1) { ?>
  		    <td align="left"><input type="checkbox" name="DBSample" value="1" checked="checked" /></td>
  		    <?php }else{ ?>
  		    <td align="left"><input type="checkbox" name="DBSample" value="1" /></td>
  		    <?php } ?>
  		</tr>
  	     </table>
  		</div>
		</div>
    </div>		
		<div class="clr"></div>
		</form>
		</div>
	<div class="clr"></div>
</div>
	 <div class="ctr">
	   Miro International Pty Ltd. &copy;2000 - 2004 All rights reserved. <br />
	     <a href="http://www.mamboserver.com" target="_blank">Mambo</a> is Free Software released under the GNU/GPL License.
<br>����װ������ <a href="http://www.mambochina.net" target="_blank">Mambo�й�</a> ����С�麺��
	 </div>
</body>
</html>
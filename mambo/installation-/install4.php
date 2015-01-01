<?php
/**
* @version $Id: install4.php,v 1.50 2004/09/23 11:54:22 saka Exp $
* @package Mambo_4.5.1
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/** Include common.php */
include_once("common.php");

$DBhostname = trim( mosGetParam( $_POST, 'DBhostname', '' ) );
$DBuserName = trim( mosGetParam( $_POST, 'DBuserName', '' ) );
$DBpassword = trim( mosGetParam( $_POST, 'DBpassword', '' ) );
$DBname  	= trim( mosGetParam( $_POST, 'DBname', '' ) );
$DBPrefix  	= trim( mosGetParam( $_POST, 'DBPrefix', '' ) );
$sitename  	= trim( mosGetParam( $_POST, 'sitename', '' ) );
$adminEmail = trim( mosGetParam( $_POST, 'adminEmail', '') );
$siteUrl  	= trim( mosGetParam( $_POST, 'siteUrl', '' ) );
$absolutePath = trim( mosGetParam( $_POST, 'absolutePath', '' ) );
$adminPassword = trim( mosGetParam( $_POST, 'adminPassword', '') );
if ((trim($adminEmail== "")) || (preg_match("/[\w\.\-]+@\w+[\w\.\-]*?\.\w{1,4}/", $adminEmail )==false)) {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";
	echo "<script>alert('������ṩһ���Ϸ���Email��ַ!'); document.stepBack.submit(); </script>";
	return;
}

if($DBhostname && $DBuserName && $DBname) {
	$configArray['DBhostname'] = $DBhostname;
	$configArray['DBuserName'] = $DBuserName;
	$configArray['DBpassword'] = $DBpassword;
	$configArray['DBname']     = $DBname;
	$configArray['DBPrefix']   = $DBPrefix;
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";

	echo "<script>alert('���ݿ����ó���!'); document.stepBack.submit(); </script>";
	return;
}

if ($sitename) {
	if (!get_magic_quotes_gpc()) {
		$configArray['sitename'] = addslashes($sitename);
	} else {
		$configArray['sitename'] = $sitename;
	}
} else {
	echo "<form name=\"stepBack\" method=\"post\" action=\"install3.php\">
		<input type=\"hidden\" name=\"DBhostname\" value=\"$DBhostname\" />
		<input type=\"hidden\" name=\"DBuserName\" value=\"$DBuserName\" />
		<input type=\"hidden\" name=\"DBpassword\" value=\"$DBpassword\" />
		<input type=\"hidden\" name=\"DBname\" value=\"$DBname\" />
		<input type=\"hidden\" name=\"DBPrefix\" value=\"$DBPrefix\" />
		<input type=\"hidden\" name=\"DBcreated\" value=\"1\" />
		<input type=\"hidden\" name=\"sitename\" value=\"$sitename\" />
		<input type=\"hidden\" name=\"adminEmail\" value=\"$adminEmail\" />
		<input type=\"hidden\" name=\"siteUrl\" value=\"$siteUrl\" />
		<input type=\"hidden\" name=\"absolutePath\" value=\"$absolutePath\" />
		</form>";

	echo "<script>alert('վ���������ó���!'); document.stepBack2.submit();</script>";
	return;
}

if (file_exists( '../configuration.php' )) {
	$canWrite = is_writable( '../configuration.php' );
} else {
	$canWrite = is_writable( '..' );
}

if ($siteUrl) {
	$configArray['siteUrl']=$siteUrl;
	// Fix for Windows
	$absolutePath= str_replace("\\","/", $absolutePath);
	$configArray['absolutePath']=$absolutePath;

	$config = "<?php\n";
	$config .= "\$mosConfig_offline = '0';\n";
	$config .= "\$mosConfig_host = '{$configArray['DBhostname']}';\n";
	$config .= "\$mosConfig_user = '{$configArray['DBuserName']}';\n";
	$config .= "\$mosConfig_password = '{$configArray['DBpassword']}';\n";
	$config .= "\$mosConfig_db = '{$configArray['DBname']}';\n";
	$config .= "\$mosConfig_dbprefix = '{$configArray['DBPrefix']}';\n";
	$config .= "\$mosConfig_lang = 'simplified_chinese';\n";
	$config .= "\$mosConfig_alang = 'simplified_chinese';\n";
	$config .= "\$mosConfig_absolute_path = '{$configArray['absolutePath']}';\n";
	$config .= "\$mosConfig_live_site = '{$configArray['siteUrl']}';\n";
	$config .= "\$mosConfig_sitename = '{$configArray['sitename']}';\n";
	$config .= "\$mosConfig_shownoauth = '0';\n";
	$config .= "\$mosConfig_useractivation = '1';\n";
	$config .= "\$mosConfig_uniquemail = '1';\n";
	$config .= "\$mosConfig_offline_message = '��վ����ά������!<br /> ���Ժ�����!';\n";
	$config .= "\$mosConfig_error_message = '��վ��������!<br /> ����ϵ����Ա!';\n";
	$config .= "\$mosConfig_debug = '0';\n";
	$config .= "\$mosConfig_lifetime = '900';\n";
	$config .= "\$mosConfig_MetaDesc = 'Mambo - the dynamic portal engine and content management system';\n";
	$config .= "\$mosConfig_MetaKeys = 'mambo, Mambo, MamboChina, Mambo�й�, mambochina, mambo�й�';\n";
	$config .= "\$mosConfig_MetaTitle = '1';\n";
	$config .= "\$mosConfig_MetaAuthor = '1';\n";
	$config .= "\$mosConfig_locale = 'cn';\n";
	$config .= "\$mosConfig_offset = '0';\n";
	$config .= "\$mosConfig_hideAuthor = '0';\n";
	$config .= "\$mosConfig_hideCreateDate = '0';\n";
	$config .= "\$mosConfig_hideModifyDate = '0';\n";
	$config .= "\$mosConfig_hidePdf = '".intval( !is_writable( "{$configArray['absolutePath']}/media/" ) )."';\n";
	$config .= "\$mosConfig_hidePrint = '0';\n";
	$config .= "\$mosConfig_hideEmail = '0';\n";
	$config .= "\$mosConfig_enable_log_items = '0';\n";
	$config .= "\$mosConfig_enable_log_searches = '0';\n";
	$config .= "\$mosConfig_enable_stats = '0';\n";
	$config .= "\$mosConfig_sef = '0';\n";
	$config .= "\$mosConfig_vote = '0';\n";
	$config .= "\$mosConfig_gzip = '0';\n";
	$config .= "\$mosConfig_multipage_toc = '1';\n";
	$config .= "\$mosConfig_allowUserRegistration = '1';\n";
	$config .= "\$mosConfig_link_titles = '0';\n";
	$config .= "\$mosConfig_error_reporting = -1;\n";
	$config .= "\$mosConfig_list_limit = '10';\n";
	$config .= "\$mosConfig_caching = '0';\n";
	$config .= "\$mosConfig_cachepath = '{$configArray['absolutePath']}/cache';\n";
	$config .= "\$mosConfig_cachetime = '900';\n";
	$config .= "\$mosConfig_mailer = 'mail';\n";
	$config .= "\$mosConfig_mailfrom = '$adminEmail';\n";
	$config .= "\$mosConfig_fromname = '{$configArray['sitename']}';\n";
	$config .= "\$mosConfig_smtpauth = '0';\n";
	$config .= "\$mosConfig_smtpuser = '';\n";
	$config .= "\$mosConfig_smtppass = '';\n";
	$config .= "\$mosConfig_smtphost = 'localhost';\n";
	$config .= "\$mosConfig_back_button = '1';\n";
	$config .= "\$mosConfig_item_navigation = '1';\n";
	$config .= "\$mosConfig_secret = '" . mosMakePassword(16) . "';\n";
	$config .= "\$mosConfig_pagetitles = '1';\n";
	$config .= "\$mosConfig_readmore = '1';\n";
	$config .= "\$mosConfig_hits = '1';\n";
	$config .= "\$mosConfig_icons = '1';\n";
	$config .= "setlocale (LC_TIME, \$mosConfig_locale);\n";
	$config .= "?>";

	if ($canWrite && ($fp = fopen("../configuration.php", "w"))) {
		fputs( $fp, $config, strlen( $config ) );
		fclose( $fp );
	} else {
		$canWrite = false;
	}

	$cryptpass=md5($adminPassword);

	mysql_connect($DBhostname, $DBuserName, $DBpassword);
	mysql_select_db($DBname);

	// create the admin user
	$installdate = date("Y-m-d H:i:s");
	$query = "INSERT INTO `{$DBPrefix}users` VALUES (62, 'Administrator', 'admin', '$adminEmail', '$cryptpass', 'superadministrator', 0, 1, 25, '$installdate', '0000-00-00 00:00:00', '', '')";
	mysql_query( $query );
	// add the ARO (Access Request Object)
	$query = "INSERT INTO `{$DBPrefix}core_acl_aro` VALUES (10,'users','62',0,'Administrator',0)";
	mysql_query( $query );
	// add the map between the ARO and the Group
	$query = "INSERT INTO `{$DBPrefix}core_acl_groups_aro_map` VALUES (25,'',10)";
	mysql_query( $query );

	if (@chmod ($absolutePath."/images/", 0777) &&
	@chmod ($absolutePath."/components/", 0707) &&
	@chmod ($absolutePath."/modules/", 0707) &&
	@chmod ($absolutePath."/templates/", 0707) &&
	@chmod ($absolutePath."/language/", 0707) &&
	@chmod ($absolutePath."/media/", 0777) &&
	@chmod ($absolutePath."/administrator/components/", 0707) &&
	@chmod ($absolutePath."/administrator/backups/", 0707)) {
		$chmod_report = "���Ŀ¼�ķ���Ȩ���������!";
	} else {
		$chmod_report = "����Ŀ¼�ķ���Ȩ������δ�ܳɹ�!���ֶ�������������Ŀ¼�ķ���Ȩ��(chmod 777):<br />
		<strong>/images<br />
		/components/<br />
		/language/<br />
		/modules/<br />
		/templates/<br />
		/media/<br />
		/administrator/components/<br />
		/administrator/backups/</strong>";
	}
} else { ?>
<form action="install3.php" method="post" name="stepBack3" id="stepBack3">
  <input type="hidden" name="DBhostname" value="<?php echo $DBhostname;?>" />
  <input type="hidden" name="DBusername" value="<?php echo $DBuserName;?>" />
  <input type="hidden" name="DBpassword" value="<?php echo $DBpassword;?>" />
  <input type="hidden" name="DBname" value="<?php echo $DBname;?>" />
  <input type="hidden" name="DBPrefix" value="<?php echo $DBPrefix;?>" />
  <input type="hidden" name="DBcreated" value="1" />
  <input type="hidden" name="sitename" value="<?php echo $sitename;?>" />
</form>
<?php
echo "<script>alert('վ��URL���ó���!'); document.stepBack3.submit();</script>";
}

?>
<?php echo "<?xml version=\"1.0\" encoding=\"gbk\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mambo - ��װ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="stylesheet" href="install.css" type="text/css" />
</head>
<body>
<div id="wrapper">
    <div id="header">
    <div id="mambo"><img src="header_install.png" alt="Mambo ��װ" /></div>
    </div>
</div>
<div id="ctr" align="center">
		<form name="form" id="form">

	<div class="install">
		<div id="stepbar">
			<div class="step-off">��װǰ�ļ��</div>
			<div class="step-off">���Э��</div>
			<div class="step-off">��һ��</div>
			<div class="step-off">�ڶ���</div>
			<div class="step-off">������</div>
			<div class="step-on">���Ĳ�</div>
		</div>
		<div id="right">

	 <div id="step">���Ĳ�</div>

	 <div class="far-right">

	   <input class="button" type="button" name="runSite" value="���վ��"
     		<?php if ($siteUrl){
     			print "onClick='window.location.href=\"$siteUrl"."/index.php\" '";
     		}	else {
     			print "onClick='window.location.href=\"{$configArray['siteURL']}"."/index.php\" '";
     		}
    		?> />
    	   <input class="button" type="button" name="Admin" value="����վ��"
     		<?php
     		if ($siteUrl){
     			print "onClick='window.location.href=\"$siteUrl"."/administrator/index.php\" '";
     		} else {
     			print "onClick='window.location.href=\"{$configArray['siteURL']}"."/administrator/index.php\" '";
     		}
    		?> />
    	</div>
    	<div class="clr"></div>
    	<h1>��ϲ!Mambo 4.5.1�ȶ��� ��װ�ɹ�!</h1>
    	 <div class="install-text">

	   <p>��������վ�㡱�Ϳ��Բ鿴���Mambo�ˡ����߽��롰����վ�㡱���������Mambo�ĸ��Ի����á�
    		</p></div>

	 <div class="install-form">

	   <div class="form-block">
    	  	<table width="100%">

		  <tr>

		    <td colspan="2" class="error" align="center">���ס��Ϊ�˰�ȫ���ǣ����ڰ�װ��ɺ��Ƴ���װĿ¼!</td></tr>

		  <tr>

		    <td colspan="2" align="center"><h5>����Ա�ʺż�����</h5></td></tr>

		  <tr>

		    <td colspan="2" align="center" class="notice"><b>�ʺ� : admin</b></td></tr>

		  <tr>

		    <td colspan="2" align="center" class="notice"><b>���� : <?php echo $adminPassword; ?></b></td></tr>

		  <tr>

		    <td colspan="2">&nbsp;</td></tr>

		  <tr>

		    <td colspan="2" align="right">&nbsp;</td></tr>

		  <?php
    		  	if (!$canWrite) {
    		  	?>

		  <tr>

		    <td colspan="2" class="small"> �뽫�¿�����ݸ���ճ����configuration.php����ʽ���浽��ķ������ϡ�
							</td></tr>

		  <tr>

		    <td colspan="2" align="center">
    							<textarea rows="5" cols="60" name="configcode" onclick="javascript:this.form.configcode.focus();this.form.configcode.select();" ><?php echo htmlspecialchars( $config );?></textarea>
    					</td></tr>

		  <?php
    		  	}
    		  	?>

		  <tr>

		    <td colspan="2" class="small">
			 <?php //echo $chmod_report; ?>
		    </td></tr>

		</table></div></div>
    	<div id="break"></div>
		</div>
		<div class="clr"></div>
		</form>
	</div>
	<div class="clr"></div>
	<div class="ctr">
	   Miro International Pty Ltd. &copy;2000 - 2004 All rights reserved. <br />
	   <a href="http://www.mamboserver.com" target="_blank">Mambo</a> is Free Software released under the GNU/GPL License.
<br>����װ������ <a href="http://www.mambochina.net" target="_blank">Mambo�й�</a> ����С�麺��
	</div>
</div>
</html>

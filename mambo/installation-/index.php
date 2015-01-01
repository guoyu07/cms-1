<?php
/**
* @version $Id: index.php,v 1.35 2004/09/20 15:17:03 prazgod Exp $
* @package Mambo_4.5.1
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

if (file_exists( "../configuration.php" ) && filesize( "../configuration.php" ) > 10) {
	header( "Location: ../index.php" );
	exit();
}
require_once ("../includes/version.php");

/** Include common.php */
include_once( "common.php" );

function get_php_setting($val) {
	$r =  (ini_get($val) == '1' ? 1 : 0);
	return $r ? 'ON' : 'OFF';
}

function writableCell( $folder ) {
	echo '<tr>';
	echo '<td class="item">' . $folder . '/</td>';
	echo '<td align="left">';
	echo is_writable( "../$folder" ) ? '<b><font color="green">��д</font></b>' : '<b><font color="red">����д</font></b>' . '</td>';
	echo '</tr>';
}
?>

<?php echo "<?xml version=\"1.0\" encoding=\"gbk\"?".">"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mambo - ��װ����</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link rel="shortcut icon" href="../../images/favicon.ico" />
<link rel="stylesheet" href="install.css" type="text/css" />
<script>
var checkobj
function agreesubmit(el){
	checkobj=el
	if (document.all||document.getElementById){
		for (i=0;i<checkobj.form.length;i++){  //hunt down submit button
		var tempobj=checkobj.form.elements[i]
		if(tempobj.type.toLowerCase()=="submit")
		tempobj.disabled=!checkobj.checked
		}
	}
}

function defaultagree(el){
	if (!document.all&&!document.getElementById){
		if (window.checkobj&&checkobj.checked)
		return true
		else{
			alert("������Ķ���ͬ������Э����ܼ�����װ��")
			return false
		}
	}
}

</script>
</head>
<body>

<div id="wrapper">
<div id="header">

<div id="mambo"><img src="header_install.png" alt="Mambo ��װ" /></div>
</div>
</div>

<div id="ctr" align="center">
<div class="install">
<div id="stepbar">
<div class="step-on">��װǰ�ļ�顡</div>
<div class="step-off">���Э��</div>
<div class="step-off">��һ��</div>
<div class="step-off">�ڶ���</div>
<div class="step-off">������</div>
<div class="step-off">���Ĳ�</div>
</div>
<div id="right">

<div id="step">��װǰ�ļ��</div>

<div class="far-right">
<input name="Button2" type="submit" class="button" value="��һ�� >>" onclick="window.location='install.php';" />
</div>
<div class="clr"></div>

<h1>Mambo <?php echo $version; ?> �Լ�:</h1>
<div class="install-text">
�����һ���Ժ�ɫ��ʾ�����޸ĸ�����ȷ�� Mambo <?php echo $version; ?>��������װ!
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="item">
	PHP �汾 >= 4.1.0
	</td>
	<td align="left">
	<?php echo phpversion() < '4.1' ? '<b><font color="red">�汾̫��</font></b>' : '<b><font color="green">���԰�װ</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - zlib ѹ��֧��
	</td>
	<td align="left">
	<?php echo extension_loaded('zlib') ? '<b><font color="green">����</font></b>' : '<b><font color="red">������</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - XML ֧��
	</td>
	<td align="left">
	<?php echo extension_loaded('xml') ? '<b><font color="green">����</font></b>' : '<b><font color="red">������</font></b>';?>
	</td>
</tr>
<tr>
	<td>
	&nbsp; - MySQL ֧��
	</td>
	<td align="left">
	<?php echo function_exists( 'mysql_connect' ) ? '<b><font color="green">����</font></b>' : '<b><font color="red">������</font></b>';?>
	</td>
</tr>
<tr>
	<td valign="top" class="item">
	configuration.php
	</td>
	<td align="left">
	<?php
  if (@file_exists('../configuration.php') &&  @is_writable( '../configuration.php' )){
      echo '<b><font color="green">��д</font></b>';
    } else if (is_writable( '..' )) {
      echo '<b><font color="green">��д</font></b>';
    } else {
      echo '<b><font color="red">����д</font></b><br /><span class="small">��ʹ��������Ҳ���Լ�����ɰ�װ�Ĺ��̣��������������뽫��ʾ�����ݸ���ճ����configuration.php���ϴ�����ķ�����!</span>';
    } ?>
	</td>
</tr>
<tr>
	<td class="item">
	Session ����·��
	</td>
	<td align="left">
	<b><?php echo (($sp=ini_get('session.save_path'))?$sp:'û������'); ?></b>,
	<?php echo is_writable( $sp ) ? '<b><font color="green">��д</font></b>' : '<b><font color="red">����д</font></b>';?>
	</td>
</tr>
</table>
</div>
</div>
<div class="clr"></div>

<h1>�Ƽ�����:</h1>
<div class="install-text">
���������� Mambo ��PHP�����Ƽ����á�
<br />
���ǣ���ʹ���ĳЩ�������Ƽ����ò�ƥ�䣬MamboҲ���Լ������а�װ�����С�
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<tr>
	<td class="toggle">
	PHP����
	</td>
	<td class="toggle">
	�Ƽ�����
	</td>
	<td class="toggle">
	��ǰ����
	</td>
</tr>
<tr>
	<td class="item">
	��ȫģʽ:
	</td>
	<td class="toggle">
	OFF
	</td>
	<td>
	<?php
	if ( get_php_setting('safe_mode') == 'OFF' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red"><b>
		<?php
	}
	echo get_php_setting('safe_mode');	?>
	</b></font>
	<td>
</tr>
<tr>
	<td class="item">
	��ʾ������Ϣ:
	</td>
	<td class="toggle">
	ON
	</td>
	<td>
	<?php
	if ( get_php_setting('display_errors') == 'ON' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('display_errors');?>
	</b></font>
	</td>
</tr>
<tr>
	<td class="item">
	�ļ��ϴ�:
	</td>
	<td class="toggle">
	ON
	</td>
	<td>
	<?php
	if ( get_php_setting('file_uploads') == 'ON' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('file_uploads');?>
	</b></font>
	</td>
</tr>
<tr>
	<td class="item">
	Magic Quotes GPC:
	</td>
	<td class="toggle">
	ON
	</td>
	<td>
	<?php
	if ( get_php_setting('magic_quotes_gpc') == 'ON' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('magic_quotes_gpc');?>
	</b></font>
	</td>
</tr>
<tr>
        <td class="item">
        Magic Quotes Runtime:
        </td>
        <td class="toggle">
        OFF
        </td>
        <td>
        <?php
        if ( get_php_setting('magic_quotes_runtime') == 'OFF' ) {
                ?>
                <font color="green"><b>
                <?php
        } else {
                ?>
                <font color="red" style="bold"><b>
                <?php
        }
        echo get_php_setting('magic_quotes_runtime');?>
        </b></font>
        </td>
</tr>

<tr>
	<td class="item">
	Register Globals:
	</td>
	<td class="toggle">
	OFF
	</td>
	<td>
	<?php
	if ( get_php_setting('register_globals') == 'OFF' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('register_globals');?>
	</b></font>
	</td>
</tr>
<tr>
	<td class="item">
	�������:
	</td>
	<td class="toggle">
	OFF
	</td>
	<td>
	<?php
	if ( get_php_setting('output_buffering') == 'OFF' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('output_buffering');
	?>
	</b></font>
	</td>

</tr>
<tr>
	<td class="item">
	Session auto start:
	</td>
	<td class="toggle">
	OFF
	</td>
	<td>
	<?php
	if ( get_php_setting('session.auto_start') == 'OFF' ) {
		?>
		<font color="green"><b>
		<?php
	} else {
		?>
		<font color="red" style="bold"><b>
		<?php
	}
	echo get_php_setting('session.auto_start');?>
	</b></font>
	</td>
</tr>
</table>
</div>
</div>
<div class="clr"></div>

<h1>Ŀ¼���ļ���Ȩ��:</h1>
<div class="install-text">
Ϊ������������ Mambo ����Щ�ļ����ļ��б����п�д��Ȩ�ޡ�����㿴��������д�������ڷ��������޸���������!
<div class="clr">&nbsp;&nbsp;</div>
<div class="ctr"></div>
</div>

<div class="install-form">
<div class="form-block">

<table class="content">
<?php
writableCell( 'administrator/backups' );
writableCell( 'administrator/components' );
writableCell( 'administrator/modules' );
writableCell( 'administrator/templates' );
writableCell( 'cache' );
writableCell( 'components' );
writableCell( 'images' );
writableCell( 'images/banners' );
writableCell( 'images/stories' );
writableCell( 'language' );
writableCell( 'mambots' );
writableCell( 'mambots/content' );
writableCell( 'mambots/search' );
writableCell( 'media' );
writableCell( 'modules' );
writableCell( 'templates' );
?>
</table>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>
<div class="clr"></div>
</div>

<div class="ctr">
Miro International Pty Ltd. &copy;2000 - 2004 All rights reserved.<br />
<a href="http://www.mamboserver.com" target="_blank">Mambo</a> is Free Software released under the GNU/GPL License.
<br>����װ������ <a href="http://www.mambochina.net" target="_blank">Mambo�й�</a> ����С�麺��
</div>

</body>
</html>

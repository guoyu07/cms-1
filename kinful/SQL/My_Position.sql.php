<?php
/********************************************************/
/*****                 @!!@                          ****/
/********************************************************/
/**
 *@FileName : MY_.sql.php
 *@Author    : WangKilin
 *@Email    : wangkilin@126.com
 *@Date        : 2007-4-14
 *@Homepage    : http://www.kinful.com
 *@Version    : 0.1
 */
defined('Kinful') or die("forbidden");

if (!isset($My_Sql) || !is_array($My_Sql)) {
    $My_Sql = array();
}

$My_Sql['getAllPositions'] = 'select * from #._position';

/* EOF */

<?php
//$content = file_get_contents('http://astro.sina.com.cn/pc/west/frame2_11.html');
//$content = file_get_contents('frame2_11.html');
if (isset($update_xz) && ($content = getUrlContent('http://astro.sina.com.cn/pc/west/frame2_'.$update_xz.'.html'))) {

//echo $content;
preg_match("/<!-- SUDA_CODE_END -->.*<!-- Start  Wrating  -->/si", $content, $match);
//preg_match("/<li class=\"notes\">(.*)<\/li>/i", $content, $notes);
preg_match("/<li class=\"date\">��Ч����:(.*)<\/li>/i", $content, $dates);
//$title= $notes[1];
//print_r($match);
$yxqx = $dates[1];

$match[0] = str_replace("\n", '', $match[0]);
$match[0] = str_replace("</div>", "\n", $match[0]);
preg_match_all("/<h4>(.*)<\/h4>(.*)/i", $match[0], $match1);
//print_r($match1);
foreach($match1[1] as $k=>$m) {
    switch(substr($m, 0, 8)) {
        case '��������':
            $ztzs = substr_count($match1[1][$k], '<img');
		    $ztys = $match1[2][$k];
            break;
        case '��ѹ��ʽ':
		    $jyfs = $match1[2][$k];
            break;
        case '����С��':
		    $xyw = $match1[2][$k];
            break;
        case 'Ͷ�����':
            $tzzs   = substr_count($match1[1][$k], '<img');
		    $tzys = $match1[2][$k];
            break;
        case '��������':
            $aqzs  = substr_count($match1[1][$k], '<img');
		    $aqys = $match1[2][$k];
            break;

    }
}

$db->query("update xzysmonth set yxqx =?
                 , ztzs=?
				 , ztys =?
				 , aqzs=?
				 , aqys=?
				 , tzzs =?
				 , tzys =?
				 , jyfs =?
				 , xyw =?
				 , update_date=? 	where id = ?"
		     , array($yxqx, $ztzs, $ztys, $aqzs
				  , $aqys, $tzzs, $tzys, $jyfs
				  , $xyw, $update_date, $update_xz+1));  
}
?>
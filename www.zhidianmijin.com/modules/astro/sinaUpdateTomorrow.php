<?php
//$content = file_get_contents('http://astro.sina.com.cn/pc/west/frame1_11.html');
//$content = file_get_contents('frame0_11_1.html');
if (isset($update_xz) && ($content = getUrlContent('http://astro.sina.com.cn/pc/west/frame0_'.$update_xz.'_1.html'))) {
preg_match("/<!-- SUDA_CODE_END -->.*<!-- Start  Wrating  -->/si", $content, $match);
preg_match("/<li class=\"datea\">��Ч����:(.*)<\/li>/i", $content, $dates);
$yxqx = $dates[1];

$match[0] = str_replace("\n", '', $match[0]);
preg_match("/<div class=\"lotconts\">(.*)<\/div>/i", $match[0], $zhpg);
$zhpg = $zhpg[1];
$match[0] = str_replace("</div>", "\n", $match[0]);
preg_match_all("/<h4>(.*)<\/h4>(.*)/i", $match[0], $match1);
//print_r($match1);
foreach($match1[1] as $k=>$m) {
    switch(substr($m, 0, 8)) {
        case '�ۺ�����':
            $zhys = substr_count($match1[2][$k], '<img');
            break;
        case '����ָ��':
            $jkzs   = $match1[2][$k];
            break;
        case '����״��':
            $gzzk   = substr_count($match1[2][$k], '<img');
            break;
        case '���Ͷ��':
            $nctz   = substr_count($match1[2][$k], '<img');
            break;
        case '��̸ָ��':
            $stzs   = $match1[2][$k];
            break;
        case '������ɫ':
            $xyys   = $match1[2][$k];
            break;
        case '��������':
            $aqys  = substr_count($match1[2][$k], '<img');
            break;
        case '��������':
            $xysz   = $match1[2][$k];
            break;
        case '��������':            
            $spxz   = $match1[2][$k];
            break;

    }
}

$db->query ("update xzysnextday set 
        yxqx=?,
        zhys=?,
        aqys=?,
        gzzk=?,
        nctz=?,
        jkzs=?,
        stzs=?,
        xyys=?,
        xysz=?,
        spxz=?,
        zhpg=?
		, update_date=? 	where id = ?"
  , array(
         $yxqx,
         $zhys,
         $aqys,
         $gzzk,
         $nctz,
         $jkzs,
         $stzs,
         $xyys,
         $xysz,
         $spxz,
         $zhpg
        ,$update_date, $update_xz+1)); 
}
?>
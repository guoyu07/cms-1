<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?>
<?php if($_SGLOBAL['member']['groupid'] == 1) { ?>
<div class="bdrcontent">
<div class="title"><h3>��ӭ���ٹ���ƽ̨</h3></div>
<p>ͨ����¼����ƽ̨�������Զ�վ��Ĳ����������ã������Լ�ʱ��ȡ�ٷ��ĸ��¶�̬����Ҫ����ͨ�档</p>
</div>
<br />

<div class="bdrcontent">
<div class="title">
<h3>�ٷ����¶�̬</h3>
<p>�ٷ��°汾�ķ�������Ҫ�����������ȶ�̬��������������ʾ��</p>
</div>
<div id="customerinfor" style="line-height:1.5em;"></div>
<br />
<div class="title">
<h3>����֧�ַ���</h3>
<p>�������ʹ�����������⣬���Է�������SupeSiteվ���������</p>
</div>
<ul class="listcol list2col">
<li><a href="http://www.discuz.net/forum-75-1.html" target="_blank">SupeSite�ٷ���̳</a></li>
<li><a href="http://www.comsenz.com/purchase/supesite" target="_blank">Comsenz��ҵ֧�ַ���</a></li>
</ul>
</div>
<br />

<div class="bdrcontent">
<div class="title">
<h3>վ������ͳ��</h3>
<p>ͨ��վ��ͳ�ƣ��������������վ��ķ�չ״����</p>
</div>
<ul class="listcol list2col">
<li>ȫ����Ѷ��: <?=$statistics['spaceitemnum']?></li>
<li>ȫ��������: <?=$statistics['spacecommentnum']?></li>
<li>ȫ���û�����: <?=$statistics['usergroupnum']?></li>
<li>ȫ���ٱ���: <?=$statistics['reportnum']?></li>
<li>ȫ�������: <?=$statistics['adnum']?></li>
<li>ȫ��������: <?=$statistics['announcementnum']?></li>
<li>ȫ��������: <?=$statistics['attachmentnum']?></li>
<li>ȫ���ۺ���̳�����: <?=$statistics['forumnum']?></li>
<li>ȫ����Ѷ������: <?=$statistics['categorynum']?></li>
<li>ȫ��Ƶ����: <?=$statistics['channelnum']?></li>
<li>ȫ������������: <?=$statistics['friendlinknum']?></li>
<li>ȫ���û���: <?=$statistics['membernum']?></li>
<li>ȫ��ģ����: <?=$statistics['modelnum']?></li>
<li>ȫ��ͶƱ��: <?=$statistics['pollnum']?></li>
<li>ȫ��TAG��: <?=$statistics['tagnum']?></li>
<li>ȫ���ɼ�����: <?=$statistics['robotnum']?></li>
</ul>
</div>
<br />

<div class="bdrcontent">
<div class="title"><h3>�������ݿ�/�汾</h3></div>
<ul>
<li>����ϵͳ: <?=$os?></li>
<li>���ݿ�汾: <?=$statistics['mysql']?></li>
<li>�ϴ����: <?=$fileupload?></li>
<li>���ݿ�ߴ�: <?=$dbsize?></li>
<li>�����ߴ�: <?=$attachsize?></li>
<li>��ǰ����汾: SupeSite <?=$statistics['version']?> ( <?=$statistics['release']?> )</li>
<li>UCenter ����汾: UCenter <?=UC_CLIENT_VERSION?> Release <?=UC_CLIENT_RELEASE?></li>
</ul>
</div>
<br />

<div class="bdrcontent">
<div class="title">
<h3>�����Ŷ�</h3>
</div>
<table>
<tr><td>��Ȩ����</td><td><a  href="http://www.comsenz.com/" target="_blank">��ʢ����(����)�Ƽ����޹�˾ (Comsenz Inc.)</a> ��Ʒ����Ȩ��:2006SR12090</td></tr>
<tr><td>�ܲ߻�</td><td><a  href="http://www.discuz.net/space.php?uid=1" target="_blank">Kevin 'Crossday' Day</a>, <a  href="http://www.discuz.net/space.php?uid=174393" target="_blank">Guode 'Sup' Li</a></td></tr>
<tr><td>������֧���Ŷ�</td><td><a  href="http://www.discuz.net/space.php?uid=322293" target="_blank">Qingpeng 'Andy' Zheng</a>, <a  href="http://www.discuz.net/space.php?uid=248739" target="_blank">Jing 'Qiezi' Zou</a>, <a  href="http://www.discuz.net/space.php?uid=672953" target="_blank">Fei 'Fengshu' Zhao</a>, <a  href="http://www.discuz.net/space.php?uid=465273" target="_blank">Lijun 'Maple-x' Zhang</a>, <a  href="http://www.discuz.net/space.php?uid=679269" target="_blank">Lei 'Shitou' Zhao</a>, <a  href="http://www.discuz.net/space.php?uid=906359" target="_blank">Peng 'Dingusxp' Xu</a></td></tr>
<tr><td>�������</td><td><a  href="http://www.discuz.net/space.php?uid=294092" target="_blank">Fangming 'Lushnis' Li</a>, <a  href="http://www.discuz.net/space.php?uid=371830" target="_blank">Yulong 'Dragonlicn' Li</a>, <a  href="http://www.discuz.net/space.php?uid=976941" target="_blank">Jian 'Carrien' Fang</a>, <a  href="http://www.discuz.net/space.php?uid=981306" target="_blank">Jianwei 'Marmotsun' Sun</a></td></tr>
<tr><td>��˾��վ</td><td><a href=http://www.comsenz.com target="_blank">http://www.comsenz.com</a></td></tr>
<tr><td>��Ʒ��վ</td><td><a href=http://x.discuz.net target="_blank">http://x.discuz.net</a></td></tr>
</table>
</div>
<?php if($statistics['update']) { ?>
<script language="javascript" src="http://x.discuz.net/customer/update.php?get=<?=$statistics['update']?>"></script>
<?php } ?>
<?php } elseif(!in_array('1', $menus['0']) && !in_array('1', $menus['1']) && !in_array('1', $menus['2']) && !in_array('1', $menus['3'])) { ?>
<div class="bdrcontent">
<div class="title"><h3>��ӭ���ٹ���ƽ̨</h3></div>
<p>�����߱��κι���Ȩ�ޡ�</p>
</div>
<?php } else { ?>
<div class="bdrcontent">
<div class="title"><h3>��ӭ���ٹ���ƽ̨</h3></div>
<p>ͨ������ƽ̨����������ԶԷ�������Ϣ������������</p>
</div>
<?php } ?>
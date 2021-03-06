<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?>
<?php if($allowlogin) { ?>
<div class="block style1" id="menus_0">
<h2>个人中心</h2>
<ul class="folder">
<li <?=$menuactive['avatar']?>><a href="<?=CPURL?>?action=avatar">头像管理</a></li>
<li <?=$menuactive['profile']?>><a href="<?=CPURL?>?action=profile">邮箱设置</a></li>
<li <?=$menuactive['password']?>><a href="<?=CPURL?>?action=password">密码设置</a></li>
</ul>
</div>
<?php } ?>

<?php if($menus['1']) { ?>
<div class="block style1" id="menus_1">
<h2>系统管理</h2>
<ul class="folder">
<?php if($menus['1']['settings']) { ?>
<li<?=$menuactive['settings']?>><a href="<?=CPURL?>?action=settings">系统设置</a></li>
<?php } ?>

<?php if($menus['1']['channel']) { ?>
<li<?=$menuactive['channel']?>><a href="<?=CPURL?>?action=channel">频道管理</a></li>
<?php } ?>

<?php if($menus['1']['html']) { ?>
<li<?=$menuactive['html']?>><a href="<?=CPURL?>?action=html">静态配置</a></li>
<?php } ?>

<?php if($menus['1']['tpl']) { ?>
<li<?=$menuactive['tpl']?>><a href="<?=CPURL?>?action=tpl">模板编辑</a></li>
<?php } ?>

<?php if($menus['1']['css']) { ?>
<li<?=$menuactive['css']?>><a href="<?=CPURL?>?action=css">样式表编辑</a></li>
<?php } ?>

<?php if($menus['1']['crons']) { ?>
<li<?=$menuactive['crons']?>><a href="<?=CPURL?>?action=crons">计划任务</a></li>
<?php } ?>

<?php if($menus['1']['database']) { ?>
<li<?=$menuactive['database']?>><a href="<?=CPURL?>?action=database">数据库</a></li>
<?php } ?>

<?php if($menus['1']['words']) { ?>
<li<?=$menuactive['words']?>><a href="<?=CPURL?>?action=words">词语过滤</a></li>
<?php } ?>

<?php if($menus['1']['attachmenttypes']) { ?>
<li<?=$menuactive['attachmenttypes']?>><a href="<?=CPURL?>?action=attachmenttypes">附件类型</a></li>
<?php } ?>

<?php if($menus['1']['prefields']) { ?>
<li<?=$menuactive['prefields']?>><a href="<?=CPURL?>?action=prefields">预先值</a></li>
<?php } ?>

<?php if($menus['1']['sitemap']) { ?>
<li<?=$menuactive['sitemap']?>><a href="<?=CPURL?>?action=sitemap">SITEMAP</a></li>
<?php } ?>

<?php if($menus['1']['polls']) { ?>
<li<?=$menuactive['polls']?>><a href="<?=CPURL?>?action=polls">投票</a></li>
<?php } ?>

<?php if($menus['1']['customfields']) { ?>
<li<?=$menuactive['customfields']?>><a href="<?=CPURL?>?action=customfields">资讯自定义字段</a></li>
<?php } ?>

<?php if($menus['1']['announcements']) { ?>
<li<?=$menuactive['announcements']?>><a href="<?=CPURL?>?action=announcements">公告管理</a></li>
<?php } ?>

<?php if($menus['1']['ad']) { ?>
<li<?=$menuactive['ad']?>><a href="<?=CPURL?>?action=ad">广告</a></li>
<?php } ?>

<?php if($menus['1']['friendlinks']) { ?>
<li<?=$menuactive['friendlinks']?>><a href="<?=CPURL?>?action=friendlinks">友情链接</a></li>
<?php } ?>

<?php if($menus['1']['cache']) { ?>
<li<?=$menuactive['cache']?>><a href="<?=CPURL?>?action=cache">缓存更新</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['2']) { ?>
<div class="block style1" id="menus_2">
<h2>信息管理</h2>
<ul class="folder">
<?php if($menus['2']['spacenews']) { ?>
<li<?=$menuactive['spacenews']?>><a href="<?=CPURL?>?action=spacenews">资讯管理</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php if($menus['2']['modelmanages']) { ?>
<li><a href="<?=CPURL?>?action=modelmanages&mid=<?=$value['mid']?>"><?=$value['modelalias']?>管理</a></li>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php if($menus['2']['categories']) { ?>
<li<?=$menuactive['categories']?>><a href="<?=CPURL?>?action=categories">资讯分类</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php if($menus['2']['modelcategories']) { ?>
<li><a href="<?=CPURL?>?action=modelcategories&mid=<?=$value['mid']?>"><?=$value['modelalias']?>分类</a></li>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php if($menus['2']['check']) { ?>
<li<?=$menuactive['check']?>><a href="<?=CPURL?>?action=check">资讯等级审核</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php if($menus['2']['modelfolders']) { ?>
<li><a href="<?=CPURL?>?action=modelfolders&mid=<?=$value['mid']?>"><?=$value['modelalias']?>等级审核</a></li>
<?php } ?>
<?php } } ?>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['3']) { ?>
<div class="block style1" id="menus_3">
<h2>用户管理</h2>
<ul class="folder">
<?php if($menus['3']['member']) { ?>
<li<?=$menuactive['member']?>><a href="<?=CPURL?>?action=member">用户管理</a></li>
<?php } ?>

<?php if($menus['3']['usergroups']) { ?>
<li<?=$menuactive['usergroupsadd']?>><a href="<?=CPURL?>?action=usergroups&op=add">添加用户组</a></li>
<?php } ?>

<?php if($menus['3']['usergroups']) { ?>
<li<?=$menuactive['usergroups']?>><a href="<?=CPURL?>?action=usergroups">用户组</a></li>
<?php } ?>

<?php if($menus['3']['delmembers']) { ?>
<li<?=$menuactive['delmembers']?>><a href="<?=CPURL?>?action=delmembers">恢复被禁用户</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['4']) { ?>
<div class="block style1" id="menus_4">
<h2>模块管理</h2>
<ul class="folder">
<?php if($menus['4']['blocks']) { ?>
<li<?=$menuactive['blocksadd']?>><a href="<?=CPURL?>?action=blocks&op=add">创建模块</a></li>
<?php } ?>

<?php if($menus['4']['blocks']) { ?>
<li<?=$menuactive['blocks']?>><a href="<?=CPURL?>?action=blocks">模块管理</a></li>
<?php } ?>

<?php if($menus['4']['styles']) { ?>
<li<?=$menuactive['stylesadd']?>><a href="<?=CPURL?>?action=styles&op=add">添加新风格</a></li>
<?php } ?>

<?php if($menus['4']['styles']) { ?>
<li<?=$menuactive['styles']?>><a href="<?=CPURL?>?action=styles">模块风格</a></li>
<?php } ?>

<?php if($menus['4']['styletpl']) { ?>
<li<?=$menuactive['styletpl']?>><a href="<?=CPURL?>?action=styletpl">风格模板</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['5']) { ?>
<div class="block style1" id="menus_5">
<h2>批量维护</h2>
<ul class="folder">
<?php if($menus['5']['items']) { ?>
<li<?=$menuactive['items']?>><a href="<?=CPURL?>?action=items">主题管理</a></li>
<?php } ?>

<?php if($menus['5']['comments']) { ?>
<li<?=$menuactive['comments']?>><a href="<?=CPURL?>?action=comments">评论管理</a></li>
<?php } ?>

<?php if($menus['5']['attachments']) { ?>
<li<?=$menuactive['attachments']?>><a href="<?=CPURL?>?action=attachments">上传附件管理</a></li>
<?php } ?>

<?php if($menus['5']['tags']) { ?>
<li<?=$menuactive['tags']?>><a href="<?=CPURL?>?action=tags">TAG管理</a></li>
<?php } ?>

<?php if($menus['5']['reports']) { ?>
<li<?=$menuactive['reports']?>><a href="<?=CPURL?>?action=reports">举报信息管理</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['6']) { ?>
<div class="block style1" id="menus_6">
<h2>采集管理</h2>
<ul class="folder">
<?php if($menus['6']['robots']) { ?>
<li<?=$menuactive['robotsadd']?>><a href="<?=CPURL?>?action=robots&op=add">添加新机器人</a></li>
<?php } ?>

<?php if($menus['6']['robots']) { ?>
<li<?=$menuactive['robots']?>><a href="<?=CPURL?>?action=robots">采集器</a></li>
<?php } ?>

<?php if($menus['6']['robotmessages']) { ?>
<li<?=$menuactive['robotmessages']?>><a href="<?=CPURL?>?action=robotmessages">采集文章管理</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['7']) { ?>
<div class="block style1" id="menus_7">
<h2>模型管理</h2>
<ul class="folder">
<?php if($menus['7']['models']) { ?>
<li<?=$menuactive['modelsadd']?>><a href="<?=CPURL?>?action=models&op=add">新建模型</a></li>
<?php } ?>

<?php if($menus['7']['models']) { ?>
<li<?=$menuactive['models']?>><a href="<?=CPURL?>?action=models">模型管理</a></li>
<?php } ?>

<?php if($menus['7']['models']) { ?>
<li<?=$menuactive['modelsimport']?>><a href="<?=CPURL?>?action=models&op=import">模型备份</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['8']) { ?>
<div class="block style1" id="menus_8">
<h2>聚合设置</h2>
<ul class="folder">
<?php if($menus['8']['bbs']) { ?>
<li<?=$menuactive['bbs']?>><a href="<?=CPURL?>?action=bbs">论坛设置</a></li>
<?php } ?>

<?php if($menus['8']['bbsforums']) { ?>
<li<?=$menuactive['bbsforums']?>><a href="<?=CPURL?>?action=bbsforums">版块聚合</a></li>
<?php } ?>

<?php if($menus['8']['threads']) { ?>
<li<?=$menuactive['threads']?>><a href="<?=CPURL?>?action=threads">帖子批量聚合</a></li>
<?php } ?>

<?php if($menus['8']['uchome']) { ?>
<li<?=$menuactive['uchome']?>><a href="<?=CPURL?>?action=uchome">UCHome设置</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<script>cpmenus(<?=$acid?>);</script>
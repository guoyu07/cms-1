<input name="name1" type="text" value="<?$xing1?><?$xing2?><?$ming1?><?$ming2?>" />
          &nbsp;
          <select size="1" name="xing1">
<option value="1" <?if (!$xing2) { ?>selected="selected"<?/if?>>����</option>
<option value="2"<?if ($xing2<>"") { ?>selected="selected"<?/if?>>����</option>
          </select>
          &nbsp;
          <select size="1" name="sex1">
<option value="��" <?if ($xingbie=="��") { ?>selected="selected"<?} ?>>����</option>
<option value="Ů" <?if ($xingbie=="Ů") { ?>selected="selected"<?} ?>>Ů��</option>
          </select><br /><br /><div id="fs11" style="display:none">
<div class="divh2"></div>����/�������գ�<select size="1" name="y1"><?for ($i=1900; $i<=date("Y", time()); $i++) { ?><option value="<?$i?>" <?if ($nian1<>'' ) { ?><?if ($i==$nian1) { ?> selected<?} ?><?} else { ?><?if ($i==date("Y", time())) { ?> selected<?} ?><?} ?>><?$i?></option><?} ?></select>��<select name="m1" size="1"><?for ($i=1; $i<=12; $i++) {?><option value="<?$i?>" <?if ($yue1<>'' ) { ?><?if ($i==$yue1) { ?> selected<?} ?><?} else { ?><?if ($i==date("n", time())) { ?> selected<?} ?><?} ?>><?$i?></option><?} ?></select>��<select name="d1" size="1"><?for ($i=1; $i<=31; $i++) {?><option value="<?$i?>" <?if ($ri1<>'' ) { ?><?if ($i==$ri1) { ?> selected<?} ?><?} else { ?><?if ($i=date("j", time())) { ?> selected<?} ?><?} ?>><?$i?></option><?} ?></select>��<select size="1" name="h1"> <?for ($i=0; $i<=23; $i++) {?><option value="<?$i?>" <?if ($hh1<>'' ) { ?><?if ($i==$hh1) { ?> selected<?} ?><?} ?>><?DiZhi($i)?><?$i?></option><?} ?> </select>��<select size="1" name="f1"><option value="0">δ֪</option>
		<?for ($i=0; $i<=59; $i++) {?><option value="<?$i?>" <?if ($mm1<>'' ) { ?><?if ($i==$mm1) { ?> selected<?} ?><?} ?>><?$i?></option><?} ?>
		</select>��&nbsp;<a title="�����ֻ֪�����յ�ũ�����ڣ���Ҫ�����������ȥ��ѯ��������" style="CURSOR: hand" onClick="window.open('../wannianli.htm','httpcnnongli','left=0,top=0,width=680,height=480,scrollbars=no,resizable=no,status=no')" href="#wnl1"><font color="#008000">ֻ֪��ũ���������˲�ѯ����</font></a>
<hr size="1">
</div>
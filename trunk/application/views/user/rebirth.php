<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Rebirth</h2>
<p>Gotta to be more stronger? Use this...</p>
<p class="info"><?php echo @$info; ?></p>

<table border="0" width="100%" style="border-collapse: collapse">
<tr>
<td align="center"><b>Rebirth</b></td>
<td align="center"><b>Character Level</b></td>
<td align="center"><b>Alz Needed</b></td>
</tr>
<?php for($i = $this->config->item('rebirth_level'); $i <= $this->config->item('max_level'); $i++): ?>
		<?php $rbirth = $i - $this->config->item('rebirth_level') + 1 ?>
		<?php $rbirthwz = $this->config->item('rebirth_alz') * ($rbirth - 1) ?>
		<tr><td align='center'><?php echo $rbirth?></td>
		<td align='center'><?php echo $i ?></td>
		<td align='center'><?php echo $rbirthwz ?> Alz</td></tr>
<?php endfor ?>
</table>

<?php echo form_open() ?>
<div class="demo">
<div id="radioset">

<?php $l = 0 ?>
<?php $le = 0 ?>
<?php foreach($query->result() as $o): ?>
	<p><?php echo form_radio('character', $o->CharacterIdx, set_value('character'), 'id="radioset'.$l++.'"'). form_label($o->Name, 'radioset'.$le++) ?>
<?php endforeach ?>
<br /><?php echo form_error('character')?></p>
</div>
<p align="center"><?php echo form_submit('rebirth', 'Rebirth') ?></p>
</div>
<?php echo form_close() ?>

<?php endblock() ?>

<?php end_extend()?>
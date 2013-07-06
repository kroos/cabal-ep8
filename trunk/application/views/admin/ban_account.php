<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Ban Account</h2>
<p>Please insert <strong>character</strong> name</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo  form_label('Character : ', 'char') ?></td>
		<td><?php echo form_input('char', set_value('char'), 'id="char"') ?><?php echo form_error('char') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo  form_label('Expiry Date : ', 'datepicker') ?></td>
		<td><?php echo form_input('date', set_value('date'), 'id="datepicker"') ?><?php echo form_error('date') ?></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><?php echo form_submit('banacc', 'Ban Account') ?></td>
	</tr>
</table>
<?php echo form_close()?>
</div>

<?php endblock() ?>

<?php end_extend()?>
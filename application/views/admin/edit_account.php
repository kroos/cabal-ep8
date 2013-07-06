<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Account Editing</h2>
<p>Please insert <strong>character</strong> name and choose type of account</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Character : ', 'char') ?></td>
		<td><?php echo form_input('char', set_value('char'), 'id="char"') ?><?php echo form_error('char') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Type : ', 'type') ?></td>
		<td><?php echo form_dropdown('type', $Type, set_value('type'), 'id="type"') ?><?php echo form_error('type') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo form_label('ServiceKind : ', 'servicekind') ?></td>
		<td><?php echo form_dropdown('servicekind', $ServiceKind, set_value('servicekind'), 'id="servicekind"') ?><?php echo form_error('servicekind') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Expiry Date : ', 'datepicker') ?></td>
		<td><?php echo form_input('date', set_value('date'), 'id="datepicker"' ) ?><?php echo form_error('date') ?></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><?php echo form_submit('changeacc', 'Change Account') ?></td>
	</tr>
</table>
<?php echo form_close() ?>
</div>
<?php endblock() ?>

<?php end_extend()?>
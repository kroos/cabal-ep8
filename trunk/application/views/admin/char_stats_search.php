<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Character Statistics</h2>
<p>Insert character name</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Character : ', 'char') ?></td>
		<td><?php echo form_input('char', set_value('char'), 'id="char"').form_error('char') ?></td>
		<td><?php echo form_submit('search', 'Search') ?></td>
	</tr>
</table>
<?php echo form_close()?>
</div>

<?php endblock() ?>

<?php end_extend()?>
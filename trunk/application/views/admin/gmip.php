<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Game Master IP Address</h2>
<p>Game Master features wont work if game master ip address is not the same from the list</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo  form_label('From IP Address : ', 'from') ?></td>
		<td><?php echo form_input('from', set_value('from'), 'id="from"') ?><?php echo form_error('from') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo  form_label('To IP Address : ', 'to') ?></td>
		<td><?php echo form_input('to', set_value('to'), 'id="to"') ?><?php echo form_error('to') ?></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><?php echo form_submit('save', 'Save') ?></td>
	</tr>
</table>
<?php echo form_close()?>
<p>&nbsp;</p>

<?php if($q->num_rows() < 1): ?>

<?php else: ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<th>From</th>
		<th>To</th>
		<th>&nbsp;</th>
	</tr>
	<?php foreach($q->result() AS $h): ?>
		<tr>
			<td><?php echo gmip($h->fromip) ?></td>
			<td><?php echo gmip($h->toip) ?></td>
			<td><?php echo anchor('admin/del_gmip/'.$h->fromip.'/'.$h->toip, 'delete')?></td>
		</tr>
	<?php endforeach ?>
</table>
<?php endif ?>
</div>


<?php endblock() ?>

<?php end_extend()?>
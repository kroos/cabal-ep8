<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Adding E-Coin</h2>
<p>Please insert <strong>character</strong></p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Cash : ', 'cash') ?></td>
		<td><?php echo form_input('cash', set_value('cash'), 'id="cash"').form_error('cash') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Cash Bonus : ', 'cashbonus') ?></td>
		<td><?php echo form_input('cashbonus', set_value('cashbonus'), 'id="cashbonus"').form_error('cashbonus') ?></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><?php echo form_submit('add_ecoins', 'Edit E-Coin') ?></td>
	</tr>
</table>
<?php echo form_close() ?>
<p>&nbsp;</p>

<?php if($ec->num_rows() < 1): ?>
<p>Well, this fella doesnt have any info on E-Coin</p>
<?php else: ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<th>E-Coin</th><th>E-Coin Bonus</th><th>Total E-Coin</th>
</tr>
<?php foreach($ec->result() AS $rg): ?>
	<tr>
		<td><?php echo $rg->Cash ?></td><td><?php echo $rg->CashBonus ?></td><td><?php echo $rg->CashTotal ?></td>
	</tr>
<?php endforeach ?>
</table>
<?php endif ?>
</div>
<?php endblock() ?>

<?php end_extend()?>
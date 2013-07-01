<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Account</h2>
<p>Please take note :<br />if you wanna bank-in alz from the <b>warehouse</b> INTO the <b>bank</b>, use <b>DEPOSIT</b>.<br />if you wanna withdraw alz from the <b>bank</b> INTO the <b>warehouse</b>, use <b>WITHDRAW</b></p>
<p class="info"><?php echo @$info; ?></p>

<?php echo form_open() ?>
<div class="demo">
<table border="0" width="100%">
	<tr>
		<td>Warehouse Alz</td>
		<td><?php echo $warehouse->Alz ?> Alz</td>
		<td><?php echo form_input('alzwithdraw', set_value('alzwithdraw'))?></td>
		<td><?php echo form_submit('withdraw', 'Deposit')?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form_error('alzwithdraw')?></td>
	</tr>
	<tr>
		<td>Bank Alz</td>
		<td><?php echo $bank->Alz?> Alz</td>
		<td><?php echo form_input('alzdeposit', set_value('alzdeposit'))?></td>
		<td><?php echo form_submit('deposit', 'Withdraw')?></td>
	</tr>
	<tr>
		<td colspan="4"><?php echo form_error('alzdeposit')?></td>
	</tr>
</table>
</div>
<?php echo form_close()?>

<?php endblock() ?>

<?php end_extend()?>
<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Change Password</h2>
<p>You can change your password by completing this form</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open()?>
<table border="0" width="100%">
	<tr>
		<td align="right">Username : </td>
		<td align="left"><?php echo $acc->row()->ID?><?php echo form_hidden('username', $acc->row()->ID)?></td>
	</tr>
	<tr>
		<td align="right"><?php echo form_label('Current Password : ', 'cpass')?></td>
		<td align="left"><?php echo form_password('currpasswd', set_value('currpasswd'), 'id="cpass"')?><?php echo form_error('currpasswd')?></td>
	</tr>
	<tr>
		<td align="right"><?php echo form_label('New Password : ', 'npass')?></td>
		<td align="left"><?php echo form_password('newpasswd', set_value('newpasswd'), 'id="npass"')?><?php echo form_error('newpasswd')?></td>
	</tr>
	<tr>
		<td align="right"><?php echo form_label('Retype New Password : ', 'rnpass')?></td>
		<td align="left"><?php echo form_password('rnewpasswd', set_value('rnewpasswd'), 'id="rnpass"')?><?php echo form_error('rnewpasswd')?></td>
	</tr>
	<tr>
		<td align="right">Email : </td>
		<td align="left"><?php echo $acc->row()->Email?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><?php echo form_submit('changepass', 'Change Password')?></td>
	</tr>
</table>
<?php echo form_close()?>
</div>



<?php endblock() ?>

<?php end_extend()?>
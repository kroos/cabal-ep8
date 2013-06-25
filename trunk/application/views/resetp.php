<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Reset Password</h2>

<p>By submitting this page, i considered you have forgotten your password. Therefor, there is no way that i can retrieve it for you unless i have to reset your password</p>
<p>Please take a look in your email for your new password after submitting this page.</p>

<p class="info"><?php echo @$info; ?></p>

<?php echo form_open()?>
<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
<tr>
<td align="right"><?php echo form_label('Username : ', 'username') ?></td><td align="left"><?php echo form_input('username', set_value('username'), 'id="username"');?>&nbsp;&nbsp;&nbsp;<?php echo form_error('username')?></td>
</tr>

<tr>
<td align="right"><?php echo form_label('Email : ', 'email') ?></td><td align="left"><?php echo form_input('email', set_value('email'), 'id="email"')?>&nbsp;&nbsp;&nbsp;<?php echo form_error('email')?></td>
</tr>

<tr>
<td colspan="2" align="center"><div class="demo"><?php echo form_submit('forgot_password', 'Get Password')?></div></td>
</tr>
</table>
<?=form_close()?>

<?php endblock() ?>

<?php end_extend()?>
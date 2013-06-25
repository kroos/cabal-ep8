<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Create Account</h2>
<p>Please fill up this form and come join us. We hope you enjoy your time with your friends.</p>
<p>Username and password must be minimum of 6 chars, letters and numbers only but not more than 8 characters. Both username and password can contain alphabatical numeric characters, underscores or dashes</p>
<?php if ($this->config->item('mailreg') == TRUE) : ?>
<p>Please check your email for the activation of the account once you submit this form</p>
<?php endif ?>
<p class="info"><?php echo @$info; ?></p>

<?php echo form_open()?>
<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
<tr>
<td align="right"><?php echo form_label('Username : ', 'username') ?></td><td align="left"><?php echo form_input('username', set_value('username'), 'id="username"');?>&nbsp;&nbsp;&nbsp;<?php echo form_error('username')?></td>
</tr>
<tr>
<td align="right"><?php echo form_label('Password : ', 'password1') ?></td><td align="left"><?php echo form_password('password1', set_value('password1'), 'id="password1"')?>&nbsp;&nbsp;&nbsp;<?php echo form_error('password1')?></td>
</tr>
<tr>
<td align="right"><?php echo form_label('Retype Password : ', 'password2') ?></td><td align="left"><?=form_password('password2', set_value('password1'), 'id="password2"')?>&nbsp;&nbsp;&nbsp;<?=form_error('password2')?></td>
</tr>
<tr>
<td align="right"><?php echo form_label('Email : ', 'email') ?></td><td align="left"><?php echo form_input('email', set_value('email'), 'id="email"')?>&nbsp;&nbsp;&nbsp;<?php echo form_error('email')?></td>
</tr>
<tr>
<td align="right"><?php echo form_label('Image Verification '.$cap['image'].' :', 'verify') ?></td><td align="left"><?php echo form_input('verify', set_value('verify'), 'id="verify"')?>&nbsp;&nbsp;&nbsp;<?php echo form_error('verify')?></td>
</tr>
<tr>
<td colspan="2" align="center"><div class="demo"><?php echo form_submit('create_acc', 'Register')?></div></td>
</tr>
</table>
<?=form_close()?>

<?php endblock() ?>

<?php end_extend()?>
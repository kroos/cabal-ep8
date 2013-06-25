<?php extend('template/nav_welcome.php')?>

<?php startblock('content')?>

<h2>Login</h2>

<p>Insert username and password to login</p>

<p class="info"><?php echo @$info; ?></p>

<?php echo form_open();?>

<table>
	<tr>
		<td>
			<?php echo form_label('Username&nbsp;:&nbsp;', 'username'); ?>
		</td>
		<td>
			<?php echo form_input('username', set_value('username'), 'id="username"'); ?>
		</td>
		<td>
			<?php echo form_error('username'); ?>
		</td>
	</tr>
	<tr>
		<td>
			<?php echo form_label('Password&nbsp;:&nbsp;', 'password'); ?>
		</td>
		<td>
			<?php echo form_password('password', set_value('password'), 'id="password"') ?>
		</td>
		<td>
			<?php echo form_error('password'); ?>
		</td>
	</tr>
	<tr>
		<td colspan="3" align="center">
			<div class="demo"><?php echo form_submit('submit', 'Login'); ?></div>
		</td>
	</tr>
</table>
<?php echo form_close();?>

<div class="demo"><?php echo anchor('welcome/register', 'Come join us today!! Create your account with us right now !!') ?></div>

<div class="demo"><?php echo anchor('welcome/resetp', 'Forgot password') ?></div>


<?php endblock()?>


<?php end_extend(); ?>
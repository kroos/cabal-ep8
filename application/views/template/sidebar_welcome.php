<?php extend('template/jscript.php'); ?>

<?php startblock('sidebar1'); ?>
<h3>Server Status</h3>
<?php $this->load->helper('port'); ?>
	<?php if (!portc($this->config->item('gameserver_ip'), $this->config->item('gameserver_port'))): ?>
		<strong><span style="color:#ff0000">OFFLINE</span></strong>
	<?php else: ?>
		<strong><span style="color:#00ff00">ONLINE</span></strong>
	<?php endif ?>
<?php endblock(); ?>

<?php startblock('sidebar2'); ?>
<h3>Server Version</h3>
<ul>
	<li><?php echo $this->config->item('version') ?></li>
</ul>
<?php endblock(); ?>

<?php startblock('sidebar3'); ?>
<h3>Players Online</h3>
<ul>
	<li><?php echo $this->cabal_auth_table->GetWhere(array('Login' => 1), NULL, NULL)->num_rows(); ?></li>
</ul>

<h3>Account</h3>
<ul>
	<li><?php echo $this->cabal_auth_table->GetAll(NULL, NULL)->num_rows()?></li>
</ul>

<h3>Character</h3>
<ul>
	<li><?php echo $this->cabal_character_table->GetAll(NULL, NULL)->num_rows()?></li>
</ul>

<h3>Experience Rate</h3>
<ul>
	<li><?php echo $this->config->item('exp_rate') ?> X</li>
</ul>

<h3>Experience Skill Rate</h3>
<ul>
	<li><?=$this->config->item('skill_rate')?> X</li>
</ul>

<h3>Experience Craft Rate</h3>
<ul>
	<li><?php echo $this->config->item('craft_rate') ?> X</li>
</ul>

<h3>Alz Rate</h3>
<ul>
	<li><?php echo $this->config->item('alz_rate') ?> X</li>
</ul>

<h3>Item Drop Rate</h3>
<ul>
	<li><?php echo $this->config->item('drop_rate')?> X</li>
</ul>

<?php endblock(); ?>

<?php startblock('sidebar4'); ?>

	<?php if ($this->config->item('facebook') == NULL): ?>
	<?php else: ?>
		<h3>Facebook</h3>
		<iframe src="https://www.facebook.com/plugins/like.php?href=<?=$this->config->item('facebook')?>" scrolling="no" frameborder="0" style="border:none; width:237px; height:auto"></iframe>
	<?php endif ?>
<?php endblock(); ?>


<?php end_extend(); ?>
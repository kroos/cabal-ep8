<?php extend('template/sidebar_user.php'); ?>

<?php startblock('top_nav'); ?>
	<li><?php echo anchor('cabal', 'home', ($this->uri->uri_string() == 'cabal' || $this->uri->uri_string() == 'cabal/index') ? 'class="current" title="home"' : ' title="home"'); ?></li>
<?php if ($this->config->item('payemail') != NULL): ?>
	<li><?php echo anchor('cabal/donate', 'donate', ($this->uri->uri_string() == 'cabal/donate') ? 'class="current" title="donate"' : ' title="donate"'); ?></li>
<?php endif ?>
		<li><?php echo anchor('shop/index/'.$this->session->userdata('id_user').'/'.$this->session->userdata('authkey'), 'shop', ($this->uri->uri_string() == 'shop/index/'.$this->session->userdata('id_user').'/'.$this->session->userdata('authkey')) ? 'class="current" title="shop"' : ' title="shop"'); ?></li>
		<li><?php echo anchor('cabal/logout', 'logout', ($this->uri->uri_string() == 'cabal/logout') ? 'class="current" title="logout"' : ' title="logout"'); ?></li>
<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('cabal/change_password', 'change password', ($this->uri->uri_string() == 'cabal/change_password') ? 'class="current" title="change password"' : ' title="change password"'); ?></li>
	<li><?php echo anchor('cabal/account', 'account', ($this->uri->uri_string() == 'cabal/account') ? 'class="current" title="account"' : ' title="account"'); ?></li>
	<li><?php echo anchor('cabal/rebirth', 'rebirth', ($this->uri->uri_string() == 'cabal/rebirth') ? 'class="current" title="rebirth"' : ' title="rebirth"'); ?></li>
	<li><?php echo anchor('cabal/reset_rebirth', 'reset rebirth', ($this->uri->uri_string() == 'cabal/reset_rebirth') ? 'class="current" title="reset rebirth"' : ' title="reset rebirth"'); ?></li>
	
	<?if ( ($this->session->userdata('logged_in') == TRUE) && ($this->session->userdata('group') == 'GM') ):?>
		<li><div class="demo"><?=anchor('admin/cabal/online_chars', 'Online Character', array('title' => 'Online Character'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/info_account', 'Account Info', array('title' => 'Account Info'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/edit_account', 'Edit Account', array('title' => 'Edit Account'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/hackuserlog', 'Hack User Log', array('title' => 'Hack User Log'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/ban_account', 'Ban Account', array('title' => 'Ban Account'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/unban_account', 'Unban Account', array('title' => 'Unban Account'))?></div></li>
		<li><div class="demo"><?=anchor('admin/cabal/char_stats_search', 'Char Stats', array('title' => 'Char Stats'))?></div></li>
		<li><div class="demo"><?=anchor('admin/shop/home', 'Edit Shop', array('title' => 'Edit Shop'))?></div></li>
	<?endif?>

<?php endblock(); ?>

<?php end_extend(); ?>
<?php extend('template/sidebar_user.php'); ?>

<?php startblock('top_nav'); ?>
	<li><?php echo anchor('cabal', 'home', ($this->uri->uri_string() == 'cabal' || $this->uri->uri_string() == 'cabal/index') ? 'class="current" title="home"' : ' title="home"'); ?></li>
<?php if ($this->config->item('payemail') != NULL): ?>
	<li><?php echo anchor('cabal/donate', 'donate', ($this->uri->uri_string() == 'cabal/donate') ? 'class="current" title="donate"' : ' title="donate"'); ?></li>
<?php endif ?>
		<li><?php echo anchor('cabal/logout', 'logout', ($this->uri->uri_string() == 'cabal/logout') ? 'class="current" title="logout"' : ' title="logout"'); ?></li>
<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('cabal/change_password', 'change password', ($this->uri->uri_string() == 'cabal/change_password') ? 'class="current" title="change password"' : ' title="change password"'); ?></li>
	<li><?php echo anchor('cabal/account', 'account', ($this->uri->uri_string() == 'cabal/account') ? 'class="current" title="account"' : ' title="account"'); ?></li>
	<li><?php echo anchor('cabal/rebirth', 'rebirth', ($this->uri->uri_string() == 'cabal/rebirth') ? 'class="current" title="rebirth"' : ' title="rebirth"'); ?></li>
	<li><?php echo anchor('cabal/reset_rebirth', 'reset rebirth', ($this->uri->uri_string() == 'cabal/reset_rebirth') ? 'class="current" title="reset rebirth"' : ' title="reset rebirth"'); ?></li>
<?php $gm = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and ({$this->session->userdata('id_user')} * 8 + 5) AND Nation = 3", NULL, NULL); ?>
	<?php if ( ($this->session->userdata('logged_in') == TRUE) && ($gm->num_rows() > 0) ):?>
		<li><?=anchor('admin/online_chars', 'online character', ($this->uri->uri_string() == 'admin/online_chars') ? 'class="current" title="online character"' : ' title="online character"')?></li>
		<li><?=anchor('admin/info_account', 'account info', ($this->uri->uri_string() == 'admin/info_account') ? 'class="current" title="account info"' : ' title="account info"')?></li>
		<li><?=anchor('admin/edit_account', 'edit account', ($this->uri->uri_string() == 'admin/edit_account') ? 'class="current" title="edit account"' : ' title="edit account"')?></li>
		<li><?=anchor('admin/hackuserlog', 'hack user log', ($this->uri->uri_string() == 'admin/hackuserlog') ? 'class="current" title="hack user log"' : ' title="hack user log"')?></li>
		<li><?=anchor('admin/ban_account', 'ban account', ($this->uri->uri_string() == 'admin/ban_account') ? 'class="current" title="ban account"' : ' title="ban account"')?></li>
		<li><?=anchor('admin/unban_account', 'unban account', ($this->uri->uri_string() == 'unban_account') ? 'class="current" title="unban account"' : ' title="unban account"')?></li>
		<li><?=anchor('admin/char_stats_search', 'char stats', ($this->uri->uri_string() == 'admin/char_stats_search') ? 'class="current" title="char stats"' : ' title="char stats"')?></li>
		<li><?=anchor('shopadmin/home', 'edit shop', ($this->uri->uri_string() == 'shopadmin/home') ? 'class="current" title="edit shop"' : ' title="edit shop"')?></li>
	<?endif?>

<?php endblock(); ?>

<?php end_extend(); ?>
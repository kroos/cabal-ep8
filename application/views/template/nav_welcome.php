<?php extend('template/sidebar_welcome.php'); ?>

<?php startblock('top_nav'); ?>
	<li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : ' title="home"'); ?></li>
<?php if ($this->config->item('payemail') != NULL): ?>
	<li><?php echo anchor('welcome/donate', 'donate', ($this->uri->uri_string() == 'welcome/donate') ? 'class="current" title="donate"' : ' title="donate"'); ?></li>
<?php endif ?>
<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : ' title="home"'); ?></li>
	<li><?php echo anchor('welcome/status', 'channel status', ($this->uri->uri_string() == 'welcome/status') ? 'class="current" title="channel status"' : ' title="channel status"'); ?></li>
	<li><?php echo anchor('welcome/online', 'players online', ($this->uri->uri_string() == 'welcome/online') ? 'class="current" title="players online"' : ' title="players online"'); ?></li>
	<li><?php echo anchor('welcome/topchar', 'top character', ($this->uri->uri_string() == 'welcome/topchar') ? 'class="current" title="top character"' : ' title="top character"'); ?></li>
	<li><?php echo anchor('welcome/topcombo', 'top combo', ($this->uri->uri_string() == 'welcome/topcombo') ? 'class="current" title="top character"' : ' title="top character"'); ?></li>
	<li><?php echo anchor('welcome/topsd', 'top single dungeon', ($this->uri->uri_string() == 'welcome/topsd') ? 'class="current" title="top single dungeon"' : ' title="top single dungeon"'); ?></li>
	<li><?php echo anchor('welcome/topgd', 'top party dungeon', ($this->uri->uri_string() == 'welcome/topgd') ? 'class="current" title="top party dungeon"' : ' title="top party dungeon"'); ?></li>
	<li><?php echo anchor('welcome/nationwar', 'tierra gloriosa', ($this->uri->uri_string() == 'welcome/nationwar') ? 'class="current" title="tierra gloriosa"' : ' title="tierra gloriosa"'); ?></li>
<?php endblock(); ?>

<?php end_extend(); ?>
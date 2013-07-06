<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Admin Home</h2>
<p>This page can only be seen by Game Master.</p>
<p class="info"><?php echo @$info; ?></p>

<p>Hi</p>
<p>Welcome to admin page. Use this section wisely</p>

<?php endblock() ?>

<?php end_extend()?>
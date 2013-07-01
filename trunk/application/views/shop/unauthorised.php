<?php extend('template/template.php'); ?>

<?php startblock('content') ?>
<h2>Unauthorised</h2>
<p>Well, its definitely something wrong with your login with the shop</p>
<p class="info"><?php echo @$info; ?></p>





<?php endblock() ?>










<?php startblock('top_nav'); ?>
	<li><?php echo anchor('http://cabalclose', 'Close'); ?></li>

<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('http://cabalclose', 'Close'); ?></li>
<?php endblock(); ?>









<?php startblock('sidebar1'); ?>
<?php endblock(); ?>

<?php startblock('sidebar2'); ?>
<?php endblock(); ?>

<?php startblock('sidebar3'); ?>
<?php endblock(); ?>

<?php startblock('sidebar4'); ?>
<?php endblock(); ?>










<?php startblock('jscript') ?>
<script>
  $(function() {
    $( "input[type=submit], a, button", ".demo" )
      .button();
    $( "#radioset" ).buttonset();

    // Datepicker
    $('#datepicker').datepicker({dateFormat: "yy-mm-dd"});

    //ucwords
    //$("input[type=text], textarea").keyup(function() {
    //    toUpper(this);
    //});
  });
</script>
<?php endblock() ?>

<?php end_extend()?>
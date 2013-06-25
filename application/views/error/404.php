<?php extend('template/nav_welcome.php')?>

<?php startblock('top_nav')?>
      <li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : '');?></li>
<?php endblock()?>

<?php startblock('side_nav')?>
<li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : '');?></li>
<?php endblock()?>

<?php startblock('content')?>
<div id="nothing"><div class="progress-label">Loading...</div></div>
<?php endblock()?>

<?php startblock('sidebar1'); ?>
<?php endblock(); ?>

<?php startblock('sidebar2'); ?>
<?php endblock(); ?>

<?php startblock('sidebar3'); ?>
<?php endblock(); ?>

<?php startblock('sidebar4'); ?>
<?php endblock(); ?>

<?php startblock('jscript') ?>
<?php echo get_extended_block(); ?>

<script type="text/javascript">
	
$(function() {
	var progressbar = $( "#nothing" ),
	progressLabel = $( ".progress-label" );
	progressbar.progressbar({
		value: false,
		change: function() {
			progressLabel.text( progressbar.progressbar( "value" ) + "%" );
		},
		complete: function() {
		progressLabel.text( "Nothing is here, please go back" );
		}
	});
	function progress() {
		var val = progressbar.progressbar( "value" ) || 0;
		progressbar.progressbar( "value", val + 1 );
		if ( val < 99 ) {
			setTimeout( progress, 100 );
		}
	}
	setTimeout( progress, 1000 );
});
</script>

<style>
.ui-progressbar {
position: relative;
}
.progress-label {
position: absolute;
left: 50%;
top: 4px;
font-weight: bold;
text-shadow: 1px 1px 0 #fff;
}
</style>
<?php endblock() ?>


<?php end_extend()?>
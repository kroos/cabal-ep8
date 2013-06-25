<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Donate</h2>
<p>We really appreciate your donations towards us and supporting our server. Please inform administrator or any authorised personnel your donation</p>
<p class="info"><?php echo @$info; ?></p>
	<p><?php echo $this->config->item('paypickupline')?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_donations">
		<input type="hidden" name="business" value="<?=$this->config->item('payemail')?>">
		<input type="hidden" name="lc" value="US">
		<input type="hidden" name="item_name" value="<?=$this->config->item('server')?> Private Server">
		<input type="hidden" name="no_note" value="0">
		<input type="hidden" name="currency_code" value="USD">
		<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
<?php endblock() ?>

<?php end_extend()?>
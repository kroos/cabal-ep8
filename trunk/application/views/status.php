<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Channel Status</h2>

<p></p>

<p class="info"><?php echo @$info; ?></p>

	<table width="100%" cellspacing="2" cellpadding="1" style="border:#202020 1px solid">
<?php $i = 0?>
<?php foreach($channels as $c):?>
<?php $i++?>
	<tr>
	<td><strong><?php echo $channels[$i]['name']?></strong></td>
	<?php $r = $this->cabal_character_table->GetWhere(array('ChannelIdx' => $channels[$i]['number'], 'Login' => 1), NULL, NULL)->num_rows()?>
	<?php $p=round((100 / $this->config->item('maxplayers')) * $r, 0);?>
	<?php for ($j=1; $j<=8; $j++):?>
		<?php if ($p > 100):?>
			<td style="border-bottom:#404040 1px dashed"><img src="<?php echo base_url()?>images/4.png" /></td>
		<?php elseif($p >= round(100/8*$j,0)):?>
			<td style="border-bottom:#404040 1px dashed"><img src="<?php echo base_url()?>images/<?php echo round($j/2,0)?>.png" /></td>
		<?php else:?>
			<td style="border-bottom:#404040 1px dashed"><img src="<?php echo base_url()?>images/0.png" /></td>
		<?php endif ?>
	<?php endfor ?>
	<?php if (!portc($this->config->item('gameserver_ip'), $channels[$i]['port'])):?>
		<td align="center" style="border-bottom:#404040 1px dashed"><strong><span style="color:#ff0000">offline</span></strong></td>
	<?php else:?>
		<td align="center" style="border-bottom:#404040 1px dashed"><strong><span style="color:#00ff00">online</span></strong></td>
	<?php endif?>
	</tr>
<?php endforeach?>
	<tr>
	<td colspan="9" style="padding-left:4px;"><span style="color:#c0c0c0"><strong>Login server</strong></td>
	<?php if (!portc($this->config->item('gameserver_ip'), $this->config->item('gameserver_port'))):?>
		<td align="center"><strong><span style="color:#ff0000">offline</span></strong></td>
	<?php else:?>
		<td align="center"><strong><span style="color:#00ff00">online</span></strong></td>
	<?php endif?>
	</tr>
	</table>

<?php endblock() ?>

<?php startblock('jscript') ?>
<?php echo get_extended_block(); ?>
<script>
$(function() {
	$( "#progressbar" ).progressbar({
		value: 37
	});
});
</script>
<?php endblock() ?>

<?php end_extend()?>
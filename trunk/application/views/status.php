<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Channel Status</h2>

<p></p>

<p class="info"><?php echo @$info; ?></p>

	<table width="100%" cellspacing="2" cellpadding="1" style="border:#202020 1px solid">
<?php $i = 0?>
<?php foreach($channels as $c => $n):?>
<?php $i++?>
	<tr>
	<td><strong><?php echo $n['name'] ?></strong></td>
	<?php $r = $this->cabal_character_table->GetWhere(array('ChannelIdx' => $n['number'], 'Login' => 1), NULL, NULL)->num_rows()?>
	<?php $p = round((100 / $this->config->item('maxplayers')) * $r, 0);?>
<script>
$(function() {
	$( "#progressbar<?=$i?>" ).progressbar({
		value: <?php echo $p; ?>
	});
});
</script>
			<td width="40%"><div id="progressbar<?=$i?>"></div></td>
	<?php if (!portc($this->config->item('gameserver_ip'), $n['port'])):?>
		<td align="center"><strong><span style="color:#ff0000">offline</span></strong></td>
	<?php else:?>
		<td align="center"><strong><span style="color:#00ff00">online</span></strong></td>
	<?php endif?>
	</tr>
<?php endforeach?>
	<tr>
	<td colspan="2" style="padding-left:4px;"><span style="color:#c0c0c0"><strong>Login server</strong></td>
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
<?php endblock() ?>

<?php end_extend()?>
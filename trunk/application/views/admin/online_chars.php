<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Players Online</h2>
<p>Use "Set Offline"  only after your server is offline otherwise your players can manipulate this feature to their advantage such as duplicating item.</p>
<p class="info"><?php echo @$info; ?></p>

<?php if($query->num_rows() < 1 ): ?>
<p>No character online at the moment.</p>
<?php else:?>
		<table border="1" width="100%" bordercolorlight="#00FF00" bordercolordark="#008000">
			<tr>
				<td>&nbsp;</td>
				<td>Name</td>
				<td>Level</td>
				<td>Channel</td>
				<td>Map</td>
				<td>LoginTime</td>
				<td>PlayTime</td>
				<td>Set Offline</td>
			</tr>
		<?php $u = 1 ?>
		<?php foreach($query->result() as $t): ?>
			<tr>
				<td><?php echo $u++ ?></td>
				<td><?php echo $t->Name ?></td>
				<td><?php echo $t->LEV ?></td>
				<td><?php echo $t->ChannelIdx ?></td>
				<td>
			<?php
			$map = $this->config->item('map');
			foreach($map as $o => $l) {
				//echo $t.' '.$l;
				if ($t->WorldIdx == $o) {
					echo $l;
				}
			};
			?>
				</td>
				<?php if(floatval(phpversion()) > '5.3'): ?>
					<td><?php echo date_my($t->LoginTime) ?></td>
				<?php else: ?>
					<td><?php echo $t->LoginTime ?></td>
				<?php endif?>
				<td><?php echo cabal_time($t->PlayTime) ?></td>
				<td><div class="demo"><?php echo anchor('admin/char_offline/'.$t->CharacterIdx, 'Set Offline') ?></div></td>
			</tr>
		<?php endforeach ?>
		</table>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
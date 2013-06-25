<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Players Online</h2>

<p>Saw your friends? Come and join us!!</p>

<p class="info"><?php echo @$info; ?></p>

<?php if($query->num_rows() < 1 ):?>
<p>No character online at the moment.</p>
<?php else: ?>

		<table border="0" width="100%" bordercolorlight="#00FF00" bordercolordark="#008000">
			<tr>
				<th>&nbsp;</th>
				<th>Name</th>
				<th>Level</th>
				<th>Channel</th>
				<th>Map</th>
				<th>LoginTime</th>
				<th>PlayTime</th>
			</tr>
		<?php $u = 1?>
		<?php foreach($query->result() as $t):?>
			<tr>
				<td><?php echo $u++?></td>
				<td><?php echo $t->Name?></td>
				<td><?php echo $t->LEV?></td>
				<td><?php echo $t->ChannelIdx?></td>
				<td>
			<?php
			foreach($map as $o => $l)
				{
					//echo $t.' '.$l;
					if ($t->WorldIdx == $o)
						{
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
			</tr>
		<?php endforeach ?>
		</table>

<?php endif ?>

<?php endblock() ?>

<?php end_extend() ?>
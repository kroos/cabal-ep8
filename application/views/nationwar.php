<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Tierra Gloriosa</h2>
<p></p>
<p class="info"><?php echo @$info; ?></p>

<?php if($query->num_rows() < 1): ?>
<h3>Tierra Gloriosa have not been run yet.</h3>
<?php else: ?>
			<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
			<tr>
			<td>&nbsp;</td>
			<td><strong>Total Round</strong></td>
			<td><strong>Capella Win</strong></td>
			<td><strong>Procyon Win</strong></td>
			<td><strong>Duration (Day)</strong></td>
			</tr>
		<?php $i=1 ?>
		<?php $y=0 ?>
		<?php $u=0 ?>
		<?php foreach($query->result() as $y): ?>
		<?php $t = decode_style($y->Style) ?>
			<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $y->TotalRound ?></td>
			<td><?php echo $y->CapellaWin ?><?php $y+=$y->CapellaWin ?></td>
			<td><?php echo $y->ProcyonWin ?><?php $u+=$y->ProcyonWin ?></td>
			<td><?php echo $y->DurationDay ?></td>
			</tr>
		<?php endforeach ?>
			<tr>
			<td colspan="2">Total Win</td>
			<td><?php echo $y ?></td>
			<td><?php echo $u ?></td>
			<td>&nbsp;</td>
			</tr>
			</table>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
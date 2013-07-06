<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Release Block Account</h2>
<p>Click on the link to release the block account</p>
<p class="info"><?php echo @$info; ?></p>

<?php if($query->num_rows() < 1): ?>
<p>No list of ban account</p>
<?php else: ?>
	<div class="demo">
	<table border="1" cellpadding="2" cellspacing="0" width="100%">
		<tr>
			<td>UserNum</td>
			<td>UserName</td>
			<td>Last IP</td>
			<td>Date Join</td>
			<td>Email</td>
		</tr>
	<?php foreach($query->result() as $p): ?>
		<tr>
			<td><?php echo anchor('admin/unban_user/'.$p->UserNum, 'Release '.$p->UserNum) ?></td>
			<td><?php echo $p->ID ?></td>
			<td><?php echo $p->LastIp ?></td>
<?php if(floatval(phpversion()) > '5.3'): ?>
			<td><?php echo date_my($p->createDate) ?></td>
<?php else: ?>
			<td><?php echo $p->createDate ?></td>
<?php endif ?>
			<td><?php echo $p->Email ?></td>
		</tr>
	<?php endforeach ?>
	</table>
</div>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
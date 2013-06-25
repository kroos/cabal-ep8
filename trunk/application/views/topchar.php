<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Top Character</h2>
<p>Character ranking</p>
<p class="info"><?php echo @$info; ?></p>

	<p><strong>Top characters in <?php echo $this->config->item('server')?></strong></p>
	<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
	<tr>
	<td>&nbsp;</td>
	<td><strong>Name</strong></td>
	<td><strong>Class</strong></td>
	<td><strong>Level</strong></td>
	<td><strong>Class Rank</strong></td>
	<td><strong>Rebirth</strong></td>
	<td><strong>Reset</strong></td>
	</tr>
<?php $i=1?>
<?php foreach($query->result() as $y): ?>
<?php $t = decode_style($y->Style) ?>
	<tr>
	<td><?php echo $i++ ?></td>
	<td><?php echo $y->Name ?></td>
	<td><?php echo $t['Class_Name'] ?></td>
	<td><?php echo $y->LEV ?></td>
	<td><?php echo $t['Class_Rank'] ?></td>
	<td><?php echo $y->Rebirth ?></td>
	<td><?php echo $y->Reset ?></td>
	</tr>
<?php endforeach ?>
	</table>

<?php endblock() ?>

<?php end_extend()?>
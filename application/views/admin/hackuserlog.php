<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Hack User Log</h2>
<p></p>
<p class="info"><?php echo @$info; ?></p>

<?php if($query->num_rows() < 1): ?>
<p>No log of hack user</p>
<?php else: ?>
	<div class="demo">
	<p>Click "Ban No." to ban the selected account.</p>
	<table border="1" cellpadding="2" cellspacing="0" width="100%">
		<tr>
			<td>UserNum</td>
			<td>Character</td>
			<td>Date</td>
			<td>HackType</td>
		</tr>
	<?php foreach($query->result() as $p): ?>
		<tr>
			<td><?php echo anchor('admin/cabal/ban_user/'.$p->userNum, 'Ban '.$p->userNum) ?></td>
		<?php
		$this->load->database('GAMEDB', TRUE);
		$r = $this->cabal_character_table->charid($p->characterIdx)->row()->Name; ?>
			<td><?php echo $r ?></td>

		<?php if(floatval(phpversion()) > '5.3'): ?>
			<td><?php echo date_my($p->registerDate) ?></td>
		<?php else: ?>
			<td><?php echo $p->registerDate ?></td>
		<?php endif ?>
			<td><?php echo $p->comment ?></td>
		</tr>
	<?php endforeach ?>
	</table>
	<p>&nbsp;</p>
	<p>By clicking button below, you will delete all the data in the database. This will not banned or unbanned each of the account.</p>
	<p><?php echo anchor('admin/del_hackuserlog', 'Clear Hack User Log') ?></p>
</div>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
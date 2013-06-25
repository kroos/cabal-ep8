<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Top Combo Count</h2>
<p>Combo ranking</p>
<p class="info"><?php echo @$info; ?></p>

	<p><strong>Top combo count in <?php echo $this->config->item('server')?> Private Server</strong></p>

<?php if($query->num_rows() < 1) : ?>
	<p>No player have combo yet. THIS IS......... new server...  :-D</p>
<?php else : ?>
		<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
		<tr>
		<td>&nbsp;</td>
			<th><strong>Name</strong></th>
			<th><strong>Combo Count</strong></th>
		</tr>
	<?php $i=1 ?>
	<?php foreach($query->result() as $y): ?>
		<tr>
		<td><?php echo $i++ ?></td>
		<td><?php echo $this->cabal_character_table->GetWhere(array('CharacterIdx' => $y->charIdx), NUll, NULL)->row()->Name ?></td>
		<td><?php echo $y->cntcombo ?></td>
		</tr>
	<?endforeach?>
		</table>
<?php endif ?>
<?php endblock() ?>

<?php end_extend()?>
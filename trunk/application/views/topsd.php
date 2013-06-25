<?php extend('template/nav_welcome.php'); ?>

<?php startblock('content') ?>
<h2>Top Solo Dungeon</h2>
<p>Rambo coming in...</p>
<p class="info"><?php echo @$info; ?></p>

	<?php echo form_open() ?>
	<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
	<tr>
	<td><?php echo form_dropdown('dungeon', $this->config->item('SingleDungeonList')).'<br />'.form_error('dungeon') ?></td>
	<td><div class="demo"><?php echo form_submit('sd', 'View') ?></div></td>
	</tr>
	</table>
	<?php echo form_close() ?>

<?php if ($this->form_validation->run() == TRUE): ?>
	<?php if ($query->num_rows() < 1): ?>
		<h3>None have pass <strong><?php echo $this->input->post('dungeon', TRUE) ?> (Single) Dungeon</strong>. None have <strong>survived</strong>. BUT THE STORY STILL LIVES WHICH <strong>COMES FROM NO WHERE.....</strong></h3>
	<?php else: ?>
			<table border="0" width="100%" cellpadding="2" style="border-collapse: collapse">
			<tr>
			<th colspan="4"><h3><?php echo $this->input->post('dungeon', TRUE) ?> (Single)</h3></th>
			</tr>
			<tr>
			<th>&nbsp;</th>
			<th><strong>Name</strong></th>
			<th><strong>Time</strong></th>
			</tr>
		<?php $i=1 ?>
		<?php foreach($query->result() as $y): ?>
			<tr>
			<td><?php echo $i++ ?></td>
			<td><?php echo $y->charName ?></td>
			<td><?php echo $y->passTime ?></td>
			</tr>
		<?php endforeach ?>
			</table>
	<?php endif?>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Adding E-Coin</h2>
<p>Please insert <strong>character</strong></p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Character : ', 'char') ?></td>
		<td><?php echo form_input('char', set_value('char'), 'id="char"').form_error('char') ?></td>
	</tr>
<!--
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Cash : ', 'cash') ?></td>
		<td><?php echo form_input('cash', set_value('cash'), 'id="cash"').form_error('cash') ?></td>
	</tr>
	<tr>
		<td align="right" valign="middle"><?php echo form_label('Cash Bonus : ', 'cashbonus') ?></td>
		<td><?php echo form_input('cashbonus', set_value('cashbonus'), 'id="cashbonus"').form_error('cashbonus') ?></td>
	</tr>
-->
	<tr>
		<td align="center" colspan="2"><?php echo form_submit('search', 'Search') ?></td>
	</tr>
</table>
<?php echo form_close() ?>

<?php if($this->form_validation->run() == TRUE): ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<th>Id</th><th>Character</th>
</tr>
<?php foreach($query->result() AS $ers): ?>
<?php
$f = fmod($ers->CharacterIdx, 8);
$usernum = ($ers->CharacterIdx - $f) / 8;
$user = $this->cabal_auth_table->GetWhere(array('UserNum' => $usernum), NULL, NULL);
?>
	<tr>
		<td><?php echo anchor('admin/add_ecoin/'.$usernum.'/'.$user->row()->ID, $ers->CharacterIdx) ?></td><td><?php echo $ers->Name; ?></td>
	</tr>
<?php endforeach ?>
</table>
<?php endif ?>
</div>
<?php endblock() ?>

<?php end_extend()?>
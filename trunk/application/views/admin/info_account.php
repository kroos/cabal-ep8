<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Account Info</h2>
<p>Insert character name to view its detail</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td align="right" valign="middle">Character : </td>
		<td><?php echo form_input('char', set_value('char')) ?><?php echo form_error('char') ?></td>
		<td><?php echo form_submit('search', 'View') ?></td>
	</tr>
</table>
<?php echo form_close() ?>
</div>

<p>&nbsp;</p>
<?php if (($this->form_validation->run() == FALSE) ): ?>

<?php elseif($query->num_rows() < 1 ): ?>
<p>Sorry, I cant find the character that you are looking for</p>
<?php elseif($acc->num_rows() > 0 ): ?>
	
			<h3>Account</h3>
			<table border="0" cellpadding="2" width="100%">
			<?php foreach($acc->result() as $t): ?>
				<tr>
					<td>UserNum</td><td><?php echo $t->UserNum ?></td>
				</tr>
				<tr>
					<td>ID</td><td><?php echo $t->ID ?></td>
				</tr>
				<tr>
					<td>Login</td>
					<?php if ($t->Login == 0): ?>
						<td>Offline</td>
					<?php else: ?>
						<td>Online</td>
					<?php endif ?>
				</tr>
				<tr>
					<td>LoginTime</td>
					<?php if(floatval(phpversion()) > '5.3'): ?>
						<td><?php echo date_my($t->LoginTime) ?></td>
					<?php else: ?>
						<td><?php echo $t->LoginTime ?></td>
					<?php endif ?>
				</tr>
				<tr>
					<?php if(floatval(phpversion()) > '5.3'):?>
						<td>LogoutTime</td><td><?php echo date_my($t->LogoutTime) ?></td>
					<?php else:?>
						<td>LogoutTime</td><td><?php echo $t->LogoutTime ?></td>
					<?php endif?>
				</tr>
				<tr>
					<td>AuthType</td>
					<?php if ($t->AuthType == 1): ?>
						<td>Normal</td>
					<?php elseif ($t->AuthType == 2): ?>
						<td>Banned</td>
					<?php endif ?>
				</tr>
				<tr>
					<td>PlayTime</td>
					<?php
					$z = fmod($t->PlayTime, 60);
					$x = $t->PlayTime - $z;
					$l = $x / 60;
					?>
					<td><?php echo cabal_time($t->PlayTime) ?></td>
				</tr>
				<tr>
					<td>LastIp</td><td><?php echo $t->LastIp ?></td>
				</tr>
				<tr>
					<td>CreateDate</td><td><?php echo $t->createDate ?></td>
				</tr>
				<tr>
					<td>Email</td><td><?php echo $t->Email ?></td>
				</tr>
			<?php endforeach ?>
			
				<tr>
					<td>Type</td>
					<td>
						<?php
						$type1 = $auth->row()->Type;
						foreach($type as $r => $g) {
							if ($type1 == $r) { echo $g; }
						}
						?>
					</td>
				</tr>
	
			<?php if ($type1 == 1): ?>
				<tr>
					<td>Service Kind</td>
					<td>
						<?php
						$type12 = $auth->row()->ServiceKind;
						foreach($servicekind as $r1 => $g1) {
								if ($type12 == $r1) { echo $g1; }
							}
						?>
					</td>
				</tr>
			<?php endif ?>
			</table>
			<p>&nbsp;</p>
			<h3>Character</h3>
			<table border="0" width="100%">
			<?php foreach($char->result() as $yi): ?>
				<tr>
					<td><strong>CharacterIdx</strong></td>
					<td><?php echo $yi->CharacterIdx ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $yi->Name ?></td>
				</tr>
				<tr>
					<td>Level</td>
					<td><?php echo $yi->LEV ?></td>
				</tr>
				<tr>
					<td>Strength</td>
					<td><?php echo $yi->STR ?></td>
				</tr>
				<tr>
					<td>Dexterity</td>
					<td><?php echo $yi->DEX ?></td>
				</tr>
				<tr>
					<td>Intelligence</td>
					<td><?php echo $yi->INT ?></td>
				</tr>
				<tr>
					<td>Stat Points</td>
					<td><?php echo $yi->PNT ?></td>
				</tr>
				<tr>
					<td>Alz</td>
					<td><?php echo $yi->Alz ?></td>
				</tr>
				<tr>
					<td>Map</td>
					<td>
					<?php
					foreach($this->config->item('map') as $re => $er) {
							if ($yi->WorldIdx == $re) {
									echo $er;
								}
						}
					?>
					</td>
				</tr>
				<tr>
					<td>Map Code</td>
					<td><?php echo $yi->MapsBField ?></td>
				</tr>
				<tr>
					<td>Warp Code</td>
					<td><?php echo $yi->WarpBField ?></td>
				</tr>
				<tr>
					<td>Nation</td>
					<td>
					<?php
					$trw = $this->config->item('nation');
					foreach($trw as $rew => $erw) {
							if ($yi->Nation == $rew) {
									echo $erw;
								}
						}
					?>
					</td>
				</tr>
				<tr>
					<td>Honour</td>
					<td><?php echo $yi->Reputation ?></td>
				</tr>
				<tr>
					<td><hr /></td>
					<td><hr /></td>
				</tr>
			<?php endforeach ?>
			</table>
<?php endif ?>

<?php endblock() ?>

<?php end_extend()?>
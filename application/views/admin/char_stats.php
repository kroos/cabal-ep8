<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Editing Character Statistics</h2>
<p>Edit any value as you see fit, otherwise just leave the default value intact</p>
<p class="info"><?php echo @$info; ?></p>

<?php echo form_open() ?>
		<div class="demo">
				<table border="1" cellpadding="2" cellspacing="1" width="100%" style="border-collapse: collapse">
					<tr>
						<td><b>Categories</b></td>
						<td><b>Details</b></td>
						<td><b>Edit</b></td>
						<td><b>Comment</b></td>
					</tr>
			<?php foreach($query->result() as $u): ?>
					<tr>
						<td>ID</td>
						<td align="center"><?php echo $u->CharacterIdx ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Character</td>
						<td align="center"><?php echo $u->Name ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Level</td>
						<td align="center"><?php echo $u->LEV ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Strength</td>
						<td align="center"><?php echo $u->STR ?></td>
						<td><?php echo form_input('str', set_value('str') == NULL ? 0 : set_value('str')).form_error('str') ?></td>
						<td>this value will be <strong>ADDED</strong> to the existing <strong>strength</strong> point</td>
					</tr>

					<tr>
						<td>Dexterity</td>
						<td align="center"><?php echo $u->DEX ?></td>
						<td><?php echo form_input('dex', set_value('dex') == NULL ? 0 : set_value('dex')).form_error('dex') ?></td>
						<td>this value will be <strong>ADDED</strong> to the existing <strong>dexterity</strong> point</td>
					</tr>

					<tr>
						<td>Intelligence</td>
						<td align="center"><?php echo $u->INT ?></td>
						<td><?php echo form_input('int', set_value('int') == NULL ? 0 : set_value('int')).form_error('int') ?></td>
						<td>this value will be <strong>ADDED</strong> to the existing <strong>intelligence</strong> point</td>
					</tr>

					<tr>
						<td>Extra Points</td>
						<td align="center"><?php echo $u->PNT ?></td>
						<td><?php echo form_input('pnt', set_value('pnt') == NULL ? $u->PNT : set_value('pnt')).form_error('pnt') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>Extra Points</strong> point</td>
					</tr>

					<tr>
						<td>Rank</td>
						<td align="center"><?php echo $u->Rank ?></td>
						<td><?php echo form_input('rnk', set_value('rnk') == NULL ? $u->Rank : set_value('rnk')).form_error('rnk') ?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Alz</td>
						<td align="center"><?php echo $u->Alz ?></td>
						<td><?php echo form_input('alz', set_value('alz') == NULL ? $u->Alz : set_value('alz')).form_error('alz') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>alz</strong> point</td>
					</tr>

					<tr>
						<td>Style</td>
						<?php $t = decode_style($u->Style) ?>
						<td align="center"><?php echo $u->Style ?><br />Rank <?php echo $t['Class_Rank'] ?></td>
						<td><?php echo form_dropdown('style', $this->config->item('style'), set_value('style') == NULL ? $u->Style : set_value('style')).form_error('style') ?></td>
						<td>this value will be <strong>ADDED</strong> to the existing <strong>style</strong> point</td>
					</tr>

					<tr>
						<td>Warp Code</td>
				<?php foreach($this->config->item('wmcode') as $poe => $ope): ?>
					<?php if($u->WarpBField == $poe): ?>
						<td align="center"><?php echo $ope ?></td>
					<?php endif ?>
				<?php endforeach ?>
						<td><?php echo form_dropdown('wc', $this->config->item('wmcode'), set_value('wc') == NULL ? $u->WarpBField : set_value('wc')).form_error('wc') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>warp code</strong> point</td>
					</tr>

					<tr>
						<td>Maps Code</td>
				<?php foreach($this->config->item('wmcode') as $poes => $opes): ?>
					<?php if($u->MapsBField == $poes): ?>
						<td align="center"><?php echo $opes ?></td>
					<?php endif ?>
				<?php endforeach ?>
						<td><?php echo form_dropdown('mc', $this->config->item('wmcode'), set_value('mc') == NULL ? $u->MapsBField : set_value('mc')) ?><?php echo form_error('mc') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>map code</strong> point</td>
					</tr>

					<tr>
						<td>RP</td>
						<td align="center"><?php echo $u->RP ?></td>
						<td><?php echo form_input('rp', set_value('rp') == NULL ? $u->RP : set_value('rp')).form_error('rp') ?></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>Honor</td>
						<td align="center"><?php echo $u->Reputation ?></td>
						<td><?php echo form_input('reput', set_value('reput') == NULL ? $u->Reputation : set_value('reput')).form_error('reput') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>reputation</strong> point</td>
					</tr>

					<tr>
						<td>Nation</td>
				<?php foreach($this->config->item('nation') as $po => $op): ?>
					<?php if($u->Nation == $po): ?>
						<td align="center"><?php echo $op ?></td>
					<?php endif ?>
				<?php endforeach ?>
						<td><?php echo form_dropdown('nat', $this->config->item('nation'), set_value('nat') == NULL ? $u->Nation : set_value('nat')).form_error('nat') ?></td>
						<td>Please take note : if you set this character as <strong>GM</strong>, he/she will have access to the restricted page such as this page</td>
					</tr>

					<tr>
						<td>Rebirth</td>
						<td align="center"><?php echo $u->Rebirth ?></td>
						<td><?php echo form_input('rb', set_value('rb') == NULL ? $u->Rebirth : set_value('rb')).form_error('rb') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>rebirth</strong> point</td>
					</tr>

					<tr>
						<td>Reset</td>
						<td align="center"><?php echo $u->Reset ?></td>
						<td><?php echo form_input('rs', set_value('rb') == NULL ? $u->Reset : set_value('rb')).form_error('rs') ?></td>
						<td>this value will be <strong>SET</strong> to the existing <strong>reset</strong> point</td>
					</tr>

			<?php endforeach ?>
			<tr>
				<td colspan="4" align="center"><?php echo form_submit('submit', 'Submit') ?></td>
			</tr>
		</table>
		</div>
<?php echo form_close() ?>

<?php endblock() ?>

<?php end_extend()?>
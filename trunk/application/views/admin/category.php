<?php extend('template/template.php'); ?>

<?php startblock('content') ?>
<h2>Shop Category</h2>
<p>You can insert more category here</p>
<p class="info"><?php echo @$info; ?></p>

<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<td>
			<?php echo form_label('Category : ', 'cat') ?>
		</td>
		<td>
			<?php echo form_input('cat', set_value('cat'), 'id="cat"').form_error('cat') ?>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<?php echo form_submit('save', 'Save') ?>
		</td>
	</tr>
</table>
<?php echo form_close() ?>

<?php if($cate->num_rows() < 1): ?>
<p>No category yet</p>
<?php else: ?>

<table border="0" cellpadding="2" width="100%">
<tr>
	<th>
		Id
	</th>
	<th>
		Category
	</th>
	<th>
		&nbsp;
	</th>
</tr>
	<?php foreach($cate->result() AS $bm): ?>
		<tr>
			<td><?php echo $bm->id ?></td>
			<td><?php echo $bm->category ?></td>
			<td><?php echo anchor('shopadmin/del_category/'.$bm->id, 'delete', 'title="'.$bm->category.'"') ?></td>
		</tr>
	<?php endforeach ?>
</table>

<?php endif ?>
</div>
<?php endblock() ?>

<?php startblock('top_nav'); ?>
<?php foreach($cate->result() as $ca): ?>
	<li><?php echo anchor('shopadmin/home/'.$ca->id , $ca->category, ($this->uri->uri_string() == 'shopadmin/home/'.$ca->id) ? 'class="current" title="'.$ca->category.'"' : ' title="'.$ca->category.'"'); ?></li>
<?php endforeach ?>
<li><?php echo anchor('cabal/logout', 'logout', ($this->uri->uri_string() == 'cabal/logout') ? 'class="current" title="logout"' : ' title="logout"'); ?></li>
<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('cabal/change_password', 'change password', ($this->uri->uri_string() == 'cabal/change_password') ? 'class="current" title="change password"' : ' title="change password"'); ?></li>
	<li><?php echo anchor('cabal/account', 'account', ($this->uri->uri_string() == 'cabal/account') ? 'class="current" title="account"' : ' title="account"'); ?></li>
	<li><?php echo anchor('cabal/rebirth', 'rebirth', ($this->uri->uri_string() == 'cabal/rebirth') ? 'class="current" title="rebirth"' : ' title="rebirth"'); ?></li>
	<li><?php echo anchor('cabal/reset_rebirth', 'reset rebirth', ($this->uri->uri_string() == 'cabal/reset_rebirth') ? 'class="current" title="reset rebirth"' : ' title="reset rebirth"'); ?></li>
	
<?php $gm = $this->cabal_character_table->GetWhere("CharacterIdx between ({$this->session->userdata('id_user')} * 8) and ({$this->session->userdata('id_user')} * 8 + 5) AND Nation = 3", NULL, NULL); ?>
	<?php if ( ($this->session->userdata('logged_in') == TRUE) && ($gm->num_rows() > 0) ):?>
		<li><?php echo anchor('admin/index', 'home', ($this->uri->uri_string() == 'admin/index') ? 'class="current" title="home"' : ' title="home"')?></li>
		<li><?php echo anchor('admin/online_chars', 'online character', ($this->uri->uri_string() == 'admin/online_chars') ? 'class="current" title="online character"' : ' title="online character"')?></li>
		<li><?php echo anchor('admin/info_account', 'account info', ($this->uri->uri_string() == 'admin/info_account') ? 'class="current" title="account info"' : ' title="account info"')?></li>
		<li><?php echo anchor('admin/edit_account', 'edit account', ($this->uri->uri_string() == 'admin/edit_account') ? 'class="current" title="edit account"' : ' title="edit account"')?></li>
		<li><?php echo anchor('admin/hackuserlog', 'hack user log', ($this->uri->uri_string() == 'admin/hackuserlog') ? 'class="current" title="hack user log"' : ' title="hack user log"')?></li>
		<li><?php echo anchor('admin/ban_account', 'ban account', ($this->uri->uri_string() == 'admin/ban_account') ? 'class="current" title="ban account"' : ' title="ban account"')?></li>
		<li><?php echo anchor('admin/unban_account', 'unban account', ($this->uri->uri_string() == 'unban_account') ? 'class="current" title="unban account"' : ' title="unban account"')?></li>
		<li><?php echo anchor('admin/char_stats_search', 'char stats', ($this->uri->uri_string() == 'admin/char_stats_search') ? 'class="current" title="char stats"' : ' title="char stats"')?></li>
		<li><?php echo anchor('admin/gmip', 'game master IP', ($this->uri->uri_string() == 'admin/gmip') ? 'class="current" title="block IP"' : ' title="block IP"')?></li>
		<li><?php echo anchor('admin/block_ip', 'block IP', ($this->uri->uri_string() == 'admin/block_ip') ? 'class="current" title="game master IP"' : ' title="game master IP"')?></li>
		<li><?php echo anchor('shopadmin/category', 'item category', ($this->uri->uri_string() == 'shopadmin/category') ? 'class="current" title="item category"' : ' title="item category"')?></li>
		<li><?php echo anchor('shopadmin/home', 'edit shop', ($this->uri->uri_string() == 'shopadmin/home') ? 'class="current" title="edit shop"' : ' title="edit shop"')?></li>
	<?php endif?>
<?php endblock(); ?>

<?php startblock('sidebar1'); ?>
<h3>Account Info</h3>
<?php $uc1 = $this->session->userdata('id_user') * 8; ?>
<?php $uc2 = $uc1 + 5; ?>
<?php $k = $this->cabal_character_table->GetWhere("CharacterIdx BETWEEN $uc1 AND $uc2", NULL, NULL)?>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<th><b>Account</b></th>
		<th><b>Character</b></th>
	</tr>
	<tr>
	<?php $rt = $this->cabal_charge_auth->GetWhere(array('UserNum' => $this->session->userdata('id_user')), NULL, NULL)->row()?>
		<td>
		<?php
		$skind = $this->config->item('Type');
		$skind1 = $this->config->item('ServiceKind');

		foreach ($skind as $b => $n) {
			//echo $b.' '.$n.'<br />';
			if ($rt->Type == $b) {
				echo '<p>'.$n.'</p>';
			}
		}

		if($rt->Type == 1) {
			foreach ($skind1 as $b1 => $n1) {
				//echo $b.' '.$n.'<br />';
				if ($rt->ServiceKind == $b1) {
					echo '<p>'.$n1.'</p>';
				}
			}
		}
		?>
		</td>
		<td>
			<table border="0" cellpadding="2" width="100%">
			<?php foreach ($k->result() as $e): ?>
				<tr>
					<td><?php echo $e->Name ?><br /><?php echo $e->Alz ?> Alz<hr /></td>
				</tr>
			<?php endforeach ?>
			</table>
		</td>
	</tr>
	<tr>
	<?php //$this->load->database('CASHSHOP', TRUE) ?>
	<?php $rrt = $this->bank->get_alz($this->uri->segment(3, 0))->row() ?>
	<td colspan="2">Bank = <?php echo $rrt->Alz ?> Alz</td>
	</tr>
</table>
<?php endblock(); ?>

<?php startblock('sidebar2'); ?>
<?php endblock(); ?>

<?php startblock('sidebar3'); ?>
<?php endblock(); ?>

<?php startblock('sidebar4'); ?>
<?php endblock(); ?>

<?php startblock('jscript') ?>
<script>
  $(function() {
    $( "input[type=submit], a, button", ".demo" )
      .button();
    $( "#radioset" ).buttonset();

    // Datepicker
    $('#datepicker').datepicker({dateFormat: "yy-mm-dd"});

    //ucwords
    //$("input[type=text], textarea").keyup(function() {
    //    toUpper(this);
    //});
  });
</script>
<?php endblock() ?>

<?php end_extend()?>
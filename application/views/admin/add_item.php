<?php extend('template/template.php'); ?>

<?php startblock('content') ?>
<h2>Add Shop Item</h2>
<p></p>
<p class="info"><?php echo @$info; ?></p>


<div class="demo">
<?php echo form_open() ?>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<td><?php echo form_label('Item Name : ', 'item_name')  ?></td>
		<td><?php echo form_input('item_name', set_value('item_name'), 'id="item_name"').form_error('item_name') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Description : ', 'item_desc')  ?></td>
		<td><?php echo form_textarea('item_desc', set_value('item_desc'), 'id="item_desc"').form_error('item_desc') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Id : ', 'item_id')  ?></td>
		<td><?php echo form_input('item_id', set_value('item_id'), 'id="item_id"').form_error('item_id') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Option : ', 'item_opt')  ?></td>
		<td><?php echo form_input('item_opt', set_value('item_opt'), 'id="item_opt"').form_error('item_opt') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Duration : ', 'iduration')  ?></td>
		<td><?php echo form_dropdown('iduration', $idur, set_value('iduration'), 'id="iduration"').form_error('iduration') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Image : ', 'item_img')  ?></td>
		<td><?php echo form_input('item_img', set_value('item_img'), 'id="item_img"').form_error('item_img') ?><br />just upload your image inside ./images/items/ and then type in the file name</td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Alz Cost : ', 'item_alz')  ?></td>
		<td><?php echo form_input('item_alz', set_value('item_alz'), 'id="item_alz"').form_error('item_alz') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Category : ', 'item_cat')  ?></td>
		<?php
		if($cate->num_rows() > 0) {
			foreach ($cate->result() as $key) {
				$v[$key->id] = $key->category;
			}
		} else {
			$v = array('' => 'Please insert category');
		}
		?>
		<td><?php echo form_dropdown('item_cat', $v, set_value('item_cat'), 'id="item_cat"').form_error('item_cat') ?></td>
	</tr>
	<tr>
		<td><?php echo form_label('Item Available : ', 'item_avail')  ?></td>
		<td><?php echo form_input('item_avail', set_value('item_avail'), 'id="item_avail"').form_error('item_avail') ?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><?php echo form_submit('add_item', 'Add Item') ?></td>
	</tr>
</table>
<?php echo form_close() ?>
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
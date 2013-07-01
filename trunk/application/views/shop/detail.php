<?php extend('template/template.php'); ?>

<?php startblock('content') ?>
<h2>Detail</h2>
<p>Click on CheckOut once you are done</p>
<p class="info"><?php echo @$info; ?></p>


<table border="0" width="100%" cellpadding="2">
	<tr>
		<td>&nbsp;</td>
		<td><h1><?php echo $item->row()->Name?></h1></td>
	</tr>
	<tr>
		<td rowspan="2" width="136"><img src="<?php echo base_url()?>images/items/<?php echo ($item->row()->Image == NULL) ? 'item.jpg' : $item->row()->Image?>" width="135" height="136" /></td>
		<td valign="center"><?php echo $item->row()->Description?></td>
	</tr>
	<tr>
		<td><?php echo $item->row()->Alz?> Alz</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<?php echo form_open('', '', array('product_id' => $item->row()->Id, 'product_name' => $item->row()->Name, 'product_price' => $item->row()->Alz))?>
			<?php echo form_label('Quantity : ', 'spinner').form_input(array('name' => 'qty', 'value' => set_value('qty') == NULL ? 1 : set_value('qty'), 'id' => 'spinner'))?><?php echo form_error('qty')?><br />
			<?//=form_label('Size : ', 'sz').form_dropdown('size', $size1, set_value('size'), 'id="sz"')?><?php echo form_error('size')?>
			<div class="demo"><?php echo form_submit('add', 'Add to Cart')?></div>
			<?php echo form_close()?>
		</td>
	</tr>
</table>




<?php endblock() ?>

<?php startblock('top_nav'); ?>
<?php foreach($cate->result() as $ca): ?>
	<li><?php echo anchor('shop/index/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0).'/'.$ca->id , $ca->category, ($this->uri->uri_string() == 'shop/index/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0).'/'.$ca->id) ? 'class="current" title="'.$ca->category.'"' : ' title="'.$ca->category.'"'); ?></li>
<?php endforeach ?>
<li><?php echo anchor('shop/cart/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0) , 'cart', ($this->uri->uri_string() == 'shop/cart/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0)) ? 'class="current" title="cart"' : ' title="cart"'); ?></li>
<li><?php echo anchor('shop/checkout/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0) , 'checkout', ($this->uri->uri_string() == 'shop/checkout/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0)) ? 'class="current" title="checkout"' : ' title="checkout"'); ?></li>
<?php endblock()?>

<?php startblock('side_nav'); ?>
	<li><?php echo anchor('http://cabalclose', 'Close'); ?></li>
<?php endblock(); ?>

<?php startblock('sidebar1'); ?>
<h3>Account Info</h3>
<?php $uc1 = $this->uri->segment(3, 0) * 8; ?>
<?php $uc2 = $uc1 + 5; ?>
<?php $k = $this->cabal_character_table->GetWhere("CharacterIdx BETWEEN $uc1 AND $uc2", NULL, NULL)?>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<th><b>Account</b></th>
		<th><b>Character</b></th>
	</tr>
	<tr>
	<?php $rt = $this->cabal_charge_auth->GetWhere(array('UserNum' => $this->uri->segment(3, 0)), NULL, NULL)->row()?>
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

	$(function() {
		$( "#spinner" ).spinner({
			spin: function( event, ui ) {
				if ( ui.value < 0 ) {
					$( this ).spinner( "value", 0 );
					return false;
				}
			}
		});
	});

  });
</script>
<?php endblock() ?>

<?php end_extend()?>
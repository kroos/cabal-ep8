<?php extend('template/template.php'); ?>

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



<?php startblock('content') ?>
<h2>CheckOut</h2>
<p>You can remove unneeded item by set the quantity to 0 (zero)</p>
<p></p>
<p class="info"><?php echo @$info; ?></p>


<?php if($this->cart->total_items() < 1): ?>
	<p>Your cart is empty</p>
<?php else:?>
	<h3>Items in your cart</h3>

	<?php echo form_open('', '', array('bank' => $rrt->Alz)) ?>

	<table cellpadding="6" cellspacing="1" style="width:100%" border="0">
	
	<tr>
		<th>Quantity</th>
		<th>Description</th>
		<th style="text-align:right">Price (Alz)</th>
		<th style="text-align:right">Sub-Total (Alz)</th>
	</tr>
	<?php $i = 1 ?>
	<?php foreach($cart as $items): ?>
	<tr>
		<td><?php echo $items['qty'].form_hidden('qtty', $items['qty']) ?></td>
		<td><?php echo $items['name'].form_hidden('id', $items['id']) ?>
			<?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
				<p>
					<?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
					<strong><?php echo $option_name?> : </strong> <?php echo $this->size->GetWhere(array('size_id' => $option_value), NULL, NULL)->row()->size ?><br />
					<?php endforeach ?>
				</p>
			<?php endif ?>
		</td>
		<td style="text-align:right"><?php echo $this->cart->format_number($items['price']) ?></td>
		<td style="text-align:right"><?php echo $this->cart->format_number($items['subtotal']) ?></td>
	</tr>
	<?php $i++ ?>
	<?php endforeach ?>
	
	<tr>
		<td colspan="2"> </td>
		<td style="text-align:right"><strong>Total</strong></td>
		<td style="text-align:right"><strong><?php echo $this->cart->format_number($this->cart->total())?></strong></td>
	</tr>
	</table>
<p align="center"><div class="demo"><?=form_submit('buy', 'Buy')?></div></p>
	<?php echo form_close() ?>
<?php endif ?>
<?php endblock() ?>



<?php end_extend()?>
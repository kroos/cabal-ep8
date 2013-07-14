<?php extend('template/template.php'); ?>

<?php startblock('content') ?>
<h2>Cabal Shop</h2>
<p>Click on CheckOut once you are done</p>
<p class="info"><?php echo @$info; ?></p>

<?php if($ty->num_rows() < 1): ?>
	<p>No item in this category</p>
<?php else : ?>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
	<tr>
		<th scope="col">&nbsp;</th>
		<th scope="col">Name</th>
		<th scope="col">Details</th>
		<th scope="col">Honour</th>
		<th scope="col">Availability</th>
		<th scope="col">Price(Alz)</th>
	</tr>
	<?php foreach($ty->result() AS $pr): ?>
	<tr>
		<td valign="center"><img src="<?php echo base_url() ?>images/items/<?php echo ($pr->Image == NULL) ? 'item.jpg' : $pr->Image?>" width="100" height="100" /></td>
		<td valign="center">
			<?php if($pr->Available < 1): ?>
				Sold Out !!
			<?php else : ?>
				<div class="demo"><?php echo anchor('shop/detail/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0).'/'.$this->uri->segment(5, 0).'/'.$pr->Id, $pr->Name) ?></div>
			<?php endif ?>
		</td>
		<td valign="center"><?php echo $pr->Description?></td>
		<td valign="center"><?php echo $pr->Honour?></td>
		<td valign="center"><?php echo $pr->Available?></td>
		<td valign="center"><?php echo $pr->Alz?></td>
	</tr>
	<?php endforeach ?>
</table>
<?php endif ?>




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
  });
</script>
<?php endblock() ?>

<?php end_extend()?>
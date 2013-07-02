<?php extend('template/nav_user.php'); ?>

<?php startblock('content') ?>
<h2>Reset Rebirth</h2>
<p>Ever wonder how does it feel to have the power of Cabal God? PK-ing any character with 1 blow (i think...) ? Then take this rebirth reset. You can have this reset if and only if your rebirth is <strong><?=$this->config->item('rebirth_count')?></strong> and you have <strong><?=$this->config->item('alzresetrebirth')?></strong> Alz. Too expensive?<br>Its worth it!!!</p>
<p class="info"><?php echo @$info; ?></p>



<?php echo form_open() ?>
<div class="demo">
<div id="radioset">

<?php $l = 0 ?>
<?php $le = 0 ?>
<?php foreach($query->result() as $o): ?>
	<p><?php echo form_radio('character', $o->CharacterIdx, set_value('character'), 'id="radioset'.$l++.'"'). form_label($o->Name, 'radioset'.$le++) ?>
<?php endforeach ?>
<br /><?php echo form_error('character')?></p>
</div>
<p align="center"><?php echo form_submit('reset_rebirth', 'Reset') ?></p>
</div>
<?php echo form_close() ?>
<?php endblock() ?>

<?php end_extend()?>
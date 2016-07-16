<?php 
	$this->assign('title', 'Pagina di Login'); 
?>

<div class="row">
<div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
<h1 style="padding-left:15px"><?=__('Login')?></h1>
	<div class="panel-body">
	<?php echo $this->Form->create(); ?>
		<?= $this->Flash->render('auth'); ?>
		<fieldset>
		<legend><?= __('Please insert login credentials')?></legend>
		<?php echo $this->Form->input('username',[
			'placeholder'=>'Username'
		]);
		echo $this->Form->input('user_password',['label'=>'Password']);
		echo $this->Form->button(__('Login'),['class'=>'btn btn-primary']);
		?>
		</fieldset>
	<?php echo $this->Form->end(); ?>
	</div>
</div>
</div>
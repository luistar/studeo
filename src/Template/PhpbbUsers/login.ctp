<?php 
	$this->assign('title', 'Pagina di Login'); 
?>

<div class="row">
<div class="col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
<h1 style="padding-left:15px"><?=__('Login')?></h1>
	<div class="panel-body">
	<?php if($this->request->session()->check("Flash.auth")): //shows authentication error alert. ?>
		<div class="alert alert-danger">
			<?= $this->Html->link('&times;','#',['class'=>'close', 'data-dismiss'=>'alert', 'aria-label'=>'close', 'escape'=>false])?>
			<?php 
				// The following code is a workaround for the bug where multiple "Authentication Required" messages were displayed
				// by $this->Flash->render('auth');
				$flash = $this->request->session()->read("Flash.auth");
				if (!is_array($flash)) {
					throw new \UnexpectedValueException('Value for flash setting key "auth" must be an array.');
				}
				echo $flash[0]['message'];
			?>
		</div>
	<?php endif; ?>
	<?php echo $this->Form->create(); ?>
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
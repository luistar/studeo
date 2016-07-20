<?php 
/**
 * Questo elemento è responsabile della costruzione della navbar statica per tutte le pagine. 
 * La navbar prodotto varia a seconda della tipologia di utente e della pagina corrente.
 */
?>

<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?= $this->Html->image('logo.png',['style'=>'margin-right:5px', 'class'=>'navbar-brand','alt'=>'homepage','url'=>['controller'=>'Pages','action'=>'display','home']]);?>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          	<!-- LINK to courses -->
            <li class="active">
            	<!-- Courses dropdown -->
				<div class="btn-group navbar-btn">
				  <button type="button" class="btn " style="background-color: transparent;">Courses</button>
				  <button type="button" class="btn dropdown-toggle" style="background-color: transparent;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="caret"></span>
				    <span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <ul class="dropdown-menu">
				  	<li class="dropdown-header">First Year</li>
				    <li><a href="#">Programming 101</a></li>
				    <li><a href="#">Calculus</a></li>
				    <li><a href="#">Linear Algebra</a></li>
				    <li role="separator" class="divider"></li>
				    <li class="dropdown-header">Second Year</li>
				    <li><a href="#">Programming Languages</a></li>
				    <li><a href="#">Databases</a></li>
				  </ul>
				</div>
            </li>
            <!-- Funzionalità di configurazione -->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Link 2 Dropdown <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><?= $this->Html->link('sublink1',[])?></li>
                <li role="separator" class="divider"></li>
                <li><?= $this->Html->link('sublink2',[])?></li>
                <li><?= $this->Html->link('sublink3',[])?></li>
              </ul>
            </li>
		</ul>
          
          <!--  parte di codice relativa alla parte allineata a destra della navbar -->
          
          
          <ul class="nav navbar-nav navbar-right">
          		<?php if(!$this->request->session()->read('Auth.User')):?>
                	<li>
                		<?= $this->Html->link('<i class="fa fa-sign-in"></i> Login',[
                				'controller' => 'PhpbbUsers',
                				'action' => 'login'
                		],['escape'=>false])?>
                	</li>
                <?php else: ?>
                	<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= __('Welcome, ')?> <strong><?=$this->request->session()->read('Auth.User.username') ?></strong><span class="caret"></span></a>
		              <ul class="dropdown-menu">
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-tint fa-fw"></i> ' . __('Customize (TODO)'),[
	                				'controller' => 'PhpbbUsers',
	                				'action' => 'personalizza'
	                		],['escape'=>false])?>
                		</li>
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-key fa-fw"></i> ' . __('Change Password (TODO)'),[
	                				'controller' => 'PhpbbUsers',
	                				'action' => 'changePassword'
	                		],['escape'=>false])?>
                		</li>
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-sign-out fa-fw"></i> ' . __('Logout'),[
	                				'controller' => 'PhpbbUsers',
	                				'action' => 'logout'
	                		],['escape'=>false])?>
                		</li>
		              </ul>
		            </li>
                <?php endif;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
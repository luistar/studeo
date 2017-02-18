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
          	<li class=""> <!-- TODO: manage active class -->
            	<?=$this->Html->link(__('Professors'),['controller'=>'Professors','action'=>'index'])?>
            </li>
            <?php if($isAdmin):?>
          	<li class=""> 
            	<?=$this->Html->link(__('Professorships'),['controller'=>'Professorships','action'=>'index'])?>
            </li>
            <?php endif;?>
          	<!-- LINK to courses -->
            <li class=""> 
            	<?=$this->Html->link(__('Courses'),['controller'=>'Courses','action'=>'index'])?>
            </li>
            <li class=""> 
            	<?=$this->Html->link(__('Exams'),['controller'=>'Exams','action'=>'index'])?>
            </li>
            <li class=""> 
            	<?=$this->Html->link(__('Solutions'),['controller'=>'Solutions','action'=>'index'])?>
            </li>
            <?php if($isAdmin):?>
            <li class=""> 
            	<?=$this->Html->link(__('Requirements'),['controller'=>'Requirements','action'=>'index'])?>
            </li>
            <?php endif; ?>
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
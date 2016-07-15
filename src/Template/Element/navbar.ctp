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
          	<!-- LINK al backend -->
            <li class="active">
            	<?= $this->Html->link('Link1',[])?>
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
          	<!-- parte valida una volta implementata autenticazione 
          		<?php if(!$this->request->session()->read('Auth.User')):?>
                	<li>
                		<?= $this->Html->link('<i class="fa fa-sign-in"></i> Login',[
                				'controller' => 'Users',
                				'action' => 'login'
                		],['escape'=>false])?>
                	</li>
                <?php else: ?>
                	<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sei autenticato come <strong><?=$this->request->session()->read('Auth.User.username') ?></strong><span class="caret"></span></a>
		              <ul class="dropdown-menu">
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-tint fa-fw"></i> Personalizza',[
	                				'controller' => 'Users',
	                				'action' => 'personalizza'
	                		],['escape'=>false])?>
                		</li>
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-key fa-fw"></i> Cambia password',[
	                				'controller' => 'Users',
	                				'action' => 'changePassword'
	                		],['escape'=>false])?>
                		</li>
		              	<li>
	                		<?= $this->Html->link('<i class="fa fa-sign-out fa-fw"></i> Logout',[
	                				'controller' => 'Users',
	                				'action' => 'logout'
	                		],['escape'=>false])?>
                		</li>
		              </ul>
		            </li>
                <?php endif;?>
                 -->
                 <li>
                 	<?= $this->Html->link('Link per login/logout',[]);?>
                 </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

//$this->layout = 'error'; //usa layout default

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>
<!-- Pagina da mostrare quando &egrave; disabilitata la modalità debug -->
<!-- 
<h2><?= h($message) ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= sprintf(
        __d('cake', 'The requested address %s was not found on this server.'),
        "<strong>'{$url}'</strong>"
    ) ?>
</p>
-->

<div class="container">
	<div class='text-center page-header jumbotron'>
		<h1 style="font-size: 100px"><i class="fa fa-fw fa-question-circle text-danger"></i>Errore <span style="font-family: monospace"><?= $code?></span></h1>
		<p>
			La richiesta non &egrave; sintatticamente corretta o non pu&ograve; essere soddisfatta.
		</p>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<h2>Cosa &egrave; successo?</h2>
			<p>
				<?php if($code==404): ?>
					Un errore 404 implica che il server non pu&ograve; soddisfare la richiesta perch&egrave; il file o la pagina desiderata non sono state trovate.
					Ci&ograve; &egrave; solitamente causato da link non aggiornati o indirizzi scritti in maniera errata.<br>
				<?php elseif($code==403): ?>
					Un errore 403 implica che il server non &ograve; soddisfare la richiesta perch&egrave; l'utente non dispone dell'autorizzazione per accedere alla
					risorsa richiesta.
					Ci&ograve; &egrave; solitamente causato dal tentativo di accesso a file o directory protette per motivi di sicurezza.<br>
				<?php else: ?>
					Un errore <?=$code?> implica che la richiesta non &egrave; sintatticamente corretta o non pu&ograve; essere soddisfatta.<br>
				<?php endif;?>
				Il seguente messaggio d'errore &egrave; stato riportato:
			</p>
			<code>
				<?= $error->getMessage() ?>
			</code>
		</div>
		
		<div class="col-sm-6">
			<h2>Cosa posso fare?</h2>
			<p>
					Se si &egrave; inserito questo url manualmente, verificare che l'indirizzo sia scritto correttamente.
					Se invece si &egrave; arrivati a questa pagina seguendo un link interno all'applicazione <strong>Studeo</strong>, segnalare il problema allo
					<?= $this->Html->link('staff',['controller'=>'Pages','action'=>'display','contacts'])?> indicando il link errato che ha causato l'errore.<br>
			</p>	
		</div>
	</div>
</div>

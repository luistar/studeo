<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

//$this->layout = 'error'; //uso layout default

if (Configure::read('debug')):
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.ctp');

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
<?php if ($error instanceof Error) : ?>
        <strong>Error in: </strong>
        <?= sprintf('%s, line %s', str_replace(ROOT, 'ROOT', $error->getFile()), $error->getLine()) ?>
<?php endif; ?>
<?php
    echo $this->element('auto_table_warning');

    if (extension_loaded('xdebug')):
        xdebug_print_function_stack();
    endif;

    $this->end();
endif;
?>

<!-- pagina da mostrare quando non è attiva modalità debug -->
<!-- vecchia implem.
<h2><?= __d('cake', 'An Internal Error Has Occurred') ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= h($message) ?>
</p>
 -->

<div class="container">
	<div class='text-center page-header jumbotron'>
		<h1 style="font-size: 100px"><i class="fa fa-fw fa-exclamation-triangle text-danger"></i>Errore <span style="font-family: monospace"><?= $code?></span></h1>
		<p>
			Il server ha incontrato un errore interno durante l'elaborazione della richiesta.
		</p>
	</div>
	<div class="row">
		<div class="col-sm-6">
			<h2>Cosa &egrave; successo?</h2>
			<p>	
				Un errore <?= $code ?> implica che il server non &egrave; riuscito ad elaborare la richiesta.
				Ci&ograve; pu&ograve; essere dovuto ad errori nel software oppure all'indisponibilit&agrave;
				di risorse necessarie all'elaborazione.<br>
				Il seguente messaggio d'errore &egrave; stato riportato:
			</p>
			<code>
				<?= $error->getMessage() ?>
			</code>
		</div>
		
		<div class="col-sm-6">
			<h2>Cosa posso fare?</h2>
			<p>
				Prova a <a href="javascript:document.location.reload(true);">ricaricare la pagina</a>.<br>
				Se il problema persiste, segnalare il problema allo
				<?= $this->Html->link('staff',['controller'=>'Pages','action'=>'display','contacts'])?> indicando le funzionalità affette dal problema.
			</p>	
		</div>
	</div>
</div>

<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('/DataTables/datatables.min.css', ['block'=>'css']);?>
<?= $this->Html->script('/DataTables/datatables.min.js', ['inline' => false, 'block' => 'script']);?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Professor'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="">
    <h1 class="page-header"><?= __('Professors') ?></h1>
    <table class="table table-striped table-bordered" id="professorsTable">
        <thead>
            <tr>
                <th scope="col"><?= __('First name') ?></th>
                <th scope="col"><?= __('Last name') ?></th>
                <?php /*
                <th scope="col"><?= $this->Paginator->sort('website') ?></th>
                <th scope="col"><?= $this->Paginator->sort('docentiWebsite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email2') ?></th>
                */?>
                <th scope="col"><?= __('Contacts') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professors as $professor): ?>
            <tr>
                <td><?= h($professor->firstName) ?></td>
                <td><?= h($professor->lastName) ?></td>
                <?php /*
                <td><?= h($professor->website) ?></td>
                <td><?= h($professor->docentiWebsite) ?></td>
                <td><?= h($professor->email1) ?></td>
                <td><?= h($professor->email2) ?></td>
                */?>
                <td>
                	<?php if($professor->website):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-globe"></i>',$professor->website,['escape'=>false,'target'=>'_blank','_full'=>true])?>
                	<?php endif; ?>
                	<?php if($professor->docentiWebsite):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-bank"></i>',$professor->docentiWebsite,['escape'=>false,'target'=>'_blank','_full'=>true])?>
                	<?php endif; ?>
                	<?php if($professor->email1):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-envelope"></i>','mailto:'.$professor->email1,['escape'=>false,'target'=>'_blank','_full'=>true])?>
                	<?php endif; ?>
                	<?php if($professor->email2):?>
                		<?= $this->Html->link('<i class="fa fa-fw fa-envelope"></i>','mailto:'.$professor->email2,['escape'=>false,'target'=>'_blank','_full'=>true])?>
                	<?php endif; ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $professor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $professor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $professor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
	$('#professorsTable').DataTable();
</script>

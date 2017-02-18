<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group">
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $solution->id],['class'=>'btn btn-warning','escape'=>false])?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete {0}?', $solution->info),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?php endif;?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-external-link"></i> '.__('View'), $solution->url,['class'=>'btn btn-success','escape'=>false,'target'=>'_blank']) ?>
</div>


<div class="solutions view large-9 medium-8 columns content">
    <h3><?= h($solution->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Exam') ?></th>
            <td><?= $solution->has('exam') ? $this->Html->link($solution->exam->id, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AuthorAlt') ?></th>
            <td><?= h($solution->authorAlt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Url') ?></th>
            <td><?= h($solution->url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($solution->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($author->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('AddedBy') ?></th>
            <td><?= h($addedBy->username) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('info') ?></th>
            <td><?= h($solution->info) ?></td>
        </tr>
    </table>
</div>

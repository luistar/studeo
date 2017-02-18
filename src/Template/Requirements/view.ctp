<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="btn-group" style="margin-bottom: 25px;">
	<?= $this->Html->link('<i class="fa fa-fw fa-edit"></i> '.__('Edit'), ['action' => 'edit', $requirement->id],['class'=>'btn btn-warning','escape'=>false]) ?>
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $requirement->id], ['confirm' => __('Are you sure you want to delete {0}?', $requirement->id),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Requirements'), ['action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="requirements view large-9 medium-8 columns content">
    <h3><?= h($requirement->id) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Course') ?></th>
            <td><?= $requirement->has('course') ? $this->Html->link($requirement->course->name, ['controller' => 'Courses', 'action' => 'view', $requirement->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Required For') ?></th>
            <td><?= $requirement->has('required') ? $this->Html->link($requirement->required->name, ['controller' => 'Courses', 'action' => 'view', $requirement->required->id]) : '' ?></td>
        </tr>
    </table>
</div>

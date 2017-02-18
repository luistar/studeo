<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="btn-group">
	<?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i> '.__('Delete'), ['action' => 'delete', $professorship->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorship->id),'class'=>'btn btn-danger','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['action' => 'add'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professors'), ['controller'=>'Professors','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller'=>'Courses','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['controller'=>'Professors','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Course'), ['controller'=>'Course','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="professorships form large-9 medium-8 columns content">
    <?= $this->Form->create($professorship) ?>
    <fieldset>
        <legend><?= __('Edit Professorship') ?></legend>
        <?php
            echo $this->Form->input('professor_id', ['options' => $professors]);
            echo $this->Form->input('course_id', ['options' => $courses]);
            echo $this->Form->input('description');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

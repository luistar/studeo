<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="btn-group">
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professors'), ['controller'=>'Professors','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller'=>'Courses','action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professor'), ['controller'=>'Professors','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Course'), ['controller'=>'Course','action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="professorships form large-9 medium-8 columns content">
    <?= $this->Form->create($professorship) ?>
    <fieldset>
        <legend><?= __('Add Professorship') ?></legend>
        <?php
            //echo $this->Form->input('professor_id', ['options' => $professors]);
            echo $this->Form->select('professor_id', $professors, ['empty'=>false]);
            echo $this->Form->input('course_id', ['options' => $courses]);
            echo $this->Form->input('description');
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

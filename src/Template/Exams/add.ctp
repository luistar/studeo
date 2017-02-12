<?php
use Cake\Chronos\Date;

/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="exams form large-9 medium-8 columns content">
    <?= $this->Form->create($exam,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Exam') ?></legend>
        <?php
            echo $this->Form->input('professorship_id', ['options' => $professorships]);
            echo $this->Form->input('url');
            echo $this->Form->label(__('Upload file'));
            echo $this->Form->file('file');
            echo $this->Form->input('isExercise');
            echo $this->Form->input('date', ['empty' => true,'minYear'=>2000,'maxYear'=>date("Y")]);
            echo $this->Form->input('info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

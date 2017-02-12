<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Add Solution') ?></legend>
        <?php
            echo $this->Form->input('exam',[
        		'value'=> $exam->date .' ('.$exam->info.')', 
        		'disabled'=>'disabled']);
            echo $this->Form->input('author');
            echo $this->Form->input('authorAlt');
            echo $this->Form->input('url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

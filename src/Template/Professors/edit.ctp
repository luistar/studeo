<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $professor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $professor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Professors'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="professors form large-9 medium-8 columns content">
    <?= $this->Form->create($professor) ?>
    <fieldset>
        <legend><?= __('Edit Professor') ?></legend>
        <?php
            echo $this->Form->input('firstName');
            echo $this->Form->input('lastName');
            echo $this->Form->input('website');
            echo $this->Form->input('docentiWebsite');
            echo $this->Form->input('email1');
            echo $this->Form->input('email2');
            echo $this->Form->input('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

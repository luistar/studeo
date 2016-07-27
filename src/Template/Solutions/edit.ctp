<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $solution->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Solutions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Exams'), ['controller' => 'Exams', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Exam'), ['controller' => 'Exams', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contributors'), ['controller' => 'Contributors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contributor'), ['controller' => 'Contributors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Edit Solution') ?></legend>
        <?php
            echo $this->Form->input('exam_id', ['options' => $exams]);
            echo $this->Form->input('url');
            echo $this->Form->input('number');
            echo $this->Form->input('contributor_id', ['options' => $contributors]);
            echo $this->Form->input('is_deleted');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

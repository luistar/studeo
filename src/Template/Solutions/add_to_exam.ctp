<?php
/**
  * @var \App\View\AppView $this
  */
?>

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
            echo $this->Form->input('info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

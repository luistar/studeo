<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?php /*
<div class="solutions form large-9 medium-8 columns content">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Add Solution') ?></legend>
        <?php
            echo $this->Form->input('exam_id', ['options' => $exams]);
            echo $this->Form->input('author');
            echo $this->Form->input('authorAlt');
            echo $this->Form->input('addedBy');
            echo $this->Form->input('url');
            echo $this->Form->input('info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
*/?>
<div class="jumbotron alert alert-danger">
	<h1><?=__('Oops!')?></h1>
	<p><?= __('This functionality is no longer available! You shouldn\'t have been able to reach this page. You\'re not trying to hack Studeo, are you?
Anyway to add a solution you must click on the "add solution" button of the  related exam. 
Start by selecting the related {0}.',$this->Html->link(__('course'),['controller'=>'Courses']))?></p>
</div>
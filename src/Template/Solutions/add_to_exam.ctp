<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div class="solutions">
    <?= $this->Form->create($solution) ?>
    <fieldset>
        <legend><?= __('Add Solution') ?></legend>
        <?php
        	$examDescription = $exam->isExercise ? __('Exercise') : __('Exam');
        	$examDescription .= ' - ' . ($exam->date ? $exam->date : '');
        	$examDescription .= $exam->info ? ' - '.$exam->info.' - ' : '';
        	$examDescription .= ' ('.$exam->professorship->course->name.' - '.$exam->professorship->professor->name;
        	$examDescription .= ' - '.$exam->professorship->start_date.'-'.$exam->professorship->end_date.')';
            echo $this->Form->input('exam',[
        		'value'=> $examDescription, 
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

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
            echo $this->Form->input('author',['help'=>__('An user id of the forum account.')]);
            echo $this->Form->input('authorAlt',['help'=>__('A string used to identify the author. Use it when there is no user-id from the forum.')]);
            echo $this->Form->input('url',['help'=>__('Url (with protocol) to the solution.')]);
            echo $this->Form->input('info',['help'=>__('Descriptive field. Must contain text such as "Complete solution" or "Exercise x,y,z".')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

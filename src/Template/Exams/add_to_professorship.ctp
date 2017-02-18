<?php
use Cake\Chronos\Date;

/**
  * @var \App\View\AppView $this
  */
?>
<div class="btn-group" style="margin-bottom: 25px;">
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Exams'), ['action' => 'index'],['class'=>'btn btn-primary','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['controller' => 'Courses', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php if($isAdmin):?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professorship'), ['controller' => 'Professorships', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?php endif;?>
</div>

<div class="exams form large-9 medium-8 columns content">
    <?= $this->Form->create($exam,['type'=>'file']) ?>
    <fieldset>
        <legend><?= __('Add Exam') ?></legend>
        <?php
        	echo $this->Form->input('professorship',[
        		'value'=> $professorship->course->name .' ('.$professorship->professor->name.') '.$professorship->start_date.' - '.$professorship->end_date, 
        		'disabled'=>'disabled']);
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

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
            echo $this->Form->input('professorship_id', ['options' => $professorships]);
            echo $this->Form->input('url',['help'=>__('The exam\'s url. With protocol.')]);
            echo $this->Form->label(__('Upload file'));
            echo $this->Form->file('file');
            echo '<p class="help-block">'.__('Exam upload. Allowed extensions: jpg, pdf, png.')."</p>";
            echo $this->Form->input('isExercise');
            echo '<p class="help-block">'.__('Flag used to mark everything that is not a written exam.')."</p>";
            echo $this->Form->input('date', ['empty' => true,'minYear'=>2000,'maxYear'=>date("Y")]);
            echo $this->Form->input('info');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

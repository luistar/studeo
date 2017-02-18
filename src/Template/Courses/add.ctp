<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="btn-group" style="margin-bottom: 25px;">
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Courses'), ['action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-list"></i> '.__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index'],['class'=>'btn btn-default','escape'=>false]) ?>
	<?= $this->Html->link('<i class="fa fa-fw fa-plus"></i> '.__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add'],['class'=>'btn btn-default','escape'=>false]) ?>
</div>

<div class="courses form large-9 medium-8 columns content">
    <?= $this->Form->create($course) ?>
    <fieldset>
        <legend><?= __('Add Course') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('cfu');
            echo $this->Form->label('logo');
            echo $this->Form->select('logo', $logos, ['empty'=>true]);
            echo $this->Form->input('year');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

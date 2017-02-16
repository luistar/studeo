<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?></li>
    </ul>
</nav>

<h1 class="page-title"><?=__('Courses')?></h1>

<h3><?=__('Bachelor degree')?></h3>
<?= $this->element('coursesBlockDisplay',['title'=>__('First year'),'color'=>'#32abb1','courses'=>$years[1]])?>
<?= $this->element('coursesBlockDisplay',['title'=>__('Second year'),'color'=>'#338cb7','courses'=>$years[2]])?>
<?= $this->element('coursesBlockDisplay',['title'=>__('Third year'),'color'=>'#336eb7','courses'=>$years[3]])?>

<h3><?=__('Master degree')?></h3>
<?= $this->element('coursesBlockDisplay',['title'=>__('First year'),'color'=>'#e05e5e','courses'=>$years[4]])?>
<?= $this->element('coursesBlockDisplay',['title'=>__('Second year'),'color'=>'#b73333','courses'=>$years[5]])?>

<h3><?=__('Free-choice and inactive courses')?></h3>
<?= $this->element('coursesBlockDisplay',['title'=>__('Free-choice courses'),'color'=>'#6a33b7','courses'=>$years[6]])?>
<?= $this->element('coursesBlockDisplay',['title'=>__('Inactive courses'),'color'=>'#808080','courses'=>$years[0]])?>

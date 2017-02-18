<?php
/**
  * @var \App\View\AppView $this
  */
?>


<div class="solutions">
    <h1 class="page-header"><?= __('Solutions') ?></h1>
    <div class="jumbotron">
    	<h2><?=__('Studeo is currently managing {0} solutions',$solutions->count())?></h2>
    	<p><?=__('You can access the solutions and add your own solution by selecting the {0} you\'re interested in.',
    			$this->Html->link(__('course'),['controller'=>'Courses']))?></p>
    </div>
    <?php if($isAdmin):?>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exam_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('author') ?></th>
                <th scope="col"><?= $this->Paginator->sort('authorAlt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('addedBy') ?></th>
                <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutions as $solution): ?>
            <tr>
                <td><?= $this->Number->format($solution->id) ?></td>
                <td><?= $solution->has('exam') ? $this->Html->link($solution->exam->id, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) : '' ?></td>
                <td><?= $this->Number->format($solution->author) ?></td>
                <td><?= h($solution->authorAlt) ?></td>
                <td><?= $this->Number->format($solution->addedBy) ?></td>
                <td><?= h($solution->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $solution->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $solution->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
    <?php endif;?>
</div>

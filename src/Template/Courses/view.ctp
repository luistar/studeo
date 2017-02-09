<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Course'), ['action' => 'edit', $course->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Course'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Professorships'), ['controller' => 'Professorships', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Professorship'), ['controller' => 'Professorships', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="courses view large-9 medium-8 columns content">
    <h3><?= h($course->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($course->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($course->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($course->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cfu') ?></th>
            <td><?= $this->Number->format($course->cfu) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= $this->Number->format($course->year) ?></td>
        </tr>
    </table>
    <div class="related">
    	<?php /*
        <h4><?= __('Related Professorships') ?></h4>
        <?php if (!empty($course->professorships)): ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Professor Id') ?></th>
                <th scope="col"><?= __('Course Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($course->professorships as $professorships): ?>
            <tr>
                <td><?= h($professorships->id) ?></td>
                <td><?= h($professorships->professor_id) ?></td>
                <td><?= h($professorships->course_id) ?></td>
                <td><?= h($professorships->description) ?></td>
                <td><?= h($professorships->start_date) ?></td>
                <td><?= h($professorships->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Professorships', 'action' => 'view', $professorships->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Professorships', 'action' => 'edit', $professorships->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Professorships', 'action' => 'delete', $professorships->id], ['confirm' => __('Are you sure you want to delete # {0}?', $professorships->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </table>
        <?php endif; ?>
        */?>
        <?php if(!empty($course->professorships)):?>
        	<ul>
        		<?php foreach($course->professorships as $professorship ):?>
        			<li><?= $professorship->professor->name ?>(<?=$professorship->description?>) <?= $professorship->start_date ?> - <?= $professorship->end_date ?>
        			<?php if(!empty($professorship->exams)):?>
        				<ul>
        					<?php foreach($professorship->exams as $exam):?>
        						<li>(<?=$exam->date?>) url: <?=$exam->url?>
        						<?php if(!empty($exam->solutions)): ?>
        							<ul>
        								<?php foreach($exam->solutions as $solution): ?>
        									<li>Solution url: <?= $solution->url?></li>
        								<?php endforeach;?>
        							</ul>
        						<?php endif;?>
        						</li>
        					<?php endforeach; ?>
        				</ul>		
        			<?php endif; ?>
        			</li>
        		<?php endforeach; ?>
        	</ul>
        <?php endif; ?>
        		
    </div>
</div>

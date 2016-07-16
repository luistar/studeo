<nav id="actions">
    <ul>
        <li><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Course'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Degrees'), ['controller' => 'Degrees', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Degree'), ['controller' => 'Degrees', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div>
    <h3><?= __('Courses') ?></h3>
    <table class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('picture_path') ?></th>
                <th><?= $this->Paginator->sort('degree_id') ?></th>
                <th><?= $this->Paginator->sort('isMandatory') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= $this->Number->format($course->id) ?></td>
                <td><?= h($course->name) ?></td>
                <td><?= h($course->picture_path) ?></td>
                <td><?= $course->has('degree') ? $this->Html->link($course->degree->name, ['controller' => 'Degrees', 'action' => 'view', $course->degree->id]) : '' ?></td>
                <td><?= h($course->isMandatory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $course->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $course->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h1 class="panel-title">First year</h1>
	</div>
	<!-- <div class="panel-body">  -->
		<div class="list-group">
			<div class="list-group-item">
				<div class="media">
				  <div class="media-left media-top">
				    <a href="#">
				      <img class="media-object hidden-xs hidden-sm" src="http://placehold.it/200x100" alt="lefu">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">Programming 101</h4>
				    Description Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description 
				  </div>
				  <div class="media-left media-bottom">
				    <a href="#" class="btn btn-primary"><?= __('Details')?></a>
				  </div>
				</div>
			</div>
			<div class="list-group-item">
				<div class="media-left media-top">
					<a href="#">
				      <img class="media-object hidden-xs hidden-sm" src="http://placehold.it/200x100" alt="lefu">
				    </a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Calculus I</h4>
				    Calculus I Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description Description 
				</div>
				<div class="media-left media-bottom">
					<div class="btn-group-vertical" role="group" aria-label="...">
						<a href="#" class="btn btn-primary"><?= __('Details')?></a>
					</div>
				</div>
			</div>
			<div class="list-group-item">
				<div class="media-left media-top">
					<a href="#">
				      <img class="media-object hidden-xs hidden-sm" src="http://placehold.it/200x100" alt="lefu">
				    </a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Linear Algebra</h4>
				    Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description Description 
				</div>
				<div class="media-left media-bottom">
					<div class="btn-group-vertical" role="group" aria-label="...">
						<a href="#" class="btn btn-primary"><?= __('Details')?></a>
					</div>
				</div>
			</div>
			<div class="list-group-item">
				<div class="media-left media-top">
					<a href="#">
				      <img class="media-object hidden-xs hidden-sm" src="http://placehold.it/200x100" alt="lefu">
				    </a>
				</div>
				<div class="media-body">
					<h4 class="media-heading">Physics 101</h4>
				    Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description 
				    Description Description Description Description Description Description Description Description Description Description 
				</div>
				<div class="media-left media-bottom">
					<div class="btn-group-vertical" role="group" aria-label="...">
						<a href="#" class="btn btn-primary"><?= __('Details')?></a>
					</div>
				</div>
			</div>
		
		</div>
	<!-- </div> -->
		
	<div class="panel-footer">
		Some footer
	</div>
	
</div>

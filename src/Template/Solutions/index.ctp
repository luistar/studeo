<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->script('Chart.min.js', ['inline' => false, 'block' => 'script']);?>
<?= $this->Html->css('/DataTables/datatables.min.css', ['block'=>'css']);?>
<?= $this->Html->script('/DataTables/datatables.min.js', ['inline' => false, 'block' => 'script']);?>

<div class="solutions">
    <h1 class="page-header"><?= __('Solutions') ?></h1>
    <div class="jumbotron">
    	<h2><?=__('Studeo is currently managing {0} solutions',$solutions->count())?></h2>
    	<p><?=__('You can access the solutions and add your own solution by selecting the {0} you\'re interested in.',
    			$this->Html->link(__('course'),['controller'=>'Courses']))?></p>
    </div>
    <?php if($isAdmin):?>
    <table class="table table-bordered table-striped" id="solutionsTable">
        <thead>
            <tr>
                <?php /*<th scope="col"><?= __('id') ?></th>*/?>
                <th scope="col"><?= __('exam') ?></th>
                <th scope="col"><?= __('author') ?></th>
                <?php /*<th scope="col"><?= __('authorAlt') ?></th>*/?>
                <?php /*<th scope="col"><?= __('addedBy') ?></th>*/?>
                <th scope="col"><?= __('url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($solutions as $solution): ?>
            <tr>
                <?php /*<td><?= $this->Number->format($solution->id) ?></td>*/?>
                <td>
                	<?php if($solution->has('exam')):?>
                		<?= $this->Html->link($solution->exam->date, ['controller' => 'Exams', 'action' => 'view', $solution->exam->id]) ?>
                		<?= h($solution->exam->info)?>
                		(<?= $this->Html->link($solution->exam->professorship->course->name, ['controller' => 'Courses', 'action' => 'view', $solution->exam->professorship->course->id]) ?>
                		- <?= $this->Html->link($solution->exam->professorship->professor->name, ['controller' => 'Professors', 'action' => 'view', $solution->exam->professorship->professor->id]) ?>)
                	<?php endif;?>
                </td>
                <td><?= $solution->has('author') ? h($solution->author->username) : h($solution->authorAlt) ?></td>
                <?php /*<td><?= h($solution->authorAlt) ?></td>*/?>
                <?php /*<td><?= $this->Number->format($solution->addedBy) ?></td> */?>
                <td><?= $this->Html->link('link',$solution->url) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-fw fa-eye"></i>', ['action' => 'view', $solution->id],['escape'=>false,'class'=>'btn btn-xs btn-primary']) ?>
                    <?= $this->Html->link('<i class="fa fa-fw fa-edit"></i>', ['action' => 'edit', $solution->id],['escape'=>false,'class'=>'btn btn-xs btn-warning']) ?>
                    <?= $this->Form->postLink('<i class="fa fa-fw fa-trash"></i>', ['action' => 'delete', $solution->id], ['confirm' => __('Are you sure you want to delete # {0}?', $solution->id),'escape'=>false,'class'=>'btn btn-xs btn-danger']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php /*
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
    */?>
    <?php endif;?>
</div>
<h3 class="page-header"><?=__("Most prolific authors")?></h3>
<div class="row">
	<div class="col-sm-8 col-lg-10">
		<table class="table">
			<thead>
				<tr><th></th><th><?=__('Author')?></th><th><?=__('Solutions')?></th></tr>
			</thead>
			<tbody>
				<?php $count=0;?>
				<?php foreach($bestAuthors as $author):?>
					<tr><td><?=++$count?><td><?=$author->user->username?></td><td><?=$author->count?></td></tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
	<div class="col-sm-4 col-lg-2">
		<canvas id="authorsChart" style="/*max-width: 250px*/"></canvas>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#solutionsTable').DataTable({
		"columnDefs": [
			{ "searchable": false, "orderable": false, "targets": [2,3] }
		],
		"drawCallback": function( settings ) {
			$('[data-toggle="popover"]').popover(); 
	    }
	});
});
</script>

<script>
var authorsCtx = document.getElementById("authorsChart").getContext("2d");

var data = {
	    labels: [
	     	<?php foreach($bestAuthors as $author):?>
	        	"<?= $author->user->username?>",
	        <?php endforeach;?>
	    ],
	    datasets: [
	        {
	            data: [
					<?php foreach($bestAuthors as $author):?>
						<?= '"'.$author->count.'", '?>
					<?php endforeach;?>
	   	        ],
	            backgroundColor: [
	                "#FF6384",
	                "#36A2EB",
	                "#FFCE56",
	                "#8ee235",
	                "#e2ae35"
	            ],
	            hoverBackgroundColor: [
	                "#F46488",
	                "#36A2EB",
	                "#FFCE56",
	                "#8ee235",
	                "#e2ae35"
	            ]
	        }]
	};

var options ={
		//responsive: true,
		//maintainAspectRatio: true
};

var authorsChart = new Chart(authorsCtx, {
    type: 'doughnut',
    data: data,
    options: options
});
</script>
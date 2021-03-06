<?php 
/**
 * Requires $professorships variable
 */
?>

<?php if(!empty($professorships)):?>
	<?php foreach($professorships as $professorship ):?>
		<div class="panel panel-primary studeo-professorship-panel">
			<div class="panel-heading">
				<?= $professorship->professor->name ?> (<?=$professorship->description?>) 
				<?= $professorship->start_date ?> - <?= $professorship->end_date ?>
				<?= $this->Html->link(__('<i class="fa fa-fw fa-info-circle"></i> Details'),
						['controller'=>'Professorships','action'=>'view',$professorship->id],
						['class'=>'btn btn-default btn-xs pull-right studeo-action-button','escape'=>false])?>
				<?= $this->Html->link(__('<i class="fa fa-fw fa-file-text"></i> Add exam'),
						['controller'=>'Exams','action'=>'addToProfessorship',$professorship->id],
						['class'=>'btn btn-default btn-xs pull-right studeo-action-button','escape'=>false])?>
			</div>
			<div>
        		<?= $this->element('examsDisplayGroup', ["exams" => $professorship->exams]); ?>
        	</div>
        </div>
	<?php endforeach; ?>
<?php else: ?>
	<div class="alert alert-danger"><?=__('There are no professorships linked with this course.')?></div>
<?php endif; ?>
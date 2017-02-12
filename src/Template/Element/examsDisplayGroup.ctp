<?php 
/**
 * A professorship object must be available in the $professorship variable (with all associations loaded)
 */
?>
<?php if(!empty($exams)):?>
	<div class="list-group list-group-root studeo-exams-list">
		<?php foreach($exams as $exam): ?>
			<a href="#exam-<?=$exam->id?>" class="list-group-item studeo-exam-item" data-toggle="collapse">
				<i class="fa fa-chevron-right"></i>
				<?= $exam->isExercise ? __('Exercise') : __('Exam') ?>
				<?= $exam->date?> 
				<?= $exam->info?>
				<?php $solutionsCount = count($exam->solutions); ?> 
				(<?= $solutionsCount == 0 ? __('No solutions yet') : __("{0} solution{1} found",  [h($solutionsCount),$solutionsCount==1 ? '' : 's'])?>)
				<?= $this->Form->button('<i class="fa fa-fw fa-cloud-download"></i>'.__('Dowload'),
						['class'=>'btn btn-xs btn-success link-button pull-right studeo-action-button', 'escape'=>false,
						 'data-link'=>$this->Url->build(['controller'=>'Exams','action'=>'download',$exam->id])])?>
				<?= $this->Form->button('<i class="fa fa-fw fa-plus-circle"></i>'.__('Add solution'),
						['class'=>'btn btn-xs btn-primary link-button pull-right studeo-action-button', 'escape'=>false,
						 'data-link'=>$this->Url->build(['controller'=>'Solutions','action'=>'addToExam',$exam->id])])?>
			</a>
			<?php if(!empty($exam->solutions)): ?>
				<div class="list-group collapse studeo-solutions-list" id="exam-<?=$exam->id?>">
					<?php foreach($exam->solutions as $solution): ?>
						<a href="<?=$solution->url?>" class="list-group-item studeo-solution-item"><?=$solution->info?></a>
					<?php endforeach; ?>
			    </div>
			<?php endif;?>
		<?php endforeach; ?>
	</div>
<?php endif;?>

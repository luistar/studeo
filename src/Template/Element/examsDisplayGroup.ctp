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
				<?=$exam->date?> <?= $exam->info?> <?= $this->Form->button('dowload',['class'=>'btn btn-xs btn-success'])?>
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

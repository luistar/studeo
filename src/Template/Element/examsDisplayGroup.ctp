<?php 
/**
 * A professorship object must be available in the $professorship variable (with all associations loaded)
 */
?>
<?php if(!empty($exams)):?>
	<ul class="list-group list-group-root">
		<?php foreach($exams as $exam): ?>
			<li href="#exam-<?=$exam->id?>" class="list-group-item" data-toggle="collapse">
				<i class="fa fa-chevron-right"></i>
				<?=$exam->date?> <?= $exam->info?> <?= $this->Html->link('dowload',[],['class'=>'btn btn-xs btn-success'])?>
			</li>
			<?php if(!empty($exam->solutions)): ?>
				<ul class="list-group list-group-inner collapse" id="exam-<?=$exam->id?>">
					<?php foreach($exam->solutions as $solution): ?>
						<li href="<?=$solution->url?>" class="list-group-item"><?=$solution->info?></a>
					<?php endforeach; ?>
			    </ul>
			<?php endif;?>
		<?php endforeach; ?>
	</ul>
<?php endif;?>

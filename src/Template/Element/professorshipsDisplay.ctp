<?php 
/**
 * Requires $professorships variable
 */
?>

<?php if(!empty($professorships)):?>
	<?php foreach($professorships as $professorship ):?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?= $professorship->professor->name ?>(<?=$professorship->description?>) <?= $professorship->start_date ?> - <?= $professorship->end_date ?></h3>
			</div>
			<div class="">
        	<?= $this->element('examsDisplayGroup', ["exams" => $professorship->exams]); ?>
        	</div>
        </div>
	<?php endforeach; ?>
<?php endif; ?>
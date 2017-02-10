<?php 
/**
 * Requires $professorships variable
 */
?>

<?php if(!empty($professorships)):?>
	<?php foreach($professorships as $professorship ):?>
		<h3><?= $professorship->professor->name ?>(<?=$professorship->description?>) <?= $professorship->start_date ?> - <?= $professorship->end_date ?></h3>
        <?= $this->element('examsDisplayGroup', ["exams" => $professorship->exams]); ?>
	<?php endforeach; ?>
<?php endif; ?>
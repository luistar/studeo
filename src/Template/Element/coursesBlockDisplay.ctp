<?php 
/**
 * Variables:
 * $courses: array of Courses to be displayed in this panel
 * $color: color of the panel (defaults to panel-primary)
 * $title: title of the panel
 */
?>

<div class="panel panel-primary" <?php if($color):?> style="border-color: <?=$color?>;"<?php endif;?>>
	<div class="panel-heading" <?php if($color):?> style="background-color: <?=$color?>; border-color: <?=$color?>;"<?php endif;?>>
		<?=h($title)?>
	</div>
	<table class="table">
		<?php if(!empty($courses)):?>
			<?php foreach($courses as $courseElem): ?>
				<?php 
					$course = $courseElem['course'];
					$examsCount = $courseElem['examsCount'];
					$solCount = $courseElem['solutionsCount'];
				?>
				<tr>
					<td class="col-sm-5"><a href="<?= $this->Url->build(['action'=>'view',$course->id]);?>" class=""
					<?php if($color):?> style="border-color: <?=$color?>;"<?php endif;?>>
					<?=h($course->name);?></a></td>
					<td>(<?=$examsCount.' '.__n(__('exam'),__('exams'),$examsCount)?>,
					 <?=$solCount.' '.__n(__('solution'),__('solutions'),$solCount)?>)</td>
					<?php if($isAdmin):?>
					<td><?= $this->Form->button('<i class="fa fa-fw fa-pencil"></i>'.__('Edit'),
							['class'=>'btn btn-xs btn-warning link-button pull-right studeo-action-button', 'escape'=>false,
							 'data-link'=>$this->Url->build(['action'=>'edit',$course->id])])?></td>
					<?php endif;?>
				
				</tr>
			<?php endforeach;?>
		<?php else: ?>
			<td href="#" class="" <?php if($color):?> style="border-color: <?=$color?>;"<?php endif;?>>
				<?= __('There are no courses in this section.')?>
			</td>
		<?php endif;?>
	</table>
</div>
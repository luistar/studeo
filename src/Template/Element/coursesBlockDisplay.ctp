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
	<div class="list-group">
		<?php if(!empty($courses)):?>
			<?php foreach($courses as $course): ?>
				<a href="<?= $this->Url->build(['action'=>'view',$course->id]);?>" class="list-group-item"
					<?php if($color):?> style="border-color: <?=$color?>;"<?php endif;?>>
					<?=h($course->name);?>
					<?php if($isAdmin):?>
					<?= $this->Form->button('<i class="fa fa-fw fa-pencil"></i>'.__('Edit'),
							['class'=>'btn btn-xs btn-warning link-button pull-right studeo-action-button', 'escape'=>false,
							 'data-link'=>$this->Url->build(['action'=>'edit',$course->id])])?>
					<?php endif;?>
				</a>
			<?php endforeach;?>
		<?php else: ?>
			<a href="#" class="list-group-item" <?php if($color):?> style="border-color: <?=$color?>;"<?php endif;?>>
				<?= __('There are no courses in this section.')?>
			</a>
		<?php endif;?>
	</div>
</div>
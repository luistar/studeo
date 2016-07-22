<div class="page-header">
   	<h1><?= __('Courses') ?></h1>
</div>

<div>
	<table class="table table-striped">
		<thead>
			<tr style="font-size:1.2em"><th colspan="4">First year <i class="fa fa-caret-square-o-down pull-right" style="margin-right:10px; text-size:1.2em"></i></th></tr>
			<tr>
				<th></th><th><?=__('Course')?></th>
				<th class="hidden-xs"><?=__('Tests')?></th><th class="hidden-xs"><?=__('Solutions')?></th></tr>
		</thead>
		<tbody>
			<?php foreach ($courses as $course): ?>
				<td class="col-md-1"><?=$this->Html->image('courses/icons/'.$course->picture_path,['class'=>'img-circle','width'=>'64px','height'=>'64px'])?></td>
				<td>
					<?=$this->Html->link($course->name,['action'=>'view',$course->id],['class'=>'course-name']);?><br>
					<i><?=$course->description?></i></td>
				<td class="col-md-1 hidden-xs">25</td>
				<td class="col-md-1 hidden-xs">52</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>	


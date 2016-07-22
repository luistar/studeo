<div class="page-header">
   	<h1><?= __('Courses') ?></h1>
</div>

<?php if($this->request->session()->read('Auth.User.group_id')=='5'):?>
	<?= $this->Html->link(__('Admin Control Panel'),['action'=>'admin'],['class'=>'btn btn-primary','style'=>'margin-bottom:10px'])?>
<?php endif;?>

<div class="panel panel-default">
	<table class="table table-striped">
		<thead>
			<tr class="courses-table-header info"><th colspan="4">First year <i class="fa fa-fw fa-caret-square-o-down pull-right" style="margin-right:10px; text-size:1.2em"></i></th></tr>
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
		<tfoot>
			<tr><td colspan="4">Footer</td></tr>
		</tfoot>
	</table>
</div>	


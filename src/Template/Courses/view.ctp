<?php 
	echo $this->Html->css('bootstrap-treeview.min.css',['block' => true]);
	echo $this->Html->script('bootstrap-treeview.min.js',['block' => true]);
?>

<?php 
	$groups = $course->groups;
	$professorships = [];
	if($groups){
		foreach($groups as $group){
			$professorships = array_merge($professorships, $group->professorships);
		}
	}
	$professors = [];
	$exams = [];
	foreach($professorships as $professorship){
		$professors = array_push($professors, $professorship->professor);
		$exams      = array_merge($exams, $professorship->exams);
	}
	$solutions = [];
	foreach($exams as $exam){
		$solutions  = array_merge($solutions,$exam->solutions);
	}

	$groupsNum = count($groups);
	$examsNum = count($exams);
	$solutionsNum = count($solutions);

?>

<div class="row">
	<div class="col-sm-12">
		<div class="well panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-4 text-center">
						<?= $this->Html->image('courses/icons/'.$course->picture_path,['alt'=>'Course logo', 'class'=>'center-block img-circle img-thumbnail img-responsive'])?>
					</div> 
					<div class="col-xs-12 col-sm-8">
						<h2><?= $course->name?></h2>
						<p><strong><?=__('Description')?>: </strong> <?= $course->description?> </p>
						<p><strong><?=__('Degree')?>: </strong> <?= $course->has('degree') ? $this->Html->link($course->degree->name, ['controller' => 'Degrees', 'action' => 'view', $course->degree->id]) : '' ?> </p>
					</div>
					<div class="clearfix"></div>
					<div class="col-xs-12 col-sm-4">
						<h3><strong> <?= $examsNum ?></strong> </h3>
						<p><small><?= $examsNum==1 ? __('Exam'):__('Exams')?></small></p>
						<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> <?=__('Add exam')?> </button>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3><strong> <?= $solutionsNum ?> </strong></h3>
						<p><small><?= $solutionsNum==1 ? __('Solution'):__('Solutions')?></small></p>
						<button class="btn btn-info btn-block"><span class="fa fa-search"></span> Toggle search </button>
					</div>
					<div class="col-xs-12 col-sm-4">
						<h3><strong><?= $groupsNum ?></strong></h3>
						<p><small><?= $groupsNum==1 ? __('Group'):__('Groups')?></small></p>
						<button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> <?=__('View groups')?> </button>  
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="treeList">
	<ul class="list-group">
		<li class="list-group-item group-toggle" data-professorship-id="1" data-is-expanded="1">
			<span class="fa fa-fw fa-minus toggle-icon toggle-icon"></span>
			Gruppo 1 (Prof. Giuliano Laccetti) <a href="http://www.google.it" class="pull-right">Show only this group</a>
		</li>
		<li class="list-group-item group-1 exam-toggle">
			<span class="indent-1"></span>
			<span class="fa fa-fw fa-minus toggle-icon"></span>
			12/03/2015
		</li>
		<li class="list-group-item group-1 exam-toggle" data-exam-id="2">
			<span class="indent-1"></span>
			<span class="fa fa-fw fa-minus toggle-icon"></span>
			25/02/2015
		</li>
		<li class="list-group-item group-1 solution-2">
			<span class="indent-2"></span>
				Solution by Contributor3
		</li>
		<li class="list-group-item group-toggle" data-professorship-id="2" data-is-expanded="1">
			<span class="fa fa-fw fa-minus toggle-icon"></span>
			Gruppo 2 (Prof. Paola Festa) <a href="http://www.google.it" class="pull-right">Show only this group</a>
		</li>
		<li class="list-group-item group-2 exam-toggle">
			<span class="indent-1"></span>
			<span class="fa fa-fw fa-minus toggle-icon"></span>
			12/03/2015
		</li>
		<li class="list-group-item group-2 exam-toggle" data-exam-id="3">
			<span class="indent-1"></span>
			<span class="fa fa-fw fa-minus toggle-icon"></span>
			25/02/2015
		</li>
		<li class="list-group-item group-2 solution-3">
			<span class="indent-2"></span>
				Solution by Contributor6
		</li>
		<li class="list-group-item group-2 solution-3">
			<span class="indent-2"></span>
				Solution by Contributor7
		</li>
	</ul>
</div>

<script>
$('.group-toggle').click(function (){
	var group_id = $(this).attr('data-professorship-id');
	if( $(this).attr('data-is-expanded')==0 ){
		$('.group-'+group_id).show();
		$(this).attr('data-is-expanded',1);
		$(this).find('.toggle-icon').removeClass('fa-plus').addClass('fa-minus');
	}else{
		$('.group-'+group_id).hide();
		$(this).attr('data-is-expanded',0);
		$(this).find('.toggle-icon').removeClass('fa-minus').addClass('fa-plus');
	}
});

$('.exam-toggle').click(function(){
	var exam_id = $(this).attr('data-exam-id');
	$('.solution-'+exam_id).toggle();
	if( $(this).find('.toggle-icon').hasClass('fa-minus')){
		$(this).find('.toggle-icon').removeClass('fa-minus').addClass('fa-plus');
	}else{
		$(this).find('.toggle-icon').removeClass('fa-plus').addClass('fa-minus');
	}
});
</script>

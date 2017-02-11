<?php
/**
 * Homepage.
 * In future it won't be static, probably we'll make a home() function in ArticlesController to present the homepage.
 */

//$this->layout = false; //let's use default.ctp layout for this page
?>

<div class="jumbotron">
	<h1>Homepage example</h1>
	<p>Please note that this page is merely a temporary example!</p>
	<?= $this->Html->link('<i class="fa fa-gears"></i> Sample link',[],['class'=>'btn btn-primary','escape'=>false])?>
</div>

<div class="row">
	<div class="col-md-3 col-md-push-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?=__('Archive')?></h1>
			</div>
			
			<ul class="list-group">
				<li class="list-group-item">
					<a href="#"><?=__('September') ?> 2016 (4)</a>
					<ul>
						<li> Article 1
						<li> Article 4
						<li> Article 3
						<li> Article 2
					</ul>
				</li>
				<li class="list-group-item">
					<a href="#"><?=__('July') ?> 2016 (2)</a>
				
					<ul>
						<li> Article 1
						<li> Article 4
					</ul>
				</li>
			</ul>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?=__('Some widget')?></h1>
			</div>
			<div class="panel-body">
				Some content. Bah. <strong>Bold.</strong>
			</div>
			<div class="panel-footer">
				Some footer
			</div>
		</div>
	</div>

	<div class="col-md-9 col-md-pull-3">
		<div class="article-preview clearfix">
			<h3>Very important news!</h3>
			<div class="well article-header">
				<?= __('Posted {0} by {1}',['5 days ago',$this->Html->link('admin',['controller'=>'PhpbbUser','action'=>'view'])])?>
				| <i class="fa fa-tags"></i> Labels: 	<span class="label label-default">News</span>
							<span class="label label-primary">Exams</span>
							<span class="label label-success">Graduations</span>
							<span class="label label-info">Public Service Announcements</span>
							<span class="label label-warning">Meta</span>
							<span class="label label-danger">Important</span>
			</div>
			<p>
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
				This is very important <strong>example news</strong>!  This is very (...)  
			</p>
			<?= $this->Html->link(__('Read more'),[],['class'=>'btn btn-primary pull-right'])?>
		</div>
		<hr>
		<div class="article-preview clearfix">
			<h3>Older news</h3>
			<div class="well article-header ">
				<?= __('Posted {0} by {1}',['10 days ago',$this->Html->link('admin',['controller'=>'PhpbbUser','action'=>'view'])])?>
				| <i class="fa fa-tag"></i> Label: 	<span class="label label-default">News</span>
			</div>
			<p>
				This is very important <strong>older news</strong>! Please read carefully but not as carefully as the latest one! 
			</p>
			<?= $this->Html->link(__('Read more'),[],['class'=>'pull-right btn btn-primary'])?>
		</div>
	</div>
</div>



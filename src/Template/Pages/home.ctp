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
	<div class="col-md-9">
		<div class="article-preview clearfix">
			<h3>Very important news!</h3>
			<div class="well" style="padding:10px">
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
			<div class="well" style="padding:10px">
				<?= __('Posted {0} by {1}',['10 days ago',$this->Html->link('admin',['controller'=>'PhpbbUser','action'=>'view'])])?>
				| <i class="fa fa-tag"></i> Label: 	<span class="label label-default">News</span>
			</div>
			<p>
				This is very important <strong>older news</strong>! Please read carefully but not as carefully as the latest one! 
			</p>
			<?= $this->Html->link(__('Read more'),[],['class'=>'pull-right btn btn-primary'])?>
		</div>
	</div>
	<div class="col-md-3">
		<ul>
			<li> This
			<li> is
			<li> some
			<li> sort
			<li> of
			<li> <?= $this->Html->link('list',[])?>
			<li> (sidebar example!)
		</ul>
	</div>
</div>



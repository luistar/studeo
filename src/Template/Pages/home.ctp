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
		<h3>Very important news!</h3>
		<p>
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
			This is very important <strong>example news</strong>!  This is very important <strong>example news</strong>!  
		</p>
		
		<h3>Older news</h3>
		<p>
			This is very important <strong>older news</strong>! Please read carefully but not as carefully as the latest one! 
		</p>
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



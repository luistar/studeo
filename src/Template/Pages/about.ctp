<?php
/**
 * Homepage.
 * In future it won't be static, probably we'll make a home() function in ArticlesController to present the homepage.
 */

//$this->layout = false; //let's use default.ctp layout for this page
?>

<div class="jumbotron">
	<h1>St&ugrave;deo</h1>
	<p><?=__('A basic CMS for university courses.')?></p>
	<?=$this->Html->link('<i class="fa fa-fw fa-github"></i> '.__('GitHub page'),'https://www.github.com/luistar/studeo',['escape'=>false,'class'=>'btn btn-lg btn-primary'])?>
</div>



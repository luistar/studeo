<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Studeo: a CMS for university courses';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= '';//$this->Html->meta('icon') ?>
    
    <?php /*Favicons code*/?>
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">
	
	<?php /*facebook opengraph meta*/?>
	
	<meta property="og:image:height" content="508">
	<meta property="og:image:width" content="970">
	<meta property="og:description" content="Condividi tracce e soluzioni in maniera efficiente.">
	<meta property="og:title" content="Studeo: Informatica UniNa">
	<meta property="og:image" content="/img/og-image.jpg">
	<meta property="og:url" content="studeo.informatica-unina.com">

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('custom.css') ?>
    
    <?= $this->Html->script('jquery-2.2.4.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('studeo-utils.js') ?>
	<?php /* Metadata, css, script added in templates will be inserted in the following points */ ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?> 
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->element('navbar',['isAdmin'=>$isAdmin,'isMod'=>$isMod]); //inserisce navbar da src/Template/Element/navbar.ctp ?>
    <div class="container">
    	<?= $this->Flash->render(); //renders flash element ?>
    </div>
    <div class="container">
        <?= $this->fetch('content') ?>
    </div>
    <!-- footer (TODO) -->
</body>
</html>

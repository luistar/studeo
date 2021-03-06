<?php
/**
 * Homepage.
 * In future it won't be static, probably we'll make a home() function in ArticlesController to present the homepage.
 */

//$this->layout = false; //let's use default.ctp layout for this page
?>

<div id="large-header" class="large-header" style="padding: 0px; border-radius:4px; margin-bottom: 10px;">
	<canvas id="demo-canvas"></canvas>
	<h2 class="main-title">Studeo<br>
	<small>Universit&agrave; degli Studi di Napoli Federico II<br>
	Computer Science</small></h2>
</div>

<div class="row">
	<div class="col-xs-6 col-sm-3">
		<?= $this->Html->link('<i class="fa fa-fw fa-users"></i><br/>'.__('Professors'),['controller'=>'Professors'],['class'=>'btn btn-lg btn-studeo-red btn-block','escape'=>false])?>
	</div>
	<div class="col-xs-6  col-sm-3">
		<?= $this->Html->link('<i class="fa fa-fw fa-graduation-cap"></i><br/>'.__('Courses'),['controller'=>'Courses'],['class'=>'btn btn-lg btn-primary btn-block','escape'=>false])?>
	</div>
	<div class="col-xs-6 col-sm-3">
		<?= $this->Html->link('<i class="fa fa-fw fa-file-text"></i><br/>'.__('Exams'),['controller'=>'Exams'],['class'=>'btn btn-lg btn-warning btn-block','escape'=>false])?>
	</div>
	<div class="col-xs-6 col-sm-3">
		<?= $this->Html->link('<i class="fa fa-fw fa-comments"></i><br/>'.__('Solutions'),['controller'=>'Solutions'],['class'=>'btn btn-lg btn-studeo-light-blue btn-block','escape'=>false])?>
	</div>
</div>

<div class="row" >
	<div class="col-md-4">
		<h3 class="page-header"><?=__('What is this?')?></h3>
		<p style="font-size: 1.1em">
		<?=__('Studeo is a basic CMS built for university courses. It allows students to share exams and solutions efficiently.')?>
		</p>
	</div>
	<div class="col-md-4">
		<h3 class="page-header"><?=__('May I contribute?')?></h3>
		<p style="font-size: 1.1em">
		<?=__('Studeo is free and open source. You may suggest new features or contribute directly on the GitHub page.')?>
		</p>
		<?=$this->Html->link('<i class="fa fa-fw fa-github"></i> '.'GitHub Page','https://www.github.com/luistar/studeo',['class'=>'btn btn-primary','escape'=>false])?>
	</div>
	<div class="col-md-4">
		<h3 class="page-header"><?=__('Found an error!')?></h3>
		<p style="font-size: 1.1em">
		<?=__('If you think you found some inaccurate information or are experiencing problems with Studeo, please contact us and describe the issue.')?>
		</p>
		<?=$this->Html->link('<i class="fa fa-fw fa-users"></i> '.__('Contact us'),['controller'=>'Pages','contacts'],['class'=>'btn btn-primary','escape'=>false])?>
	</div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
<script>
(function() {

    var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

    // Main
    initHeader();
    initAnimation();
    addListeners();

    function initHeader() {
        //width = window.innerWidth;
        width = document.getElementById('large-header').offsetWidth;
        //height = window.innerHeight;
        height = document.getElementById('large-header').offsetHeight;
        target = {x: width/2, y: height/2};

        largeHeader = document.getElementById('large-header');
        //largeHeader.style.height = height+'px';

        canvas = document.getElementById('demo-canvas');
        canvas.width = width;
        canvas.height = height;
        ctx = canvas.getContext('2d');

        // create points
        points = [];
        for(var x = 0; x < width; x = x + width/10) {
            for(var y = 0; y < height; y = y + height/10) {
                var px = x + Math.random()*width/20;
                var py = y + Math.random()*height/20;
                var p = {x: px, originX: px, y: py, originY: py };
                points.push(p);
            }
        }

        // for each point find the 5 closest points
        for(var i = 0; i < points.length; i++) {
            var closest = [];
            var p1 = points[i];
            for(var j = 0; j < points.length; j++) {
                var p2 = points[j]
                if(!(p1 == p2)) {
                    var placed = false;
                    for(var k = 0; k < 5; k++) {
                        if(!placed) {
                            if(closest[k] == undefined) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }

                    for(var k = 0; k < 5; k++) {
                        if(!placed) {
                            if(getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                closest[k] = p2;
                                placed = true;
                            }
                        }
                    }
                }
            }
            p1.closest = closest;
        }

        // assign a circle to each point
        for(var i in points) {
            var c = new Circle(points[i], 2+Math.random()*2, 'rgba(255,255,255,0.3)');
            points[i].circle = c;
        }
    }

    // Event handling
    function addListeners() {
        if(!('ontouchstart' in window)) {
            document.getElementById('large-header').addEventListener('mousemove', mouseMove);
        }
        //window.addEventListener('scroll', scrollCheck);
        window.addEventListener('resize', resize);
    }

    function mouseMove(e) {
        var posx = posy = 0;
        //if (e.pageX || e.pageY) {
        //    posx = e.pageX;
        //    posy = e.pageY;
        //}
        //else if (e.clientX || e.clientY)    {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        //}
        target.x = posx;
        target.y = posy;
    }

    function scrollCheck() {
        if(document.body.scrollTop > height) animateHeader = false;
        else animateHeader = true;
    }

    function resize() {
    	//width = window.innerWidth;
        width = document.getElementById('large-header').offsetWidth;
        //height = window.innerHeight;
        height = document.getElementById('large-header').offsetHeight;
        //largeHeader.style.height = height+'px';
        //canvas.width = width;
        //canvas.height = height;
        target = {x: width/2, y: height/2};
    }

    // animation
    function initAnimation() {
        animate();
        for(var i in points) {
            shiftPoint(points[i]);
        }
    }

    function animate() {
        if(animateHeader) {
            ctx.clearRect(0,0,width,height);
            for(var i in points) {
                // detect points in range
                if(Math.abs(getDistance(target, points[i])) < 4000) {
                    points[i].active = 0.3;
                    points[i].circle.active = 0.6;
                } else if(Math.abs(getDistance(target, points[i])) < 20000) {
                    points[i].active = 0.1;
                    points[i].circle.active = 0.3;
                } else if(Math.abs(getDistance(target, points[i])) < 40000) {
                    points[i].active = 0.02;
                    points[i].circle.active = 0.1;
                } else {
                    points[i].active = 0;
                    points[i].circle.active = 0;
                }

                drawLines(points[i]);
                points[i].circle.draw();
            }
        }
        requestAnimationFrame(animate);
    }

    function shiftPoint(p) {
        TweenLite.to(p, 1+1*Math.random(), {x:p.originX-50+Math.random()*100,
            y: p.originY-50+Math.random()*100, ease:Circ.easeInOut,
            onComplete: function() {
                shiftPoint(p);
            }});
    }

    // Canvas manipulation
    function drawLines(p) {
        if(!p.active) return;
        for(var i in p.closest) {
            ctx.beginPath();
            ctx.moveTo(p.x, p.y);
            ctx.lineTo(p.closest[i].x, p.closest[i].y);
            ctx.strokeStyle = 'rgba(156,217,249,'+ p.active+')';
            ctx.stroke();
        }
    }

    function Circle(pos,rad,color) {
        var _this = this;

        // constructor
        (function() {
            _this.pos = pos || null;
            _this.radius = rad || null;
            _this.color = color || null;
        })();

        this.draw = function() {
            if(!_this.active) return;
            ctx.beginPath();
            ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
            ctx.fillStyle = 'rgba(156,217,249,'+ _this.active+')';
            ctx.fill();
        };
    }

    // Util
    function getDistance(p1, p2) {
        return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
    }
    
})();
</script>



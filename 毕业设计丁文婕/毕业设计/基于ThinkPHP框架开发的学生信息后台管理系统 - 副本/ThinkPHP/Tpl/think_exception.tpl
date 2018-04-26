<?php
    if(C('LAYOUT_ON')) {
        echo '{__NOLAYOUT__}';
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>系统发生错误</title>

<style type="text/css">
*{ padding: 0; margin: 0; }
html{ overflow-y: scroll; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
img{ border: 0; }
.error{ padding: 24px 48px; }
.face{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
h1{ font-size: 32px; line-height: 48px; }
.error .content{ padding-top: 10px}
.error .info{ margin-bottom: 12px; }
.error .info .title{ margin-bottom: 3px; }
.error .info .title h3{ color: #000; font-weight: 700; font-size: 16px; }
.error .info .text{ line-height: 24px; }
.copyright{ padding: 12px 48px; color: #999; }
.copyright a{ color: #000; text-decoration: none; }
</style>
<style type="text/css">
	body {
  background:#2196F3;
  h1 {
    position: fixed;
    text-align:center;
    bottom:10px;
    left:30px;
    color:white;
    font-size: 20px;
    font-family: Roboto;
    font-weight: normal;
    z-index:999;
    span{
      font-size:15px;
      font-weight: lighter;
    }
    a{
      color:white;
      font-size:15px;
      padding: 0 30px

    }
  }
}
#notFound {
  position: fixed;
  top:50%;
  left:50%;
  transform:translateY(-50%) translateX(-50%) scale(1.2);
  width:80%;
  height:auto;
  
}
</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/pixi.js/2.2.5/pixi.js"></script>
</head>
<body>
<div class="error">

<div class="content">
<?php if(isset($e['file'])) {?>
	<div class="info">
		<div class="title">
			<h3>错误位置</h3>
		</div>
		<div class="text">
			<p>FILE: <?php echo $e['file'] ;?> &#12288;LINE: <?php echo $e['line'];?></p>
		</div>
	</div>
<?php }?>
<?php if(isset($e['trace'])) {?>
	<div class="info">
		<div class="title">
			<h3>TRACE</h3>
		</div>
		<div class="text">
			<p><?php echo nl2br($e['trace']);?></p>
		</div>
	</div>
<?php }?>
</div>
</div>
</body>
<script type="text/javascript">
	//animation frame polyfill
(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for (var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x] + 'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x] + 'CancelAnimationFrame'] || window[vendors[x] + 'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() {
                    callback(currTime + timeToCall);
                },
                timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());

//math2 utils
var Math2={};Math2.random=function(t,n){return Math.random()*(n-t)+t},Math2.map=function(t,n,r,a,o){return(o-a)*((t-n)/(r-n))+a},Math2.randomPlusMinus=function(t){return t=t?t:.5,Math.random()>t?-1:1},Math2.randomInt=function(t,n){return n+=1,Math.floor(Math.random()*(n-t)+t)},Math2.randomBool=function(t){return t=t?t:.5,Math.random()<t?!0:!1},Math2.degToRad=function(t){return rad=t*Math.PI/180,rad},Math2.radToDeg=function(t){return deg=180/(Math.PI*t),deg},Math2.rgbToHex=function(t){function n(t){return("0"+parseInt(t).toString(16)).slice(-2)}t=t.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);var r=n(t[1])+n(t[2])+n(t[3]);return r.toUpperCase()},Math2.distance=function(t,n,r,a){return Math.sqrt((r-t)*(r-t)+(a-n)*(a-n))};

//mouse
var mousePos={
  x:0,
  y:0
};
window.onmousemove = function(e) {
            
            e = e || window.event;

			var pageX = e.pageX;
			var pageY = e.pageY;
			if (pageX === undefined) {
				pageX = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
				pageY = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
			}
            mousePos = {
                x: pageX,
                y: pageY,
            };
        }
        
        

var options = {
        width: window.innerWidth,
        height: window.innerHeight,
        keyword : "404",
				density : 10,
				densityText : 3,
				minDist : 20,
    }
    // initialize canvas
var canvas = document.createElement('canvas');
canvas.width = options.width;
canvas.height = options.height;
canvas.style.width = options.width/2;
canvas.style.height = options.height/2;
canvas.getContext('2d').scale(2,2)

var renderer = new PIXI.autoDetectRenderer(options.width, options.height, {
    transparent: true
});
var stage = new PIXI.Stage("0X000000", true);
document.body.appendChild(renderer.view);
renderer.view.id = "notFound";







var imageData = false;
var particles =[]; 


function init() {
    positionParticles();
    positionText();
}

function positionParticles() {

    var canvas = document.createElement("canvas");
    canvas.width = 500;
    canvas.height = 350;
    var context = canvas.getContext("2d");
    context.fillStyle = "#000000";
    context.font = "300px 'Arial', sans-serif";
    context.fillText(options.keyword, 0, 250);

    var imageData = context.getImageData(0, 0, 350, 500);
    data = imageData.data;

    // Iterate each row and column
    for (var i = 0; i < imageData.height; i += options.density) {
        for (var j = 0; j < imageData.width; j += options.density) {

            // Get the color of the pixel
            var color = data[((j * (imageData.width * 4)) + (i * 4)) - 1];

            // If the color is black, draw pixels
            if (color == 255) {
                var newPar = particle()
                newPar.setPosition(i, j);
                particles.push(newPar);
                stage.addChild(newPar)
            }
        }
    }
}

function positionText() {
    var canvas = document.createElement("canvas");
    canvas.width = 400;
    canvas.height = 120;
    var context = canvas.getContext("2d");
    context.fillStyle = "#000000";
    context.font = "80px 'Arial', sans-serif";
    context.fillText("Not Found", 0, 80);

    var imageData = context.getImageData(0, 0, 400, 400);
    data = imageData.data;

    // Iterate each row and column
    for (var i = 0; i < imageData.height; i += options.densityText) {
        for (var j = 0; j < imageData.width; j += options.densityText) {

            // Get the color of the pixel
            var color = data[((j * (imageData.width * 4)) + (i * 4)) - 1];

            // If the color is black, draw pixels
            if (color == 255) {
                var newPar = particle(true)
                newPar.setPosition(i, j);
                particles.push(newPar);
                stage.addChild(newPar)
            }
        }
    }
}

function particle(text) {

    $this = new PIXI.Graphics()

    if (text == true) {
        $this.text = true;
    }

    $this.beginFill(0XFFFFFF);

    var radius;
    $this.radius = radius = $this.text ? Math.random() * 3.5 : Math.random() * 10.5;

    $this.drawCircle(0, 0, radius);

    $this.size = this.radius;
    $this.x = -this.width;
    $this.y = -this.height;
    $this.free = false;

    $this.timer = Math2.randomInt(0, 100);
    $this.v = Math2.randomPlusMinus() * Math2.random(.5, 1);
    $this.hovered = false

    $this.alpha = Math2.randomInt(10, 100) / 100;

    $this.vy = -5 + parseInt(Math.random() * 10) / 2;
    $this.vx = -4 + parseInt(Math.random() * 8);

    $this.setPosition = function(x, y) {
        if ($this.text) {
            $this.x = x + (options.width / 2 - 180);
            $this.y = y + (options.height / 2 + 100);
        } else {
            $this.x = x + (options.width / 2 - 250);
            $this.y = y + (options.height / 2 - 175);
        }
    };

    return $this;

}


function update() {
        
    renderer.render(stage);
        

    for (i = 0; i < particles.length; i++) {
        var p = particles[i];

        if (mousePos.x > p.x && mousePos.x < p.x + p.size && mousePos.y > p.y && mousePos.y < p.y + p.size) {
            p.hovered = true;
        }

        p.scale.x = p.scale.y = scale = Math.max(Math.min(2.5 - (Math2.distance(p.x, p.y, mousePos.x, mousePos.y) / 160), 160), 1);


        p.x = p.x + .2 * Math.sin(p.timer * .15)
        p.y = p.y + .2 * Math.sin(p.timer * .15)
        p.timer = p.timer + p.v;

    }
  window.requestAnimationFrame(update);
}

init();

update()
</script>
</html>

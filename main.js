$(window).ready(function(){
	kitty_jump.playGame();
});

var kitty_jump = (function(){
	var CANVAS_WIDTH = 650;
	var CANVAS_HEIGHT = 500;
	var FPS = 60;
	var currentGameState = 100;
	var previousGameState;
	var gamestates = {};
	var frames = 0;
	var myTimer;
	var context;
	var score = 0;
	var kibble = [];
	var kibbles = [];
	var kibble_O = new Image();
	var kibble_X = new Image();
	var Okibble = true;
		var baseURL = "/wp-content/themes/3sol";
	var bgSound = new Audio(baseURL +'/sound/meowmix.mp3');
	var gameSound = new Audio(baseURL +'/sound/monkeyspinning.mp3');
	var soundFx = new Audio(baseURL + '/sound/catmeow.mp3');
	var gameDead = new Audio(baseURL + '/3sol/sound/catscream.mp3');
	var enemy = new Image();

	var enemies = [];
	var playerBullets = [];
	var player = {
		x:30,
		y:CANVAS_HEIGHT-100,
		width: 57,
		height: 53,
		lives: {
			count: 9,
			image : new Image()
		},
		image : new Image(),
		draw : function(){
			context.drawImage(player.image, this.x, this.y);
		},
		shoot : function() {

			//console.log('shooting');
			var bulletPosition = this.midpoint();
			playerBullets.push(Bullet({
				speed: 5,
				x: bulletPosition.x,
				y: bulletPosition.y
			}));
		},
		midpoint : function() {
			return {
				x: this.x + this.width/2,
				y: this.y + this.height/2
			};
		},
		explode : function(){
			player.lives.count--;
			if(player.lives.count == 0)currentGameState = 300;
			//console.log('I\'VE BEEN HIT');
		}
	};

	(function(){
		//console.log('PRELOAD');
		player.image.src = baseURL +"/images/kitty_eat.png";
		enemy.src = baseURL +"/images/candy_sm.png";
		player.lives.image.src = baseURL +"/images/life.png";
		kibble_O.src = baseURL +"/images/kibble_O.png";
		kibble_X.src = baseURL +"/images/kibble_X.png";
		//console.log('done');
	})();

	gamestates = {
		"0" : function(){
			if(previousGameState != currentGameState){
				previousGameState = currentGameState;
				$('#pause').addClass('visible');
				gameSound.pause();
			}

			if(keydown.o){
				currentGameState = 200;
				$('#pause').removeClass('visible');
			}
		},
		"100" : function(){
			if(previousGameState != currentGameState){
				previousGameState = currentGameState;
				$('#start').removeClass('invisible');
				//bgSound.play();

			}
		},
		"200" : function(){


			if(previousGameState != currentGameState){
				previousGameState = currentGameState;
				gameSound.play();
			}

			if(keydown.p) {
				currentGameState = 0;
			}
			if(keydown.space) {
				if(frames%5===0)player.shoot();
			}

			if(keydown.w) {
				player.y -= 5;
			}

			if(keydown.s) {
				player.y += 5;
			}

			

			playerBullets.forEach(function(bullet) {
				bullet.update();
			});

			playerBullets = playerBullets.filter(function(bullet) {
				return bullet.active;
			});

			enemies.forEach(function(enemy) {
				enemy.update();
			});

			enemies = enemies.filter(function(enemy) {
				return enemy.active;
			});

			kibbles.forEach(function(kibble) {
				kibble.update();
			});

			kibbles = kibbles.filter(function(kibble) {
				return kibble.active;
			});

			handleCollisions();

			if(Math.random() < 0.1) {
				enemies.push(Enemy());
			}
			if(Math.random() < 0.1) {
				Okibble = !Okibble;
				kibbles.push(Kibble({kibble:Okibble}));
			}

		},
		"300" : function(){
			if(previousGameState != currentGameState){
				previousGameState = currentGameState;
				gameSound.pause();
				gameDead.play();
				$('#game-over').addClass('visible');
			}
		}
	};

	function Bullet(I) {
		I.active = true;

		I.xVelocity = I.speed;
		I.yVelocity = 0;
		I.width = 8;
		I.height = 5;
		I.color = "#000";

		I.inBounds = function() {
			return I.x >= 0 && I.x <= CANVAS_WIDTH &&
			I.y >= 0 && I.y <= CANVAS_HEIGHT;
		};

		I.draw = function() {
			context.fillStyle = this.color;
			context.fillRect(this.x, this.y, this.width, this.height);
		};

		I.update = function() {
			I.x += I.xVelocity;
			I.y += I.yVelocity;

			I.active = I.active && I.inBounds();
		};

		I.explode = function() {
			this.active = false;
            // Extra Credit: Add an explosion graphic
        };

        return I;
    }


    function Kibble(I) {
    	I = I || {};
    	I.isKibble = I.kibble;
    	I.active = true;
    	I.age = Math.floor(Math.random() * 128);

    	I.color = "#A2B";

    	I.x = CANVAS_WIDTH;
    	I.y = (CANVAS_HEIGHT-50) - Math.random() * CANVAS_HEIGHT;
    	I.xVelocity = 3 + (Math.random() - .5);
    	I.yVelocity = 0;

    	I.width = 25;
    	I.height = 27;

    	I.inBounds = function() {
    		return I.x >= 0 && I.x <= CANVAS_WIDTH &&
    		I.y >= 0 && I.y <= CANVAS_HEIGHT;
    	};

    	//I.sprite = Sprite("candy_sm");

    	I.draw = function() {
    		//console.log('draw');
    		if(this.isKibble)context.drawImage(kibble_O, this.x, this.y);
    		else context.drawImage(kibble_X, this.x, this.y);
    	};

    	I.update = function() {
    		I.x -= I.xVelocity;
    		I.y += I.yVelocity;

    		//console.log("I X xVelocity" + I.xVelocity);
    		I.age++;

    		I.active = I.active && I.inBounds();
    	};

    	I.explode = function() {
    		//Sound.play("explosion");

    		this.active = false;
            // Extra Credit: Add an explosion graphic
        };
        
        return I;
    };

    function Enemy(I) {
    	I = I || {};

    	I.active = true;
    	I.age = Math.floor(Math.random() * 128);

    	I.color = "#A2B";

    	I.x = CANVAS_WIDTH;
    	I.y = (CANVAS_HEIGHT-50) - Math.random() * CANVAS_HEIGHT;
    	I.xVelocity = 4 + (Math.random() - .5);
    	I.yVelocity = 0;

    	I.width = 32;
    	I.height = 32;

    	I.inBounds = function() {
    		return I.x >= 0 && I.x <= CANVAS_WIDTH &&
    		I.y >= 0 && I.y <= CANVAS_HEIGHT;
    	};

    	//I.sprite = Sprite("candy_sm");

    	I.draw = function() {
    		//this.sprite.draw(context, this.x, this.y);
    		context.drawImage(enemy, this.x, this.y);
    	};

    	I.update = function() {
    		I.x -= I.xVelocity;
    		I.y += I.yVelocity;

    		I.age++;

    		I.active = I.active && I.inBounds();
    	};

    	I.explode = function() {
    		this.active = false;
    	};
    	
    	return I;
    };

    function collides(a, b) {
    	return a.x < b.x + b.width &&
    	a.x + a.width > b.x &&
    	a.y < b.y + b.height &&
    	a.y + a.height > b.y;
    }

    function handleCollisions() {
    	kibbles.forEach(function(kibble) {
    		if(collides(kibble, player)) {
    			soundFx.play();
    			score++;
    			kibble.active = false;
    			if(score%10===0 && player.lives.count < 9)player.lives.count++;
    		}
    	});
    	playerBullets.forEach(function(bullet) {
    		enemies.forEach(function(enemy) {
    			if(collides(bullet, enemy)) {
    				enemy.explode();
    				bullet.active = false;
    			}
    		});

    		kibbles.forEach(function(kibble){
    			if(collides(bullet,kibble)) {
    				kibble.active = false;
    				score--;
    				if(score< 0)
    				{
    					if(score*-1%10==0)player.lives.count--;
    				}
    			}
    		});
    	});

    	enemies.forEach(function(enemy) {
    		if(collides(enemy, player)) {
    			enemy.explode();
    			player.explode();
    		}
    	});
    	
    }

    function setup(){
    	var canvasElement = document.getElementById('game');
    	context = canvasElement.getContext('2d');
    	var div = document.getElementById('wrapper');
    	var pause = document.getElementById('pause');
    	var startScreen = document.getElementById('start');
    	var gameover = document.getElementById('game-over');
    	canvasElement.width = CANVAS_WIDTH;
    	canvasElement.height = CANVAS_HEIGHT;
    	gameover.setAttribute("style", "width:" + CANVAS_WIDTH + "px;height:" + CANVAS_HEIGHT + "px");
    	pause.setAttribute("style", "width:" + CANVAS_WIDTH + "px;height:" + CANVAS_HEIGHT + "px");
    	div.setAttribute("style", "width:" + CANVAS_WIDTH + "px;height:" + CANVAS_HEIGHT + "px");
    	startScreen.setAttribute("style", "width:" + CANVAS_WIDTH + "px;height:" + CANVAS_HEIGHT + "px");
    	$('#start').addClass('visibile');
    	
    	bgSound.volume = .80;
    	bgSound.addEventListener('ended', function() {
    		this.currentTime = 0;
    		this.play();
    	}, false);
    	bgSound.play();
    	soundFx.volume = .38;
    	gameDead.volume = .50;

    }
    function update(){
	//console.log(currentGameState  + " is current gamestate");
	gamestates[currentGameState + ""]();
	//console.log('bullets:');
	//console.log(playerBullets);
	
}
function draw(){
//	context.save();
//	context.setTransform(1,0,0,1,0,0);
context.clearRect(0,0,CANVAS_WIDTH, CANVAS_HEIGHT);
//	context.restore();

player.draw();
playerBullets.forEach(function(bullet) {
	bullet.draw();
});	
enemies.forEach(function(enemy) {
	enemy.draw();
});

kibbles.forEach(function(kibble) {
	kibble.draw();
});
for(var x = 0; x < player.lives.count; x++){
	context.drawImage(player.lives.image, 10+(x*30), (CANVAS_HEIGHT-30));
}

context.fillText("SCORE: " + score, CANVAS_WIDTH-100, CANVAS_HEIGHT-20);


}
function loop(){
	frames++;
		//console.log("are we getting here?");
		update();
		draw();
	}

	function init(){
		player.lives.count = 9;
		score = 0;
		enemies = [];
		kibbles = [];
		currentGameState = 200;
	}

	$('.start-game').on('click', function(event){
		if(currentGameState == 300)$('#game-over').removeClass('visible');
		event.preventDefault();
		currentGameState = 200;
		$('#start').addClass('invisible');
		bgSound.pause();
		init();
	});
	$('#main-menu').on('click', function(){
		event.preventDefault();
		currentGameState = 100;
		$('#start').removeClass('invisible');
		$('#game-over').removeClass('visible');
	});

	return {
		playGame : function playGame(){
			setup();
			myTimer = setInterval(function(){
				loop();
			}, 1000/FPS);
		}
	}


})();


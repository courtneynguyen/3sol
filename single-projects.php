
<?php get_header(); ?>
<header>
<div class="container sm-container">
	<h1 class="center-ltr" >Projects</h1>			
</div>
</header>
</div>
<div id="content" class="container sm-container">
<div id="wrapper">
<div id="start">
			<h1 class="txt-center">Kitty Jump!</h1>
			<div class="">
				<div class="">
					<h3>This is you:</h3>
					<img src="/wp-content/themes/3sol/images/kitty.png" />
					<p class="float-rt">
						You have 9 lives: <img src="/wp-content/themes/3sol/images/life.png" />x9
					</p>
				</div>
				<div class="">
					<div class="">
						<h3>Eat kibbles:</h3>
						<img src="/wp-content/themes/3sol/images/kibble_O_lg.png"/><img src="/wp-content/themes/3sol/images/kibble_X_lg.png"/>
						<p class="float-rt">
						AVOID hitting kibbles... You will lose points!
					</p>
					</div>
					<div class="">
						<h3>Do <span class="bold">NOT</span> eat candy:</h3>

						<img class="wd-100" src="/wp-content/themes/3sol/images/candy.png"/>
					</div>
				</div>
				<div class="">
					Press P to pause
				</div>
			</div>
			<input id="" type="submit" class="butt butt-good start-game center-blk" value="Play Game!"/>
		</div>

		<div id="game-over">
			<h1 class="txt-center">GAME OVER</h1>
			<a class="butt butt-good lt-butt start-game" href="#">Play again?</a><a id="main-menu" class="butt butt-exit rt-butt" href="#">Main Menu</a>
		</div>


		<div id="pause">
			<h1 class="txt-center">PAUSED</h1>
			<h3 class="txt-center">Press 'O' To Continue</h3></div>

			<audio loop="true"></audio>
			<canvas id="game"></canvas>
		</div>
		<script language="javascript" src="/wp-content/themes/3sol/js/jquery.min.js" type="text/javascript"></script>
		<script language="javascript" src="/wp-content/themes/3sol/js/jquery.hotkeys.js" type="text/javascript"></script>
		<script language="javascript" src="/wp-content/themes/3sol/js/key_status.js" type="text/javascript"></script>
		<script language="javascript" src="/wp-content/themes/3sol/js/util.js" type="text/javascript"></script>
		<script language="javascript" src="/wp-content/themes/3sol/js/sprite.js" type="text/javascript"></script>
		<!-- <script language="javascript" src="js/sound.js" ></script> -->
		<script language="javascript" type="text/javascript" src="/wp-content/themes/3sol/main.js"></script>
</div>
</div>
<?php get_footer(); ?>


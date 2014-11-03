<?php get_header(); ?>
	<header>
			<div class="container">
				<div id="title">
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
						<h1 id="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>
	<!--					<h2 id="tagline"><?php bloginfo('description'); ?></h2>-->
					<?php } else { ?>
						<h2 id="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
	<!--					<h3 id="tagline"><?php bloginfo('description'); ?></h3> -->
					<?php } ?>
				</div>
				<?php
					// Check to see if the header image has been removed
					$header_image = get_header_image();
					if ( ! empty( $header_image ) ) :
				?>
					<?php
						if ( is_singular() &&
								has_post_thumbnail( $post->ID ) && 
								( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) ) ) &&
								$image[1] >= HEADER_IMAGE_WIDTH ) : echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
			</div>
				<?php endif; // end check for featured image or standard header ?>
				<?php endif; // end check for removed header image ?>
				
				<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
		</header>
</div>

<div id="content" class="container sm-container content">
	<h3 class="no-btm no-tp">I am a lion tamer (with shoelace), but </h3>



	<svg width="100%" height="100%" viewBox="0 0 706 100" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink">
	<defs>
	<pattern id="img1" patternUnits="userSpaceOnUse" width="385" height="700">
	<image xlink:href="wp-content/themes/3sol/images/galaxy_ban@2x.jpg" x="-160" y="-160" width="1000" height="470"></image>
	</pattern>
	<!--        <pattern id="textPattern" x="7" y="7" width="10" height="10" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
	<rect x="5" y="5" width="5" height="5" fill= "#876fc1" />
	</pattern> -->
	</defs>
	<text x="0" y="60%" font-size="42" font-family="Roboto" font-weight="900" fill="url(#img1)">my passion is to code, quest, and cat.</text>
	</svg>
	<!-- <h1 class="no-tp hr txt-grad">my passion is to code, quest, and cat.</h1> -->
	<div class="main-content">
		<h4 class="hr">What do I do for a living?</h4> 
		<p class="">In a nutshell, I play in a digital sandbox every day. I invent interfaces the imagination only dreams of. I am a web engineer. What is my job? I tinker, create, design, refine, repeat. I wish to create beautiful user experiences that are transparent, friendly, and usable for the world.</p>
		<!--<div id="Parallax">

			<img src="/wp-content/themes/3sol/images/Bottom.png"/>
			<img src="/wp-content/themes/3sol/images/Top.png"/>
		</div> -->
	</div>
</div>

<?php get_footer(); ?>


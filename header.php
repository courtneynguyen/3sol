<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title(''); echo ' | '; bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(''); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/whiteboard_favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php wp_head(); ?> <?php /* this is used by many Wordpress features and for plugins to work proporly */ ?>
		<?php /* Remove the Less Framework CSS line to not include the CSS Reset, basic styles/positioning, and Less Framework itself */?>
		<!--	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/style.css" />-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/normalize.css" />
		<!-- <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/theme.css" /> -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	</head>

	<body <?php body_class(); ?>>
	<div class="page-wrapper">
		<header id="nav-primary">
			<nav class="span8 middle">
				<div class="logo span4">
					<?php if( is_front_page() || is_home() || is_404() ) { ?>
					<h2><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
					<h5 id="tagline"><?php bloginfo('description'); ?></h5>
					<?php } else { ?>
					<h2 id="logo"><a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h2>
										<h3 id="tagline"><?php bloginfo('description'); ?></h3> 
					<?php } ?>
				</div>
			<?php if  (is_front_page()): ?>
			<nav class="horizontal-nav span8">	
				<?php wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) ); /* if the visitor is logged in, this primary navigation will be displayed */ ?>
				<?php else: ?>
				<nav class="horizontal-nav span8">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); /* if the visitor is NOT logged in, this primary navigation will be displayed. if a single menu should be displayed for both conditions, set the same menues to be displayed under both conditions through the Wordpress backend */ ?>
				</nav>
			</nav>
			<?php endif; ?>	
			</nav>
			<div class="none">
				<p><a href="#content"><?php _e('Skip to Content'); ?></a></p><?php /* used for accessibility, particularly for screen reader applications */ ?>
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
<?php endif; // end check for featured image or standard header ?>
<?php endif; // end check for removed header image ?>

<?php if ( ! dynamic_sidebar( 'Header' ) ) : ?><!-- Wigitized Header --><?php endif ?>
	</header>

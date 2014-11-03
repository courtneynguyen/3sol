<?php get_header(); ?>
<header>
<div class="container">
	<h1><?php the_title(); ?></h1>			
</div>
</header>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
		<article>

		<?php edit_post_link('<small>Edit this entry</small>','',''); ?>
		<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>

		<div class="post-content page-content">
			<?php the_content(); ?>
			<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
		</div><!--.post-content .page-content -->
		</article>

		<div id="page-meta">
			<h3><?php _e('Written by '); the_author_posts_link() ?></h3>
			<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '80' ); } ?></p>
			<p><?php _e('Posted on '); the_time('F j, Y'); _e(' at '); the_time() ?></p>
		</div>
	</div>

	<?php comments_template( '', true ); ?>

	<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>



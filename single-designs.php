
<?php get_header(); ?>
<header>
<div class="container sm-container">
	<h1>Designs</h1>			
</div>
</header>
</div>
<div id="content" class="container sm-container">
<h2><?php the_title(); ?> </h2>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
		<article>

		<?php /* edit_post_link('<small>Edit this entry</small>','',''); */ ?>
	<?php /*if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ /* echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } */ ?>

		<div class="post-content page-content">
			<?php the_content(); ?>
			<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
		</div><!--.post-content .page-content -->
		</article>

	</div>


	<?php endwhile; ?>
</div>
<?php get_footer(); ?>


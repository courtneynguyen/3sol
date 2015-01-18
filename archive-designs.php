<?php get_header(); ?>
<div class="wrapper">
	<div id="content" class="span8 middle designs">
		<header>
			<h1 class="center-ltr">Designs</h1>			
		</header>
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($the_post->ID), 'thumbnail_size' );
		$url = $thumb['0']; ?>


		<article>
			<h5><?php the_title(); ?></h5>
			<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark" <?php echo "style=\"background-image:url('$url');\"" ?> class="index-thumbnail <?php echo $the_post->ID+'' ?>">
				<?php /*the_title(); */ ?>
				<?php /*if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ /*echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } */ ?>
			</a>
			<?php edit_post_link('Edit this entry','',''); ?>


		</article>


	<?php endwhile; /* end loop */ ?>

</div><!-- #post-## -->

</div><!--#content-->
<?php get_footer(); ?>

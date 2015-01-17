</div>
<!--.container-->
	<footer id="footer">
			<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?><!--Wigitized Footer--><?php endif ?>
				<nav class="horizontal-nav span6">
				<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); /* editable within the Wordpress backend */ ?>
				</nav>
		<div class="copyright span6">
			<p class="clear"><a href="#main"><?php _e('Top'); ?></a></p>
			<p><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow"><?php _e('Entries (RSS)'); ?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments (RSS)'); ?></a></p>
			<p>&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All Rights Reserved.'); ?></p>
		</div>
	</footer>
<!-- </div> -->
<?php /*echo get_template_directory();*/ ?>
<script src="http://localhost:35729/livereload.js"></script>
<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>

</body>
</html>

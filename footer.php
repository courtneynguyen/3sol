</div>
<!--.container-->
<div id="footer">
	<footer>
		<div class="container sm-container">
			<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?><!--Wigitized Footer--><?php endif ?>
			<div id="nav-footer" class="nav">
				<nav>
				<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); /* editable within the Wordpress backend */ ?>
				</nav>
			</div>
			<p class="clear"><a href="#main"><?php _e('Top'); ?></a></p>
			<p><a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow"><?php _e('Entries (RSS)'); ?></a> | <a href="<?php bloginfo('comments_rss2_url'); ?>" rel="nofollow"><?php _e('Comments (RSS)'); ?></a></p>
			<p>&copy; <?php echo date("Y") ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a>. <?php _e('All Rights Reserved.'); ?></p>
		</div>
	</footer>
</div>
<!-- </div> -->
<?php /*echo get_template_directory();*/ ?>
<script src="http://localhost:35729/livereload.js"></script>
<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>

</body>
</html>

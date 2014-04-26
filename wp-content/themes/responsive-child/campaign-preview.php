<?php
/**
 * The default template for displaying preview of a campaign
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
            <?php $current_post_id = get_the_ID(); ?>
            
            <img src="<?php print_custom_field('avatar:to_image_src'); ?>" /><br />
            
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->

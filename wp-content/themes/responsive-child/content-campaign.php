<?php
/**
 * The default template for displaying content of a campaign
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php
			the_content( __(  'Read more &#8250;', 'responsive' ) );
			?>
			<h2>Custom Fields</h2>
					<strong>Avatar:</strong> <img src="<?php print_custom_field('avatar:to_image_src'); ?>" /><br />
					<strong>Need</strong> <?php print_custom_field('need'); ?><br />
			
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->

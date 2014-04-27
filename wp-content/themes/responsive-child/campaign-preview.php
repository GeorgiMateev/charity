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
			
            <?php the_content( __(  'Read more &#8250;', 'responsive' ) );	?>		
            <?php echo get_custom_field('addresses')[0]; ?>
            
            <div class="post-data tags-wrapper">
		<span class="tag-icon"></span><?php the_tags( __( 'Тагове:', 'responsive' ) . ' ', ', ', '<br />' ); ?>
		<span class="cat-icon"></span><?php printf( __( 'Категория: %s', 'responsive' ), get_the_category_list( ', ' ) ); ?>
            </div>
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->

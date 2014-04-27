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
			
            <div class="camp-desc-wrap"><?php the_content( __(  'Read more &#8250;', 'responsive' ) );	?></div>
            
            
            <div class="post-data tags-wrapper">
                <div class="addresses-wrapper"><span class="addresses-icon"></span><?php echo reset(get_custom_field('addresses')); ?></div>
		<div class='cat-wrapper'><span class="cat-icon"></span><?php printf( __( 'Категория: %s', 'responsive' ), get_the_category_list( ', ' ) ); ?></div>
               <div class="end-date-wrapper"> <span class="end-date-icon"></span><?php echo get_custom_field('end_date'); ?></div>
            </div>
            
            
	</div><!-- .entry-content -->
	<?php endif; ?>
</article><!-- #post-## -->

<?php

/*
 * Displays a content of a donation item
 */
?>

<div>
	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
        
        <h1 class="entry-title post-title"><?php the_title(); ?></h1>
        
	<div class="entry-content">
           <div class='item-content'> <?php the_content( __(  'Read more &#8250;', 'responsive' ) );	?>
           </div>
            <img src="<?php print_custom_field('avatar:to_image_src'); ?>" /><br />
            <p><?php print_custom_field('description'); ?></p>
            <span>Needed items: </span><span><?php print_custom_field('total_amount'); ?></span>
            <span>Collected items: </span><span><?php print_custom_field('current_amount'); ?></span>
                        
	</div><!-- .entry-content -->
	<?php endif; ?>
</div><!-- #post-## -->
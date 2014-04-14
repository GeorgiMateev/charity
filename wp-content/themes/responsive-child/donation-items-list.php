<?php

/*
 * Used to display list of items that have been or needed to be donated.
 */
?>

<?php $donation_items_loop = new WP_Query( array( 'post_type' => 'donation-item', 'posts_per_page' => 100, 'parent' => get_the_ID() ) );?>

<?php if( $donation_items_loop->have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>

		<?php while( $donation_items_loop->have_posts() ) : $donation_items_loop->the_post(); ?>

			<?php responsive_entry_before(); ?>
			<div id="item-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php responsive_entry_top(); ?>

				<div class="post-entry">
					<?php if( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) ); ?>
						</a>
					<?php endif; ?>
					
                                        <?php get_template_part('content', 'donation-item' ); ?>
                                    
					<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
				</div>
				<!-- end of .post-entry -->

				<?php //get_template_part('post-data' ); ?>				

				<?php responsive_entry_bottom(); ?>
			</div><!-- end of #item-<?php the_ID(); ?> -->
			<?php responsive_entry_after(); ?>

		<?php
		endwhile;

		get_template_part( 'loop-nav' );

	else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
   Template Name: Campaigns   
 */

get_header(); ?>

<div id="content-archive" >

	<?php $loop = new WP_Query( array( 'post_type' => 'campaign', 'posts_per_page' => 100 ) );?>
	<?php if( $loop->have_posts() ) : ?>

		<?php get_template_part( 'loop-header' ); ?>
                
        <div class="sorting-wrapper">
            
            <span class='filter-title'>Филтрирай по:</span>

            <ul><div class="tags-wrapper aside-wrapper">      
                <li><a href="#">

                 <div class="addresses-wrapper"><span class="addresses-icon"></span>място</div></a></li>
                
                <li><a href="#">
                    <div class="end-date-wrapper"> <span class="end-date-icon"></span>
                  срок</div></a></li>
                <li>
                    <a href="#">   <div class='cat-wrapper'><span class="cat-icon"></span> категория</div></a>
                    <?php the_widget( 'WP_Widget_Categories', 'title= ' ); ?> 
                </li>
            </ul>
        </div>
                
 
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

		<?php get_template_part( 'campaigns-loop-content' ); ?>
    
        <?php
		endwhile;

		get_template_part( 'loop-nav' );

                else :

		get_template_part( 'loop-no-posts' );

	endif;
	?>

</div><!-- end of #content-archive -->


<?php get_footer(); ?>

<?php
/*

Template Name: New donation

*/


// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<div id="content" class="<?php echo implode( ' ', responsive_get_content_classes() ); ?>">

    <?php get_template_part( 'loop-header' ); ?>
    
    <?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <?php echo $_POST["donation_item"]; ?>
        <?php echo $_POST["donation_items_count"]; ?>
    
        
    <?php else: ?>
        <form action="" method="POST">
            <?php $campaign_id = $_GET["campaign"];
                $donation_items_loop = new WP_Query( array( 'post_type' => 'donation-item',
                                                      'posts_per_page' => 100,
                                                      'meta_key' => 'parent',
                                                      'meta_value' => $campaign_id ) );?>
            
            <?php if( $donation_items_loop->have_posts() ) : ?>
                <input type="text"/>
                <h3>Изберете какво ще дарите</h3>
                <ul>
                    <?php while( $donation_items_loop->have_posts() ) : $donation_items_loop->the_post(); ?>
                        <li>
                            <span><?php the_title(); ?></span>
                            <input class="select-donation-item" id="donate-<?php the_ID(); ?>" type="checkbox" />

                            <div class="donation-item-wrapper" id="donation-item-wrapper-<?php the_ID(); ?>" style="display: none">
                                <label>Количество </label><input name="amount-item-<?php the_ID(); ?>" type="number"><br />
                                <label>Описание </label><textarea name="description-item-<?php the_ID(); ?>"></textarea>
                            </div>
                        </li>
                    <?php 
                        endwhile;
                        wp_reset_postdata();?>
                </ul>
                <input type="submit" value="Дари!">
            <?php else :
                    get_template_part( 'loop-no-posts' );
                endif;
                ?>
        </form>
    <?php endif; ?>
	

</div><!-- end of #content -->

<?php add_new_donation_script(); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

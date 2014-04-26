<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="campaigns/donation/" method="POST">
    <?php $campaign_id = $_GET["p"];
        $donation_items_loop = new WP_Query( array( 'post_type' => 'donation-item',
                                              'posts_per_page' => 100,
                                              'meta_key' => 'parent',
                                              'meta_value' => $campaign_id ) );?>

    <?php if( $donation_items_loop->have_posts() ) : ?>
        <ul>
            <?php while( $donation_items_loop->have_posts() ) : $donation_items_loop->the_post(); ?>
                <li>
                    <span><?php the_title(); ?></span>
                    <span><?php the_content( __(  'Read more &#8250;', 'responsive' ) ); ?></span>

                    <span>Needed items: </span><span><?php print_custom_field('total_amount'); ?></span>
                    <span>Collected items: </span><span><?php print_custom_field('current_amount'); ?></span>

                    <input class="select-donation-item" id="donate-<?php the_ID(); ?>" type="checkbox" />

                    <div class="donation-item-wrapper" id="donation-item-wrapper-<?php the_ID(); ?>" style="display: none">
                        <label>Количество </label><input name="amount-item-<?php the_ID(); ?>" type="number"><br />
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

<?php add_new_donation_script(); ?>

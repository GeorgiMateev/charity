<?php
/**
 * The default template for displaying content of a campaign
 */
?>

<?php 
if(isset($_POST)) { 
    $c_id = get_the_ID();
    $donation_items = get_posts( array( 'post_type' => 'donation-item',
                                              'meta_key' => 'parent',
                                              'meta_value' => $c_id ) );
    foreach ($donation_items as $value) {
        $old_amount = get_post_meta($value->ID, "current_amount", TRUE);
        $new_amount = $old_amount + 1;
        $result  = update_post_meta($value->ID, "current_amount", $new_amount, $old_amount);
    }
} 
?>
<div class='desc-wrapper'>
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
            
            <h4>Има нужда от:</h4>
            <?php get_template_part("donation-items-form"); ?>
            
            
	</div><!-- .entry-content -->
	<?php endif; ?>
</article>
</div><!-- #post-## -->

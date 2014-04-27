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
            
            <?php $current_user_id = get_current_user_id();
                if($current_user_id == $post->post_author):
            ?>
                <p>Въведи код от дарение:</p>
                <form action="" method="post">
                    <input type="text" class="enter-code" />
                    <input type="submit" class="enter-code-button" value="Въведи"/>
                </form>
            <?php endif; ?>
            
            <h4>Има нужда от:</h4>
            <?php get_template_part("donation-items-form"); ?>
            
            <div class="post-data tags-wrapper">
		<span class="tag-icon"></span><?php the_tags( __( 'Тагове:', 'responsive' ) . ' ', ', ' ); ?>
		<span class="cat-icon"></span><?php printf( __( 'Категория: %s', 'responsive' ), get_the_category_list( ', ' ) ); ?>
            </div>
	</div><!-- .entry-content -->
	<?php endif; ?>
        
        <script type="text/javascript">
            jQuery("asfasfasfasfsaf").click(function(){
                
            debugger;                  
                    var $ = jQuery;
                    
                    var items = $(".donation-item-hidden-id");
                    var siteId = <?php global $blog_id; echo $blog_id; ?>;                    
                    
                    for (i = 0; i < items.length; i++) {
                        var id= $(items[i]).val();
                        var url = "<?php echo site_url(); ?>/sites/"+ siteId +"/posts/" + id;
                        var oldValue = $("current-amount-"+id).text();
                        
                        if(oldValue) oldValue = parseInt(oldValue)
                        else oldValue = 0;
                        
                        var newValue = oldValue + 1;
                        
                        $.ajax({
                            url: url,
                            data: {
                                metadata: [{key: "current_amount", value: newValue}]
                            },
                            success: function(){
                                alert("Обновихме вашата кампания.");
                            },
                            error: function(){
                              alert("error");  
                            }
                        });
                    }
                });
        </script>
</article>
</div><!-- #post-## -->
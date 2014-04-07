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
            <div id="donation-item">
            <label>Какво ще дарите?</label><br/>
            <input name="donation_item" type="text" /><br/>

            <label>Колко?</label><br/>
            <input name="donation_items_count" type="number" /><br/>

            <input type="submit" />
            </div
        </form>
    <?php endif; ?>
	

</div><!-- end of #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php

/* Template Name: Donation
 * 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php get_header(); ?>

<?php
    $campaign_id = $_POST["campaign_id"];
    
    global $post;
    $post = get_post($campaign_id);
?>

<h1>Благодарим ви, че помагате!</h1>

<?php
    function generatePassword($length = 8) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $count = mb_strlen($chars);

        for ($i = 0, $result = ''; $i < $length; $i++) {
            $index = rand(0, $count - 1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
?>

<h2><?php echo generatePassword(); ?></h2>

<!-- <img src="<?php echo site_url(); ?>/wp-content/uploads/2014/04/qrcode.jpg" />  -->

<p>Изпратете този код заедно с доставката, за да сме сигурни, че даренето е получено.</p>

<p>Може да изпратите вашето дарение на някой от посочените адреси:</p>

<ul>
    <?php foreach(get_custom_field("addresses") as $value){ 
        echo "<li>";        
            echo "<p>$value</p>";
        echo "</li>";
    } ?>
</ul>

<?php echo $_POST["donation_item"]; ?>
<?php echo $_POST["donation_items_count"]; ?>

<?php if(get_custom_field("home_visit")): ?>
    <div>
        <p>Желаете ли да дойдем и да вземем дарението от Вашия дом?</p>
        <span>Да!</span><input id="home-visit" type="checkbox"/>
        <div id="donator-contacts" style="display: none">
            <p>Телефон:</p>
            <input type="text" />
            
            <p>Три имена</p>
            <input type="text" />
            
            <p>Вашият адрес</p>
            <textarea></textarea><br />
            
            <input type="submit" />
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    (function($){
        $(function(){
            $("#home-visit").change(function(){
               $("#donator-contacts").toggle();
            });
    });
    }(jQuery));   
    
</script>

<?php get_footer(); ?>


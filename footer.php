<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dudca_Agency_Test
 */

?>

    <footer>
        <div class="content-wrap">
            <div class="footer-text">Ukraine 2000-2015</div>
            <div class="footer-soc">
                <a class="dib" href="#"><img src="<?php echo get_template_directory_uri();?>/img/fb.svg" alt="soc-icon"></a>
                <a class="dib" href="#"><img src="<?php echo get_template_directory_uri();?>/img/tw.svg" alt="soc-icon"></a>
                <a class="dib" href="#"><img src="<?php echo get_template_directory_uri();?>/img/ln.svg" alt="soc-icon"></a>
            </div>
        </div>
    </footer>
</div><!--site-wrap-->
<?php wp_footer(); ?>

</body>
</html>

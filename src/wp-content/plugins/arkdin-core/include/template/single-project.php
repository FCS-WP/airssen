<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tscore
 */

get_header();

?>

<!-- portfolio-details-area -->
<section class="portfolio-details-area">
    <div class="container">
        <?php
            if( have_posts() ):
            while( have_posts() ): the_post();
        ?>
            <div class="cs-portfolio_content">
                <?php the_content(); ?>
            </div>
        
        <?php
            endwhile; wp_reset_query();
        endif;
        ?>
    </div>
    <div class="cs_height_150 cs_height_lg_80"></div>
</section>

<?php get_footer();  ?>
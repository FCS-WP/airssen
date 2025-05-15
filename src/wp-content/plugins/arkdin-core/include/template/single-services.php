<?php
/**
 * The main template file
 *
 * @package  WordPress
 * @subpackage  tscore
 */
get_header();

$post_column = is_active_sidebar( 'services-sidebar' ) ? 8 : 8;
$post_column_center = is_active_sidebar( 'services-sidebar' ) ? '' : 'justify-content-center';

?>

<!-- services-details-area -->
<section class="services-details-area">
    <div class="cs-height_150 cs-height_lg_80"></div>
        <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <div class="services-details-wrap">
            <div class="services-details-content">
                <?php the_content(); ?>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); endif; ?>
    <div class="cs-height_150 cs-height_lg_80"></div>
</section>
<!-- services-details-area-end -->

<?php get_footer();  ?>
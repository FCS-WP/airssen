<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arkdin
 */
?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head();?>
</head>

<body <?php body_class();?>>

    <?php wp_body_open();?>

    <?php
        $arkdin_preloader_image = "/wp-content/uploads/2025/05/preloader_icon.webp";
        $arkdin_preloader = get_theme_mod( 'arkdin_preloader', false );
    ?>

    <?php if ( !empty( $arkdin_preloader ) ): ?>
    <!-- Start Preloader -->
    <div class="cs_preloader cs_accent_color">
      <div class="cs_preloader_in">
        <img src="<?php print esc_url( $arkdin_preloader_image );?>" alt="<?php print esc_attr__( 'Icon', 'arkdin' );?>">
      </div>
    </div>
    <!-- End Preloader -->
    <?php endif;?>

    <?php do_action( 'arkdin_header_style' );?>

    <!-- main-area -->
    <main class="main-area">

        <?php do_action( 'arkdin_before_main_content' ); ?>
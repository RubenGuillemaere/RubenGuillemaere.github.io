<?php
?>

<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">

        <?php
        if ( ! function_exists( '_wp_render_title_tag' ) ) {
            function theme_slug_render_title() {
        ?>
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <?php
            }
            add_action( 'wp_head', 'theme_slug_render_title' );
        }
        ?>

        <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <div id="header">
            <?php
            if ( function_exists( 'the_custom_logo' ) ) {
                the_custom_logo();
            }
            wp_nav_menu( array( 'theme_location' => 'primary' ) );
            ?>
        </div>
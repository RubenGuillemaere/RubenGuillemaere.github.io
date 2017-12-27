<?php
get_header();
?>

<div id="main">
<?php 


if(have_posts())
{
    while(have_posts())
    {
        the_post();
        echo '<a href=' . get_permalink() . '>';
        the_title('<h2>','</h2>');
        echo '</a>';
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        if (has_post_format('image')) {
            the_excerpt();
        } else {
            the_content();
        }

        wp_tag_cloud();
if(is_home())
{
    echo '<h3>';
        the_time();
        echo '</h3>';
}


        
 ?>       
        <h4><?php the_author(); ?></h4>
<?php

    }
}
else
{
    echo 'No content available';
}
?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
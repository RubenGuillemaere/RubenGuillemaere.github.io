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
        
        the_title('<h2>','</h2>');
        the_content();
        echo '<h3>';
        the_time();
        echo '</h3>';
        
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
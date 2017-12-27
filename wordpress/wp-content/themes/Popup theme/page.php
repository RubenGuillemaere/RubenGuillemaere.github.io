<?php
get_header();
?>

<div id="main">
    <div class="container">
        <?php
            if(have_posts())
            {
                while(have_posts())
                {
                    echo '<div class="blogpost">';           
                    the_post();
                    //Print the title and the content of the current post
                    the_title('<h2 class="blogtitel">', '</h2>');
                    the_content();
                    echo '</div><hr>';
                }
            }
            else
            {
                echo 'No content available';
            }
        ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
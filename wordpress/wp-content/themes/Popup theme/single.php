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
        } else
        {
            echo 'No content available';
        }
    ?>
    <?php echo get_post_meta(get_the_ID(), 'Product', true); ?>
		<?php
			$image = get_field('image');
			$link = get_field('link', $image['ID']);
        ?>
        <a href="<?php echo $link; ?>">
            <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
        </a>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
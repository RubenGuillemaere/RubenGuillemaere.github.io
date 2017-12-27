<?php
get_header();
?>

<img class="eyecatcher" src="<?php bloginfo('template_url'); ?>/background.png" />
<div id="main">
    <div class="container">
        <h1><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></h1>
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
                    echo '<small>Created at: ';
                        the_date('F j, Y');
                        echo ' at ';
                        the_time('g:i a');
                    echo '<br>Author: ';
                        the_author();
                    echo '</small>';
                    echo '</div><hr>';
                }
            }
            else
            {
                echo 'No content available';
            }
            
        ?>

        <?php

			$args = array(
			    'posts_per_page' => 3,
			    'post_type' => 'product',
			    'tax_query' => array(
			        array(
			            'taxonomy' => 'product_category',
			            'field' => 'slug',
			            'terms' => 'alcoholvrij'
			        )
			    )
			);
			$myposts = get_posts( $args );

			foreach($myposts as $post) {
                echo get_post_meta(get_the_ID(), 'product', true);
                $image = get_field('image');
                $link = get_field('link', $image['ID']);
                // $size = "medium"; // (thumbnail, medium, large, full or custom size)
                // $image = wp_get_attachment_image_src( $attachment_id, $size );
            setup_postdata($post);
            echo the_title('<h1>', '</h1>');
                ?>
                <a href="<?php echo $link; ?>">
                    <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
        <?php
        }

        ?>

    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
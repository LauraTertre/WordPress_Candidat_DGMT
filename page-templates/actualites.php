
<?php
/*
Template Name: Actualités
*/
?>
<?php get_header(); ?>

<main class="news">
    <h2><?php the_title(); ?></h2>

    <?php
        $args = array( 'post_type' => 'post' );
        $the_query = new WP_Query( $args );
        // The Loop
        if ( $the_query->have_posts() ) {

            while ( $the_query->have_posts() ) {
                $the_query->the_post();
    ?>
                <article class="news-article">
                    <?php the_post_thumbnail('single_thumbnail',array('class' => 'single_thumbnail')); ?>
                    <div>
                        <h3 class="news-title"> <?php the_title(); ?></h3>
                        <p class="news-content"> <?php the_content(); ?></p>
                        <a class="learn-more" href="<?php the_permalink();?>"> Lire Plus </a>
                    </div>
                </article>
                <?php
            }
            /* Restore original Post Data */
            wp_reset_postdata();
        } else {
            // no posts found
        }
        ?>

</main>

<?php get_footer(); ?>
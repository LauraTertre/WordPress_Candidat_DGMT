<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<main>
    <?php
        // boucle WordPress
        if (have_posts()) {
            while (have_posts()) {
                the_post();
    ?>
                <section class="candidate">
                    <img class="candidate-face" src="<?php echo IMAGES_URL.'sources/images/back.jpg';?>" alt="image">
                    <div>
                        <h2><?php the_title(); ?></h2>
                        <p> <?php the_content(); ?></p>
                        <a class="learn-more" href="<?php the_permalink(); ?>">En lire plus</a>
                    </div>
                </section>

                <section class="propositions">
                    <h2><?php the_title(); ?></h2>
                    <div class="tags">
                        <a href="<?php the_permalink(); ?>">
                            <div>
                                <img src="<?php echo IMAGES_URL.'/sources/images';?>" alt="image">
                                <h3><?php the_title(); ?> </h3>
                            </div>
                        </a>
                    </div>
                </section>

                <section class="team">
                    <a href="<?php the_permalink(); ?>#"><h2><?php the_title(); ?></h2></a>
                    <p><?php the_content(); ?> </p>
                    <article class="team-member">
                        <img class="team-member-face" src="<?php echo IMAGES_URL.'/sources/images';?>" alt="image">
                        <div>
                            <h3 class="team-member-name"><?php the_title(); ?></h3>
                        </div>
                    </article>
                </section>

                <section class="news">
                    <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?>Les dernières nouvelles...</h2></a>
                    <article class="news-article">
                        <img class="news-thumbnail" src="<?php echo IMAGES_URL.'/sources/images';?>" alt="image">
                        <div>
                            <h3 class="news-title"> <?php the_title(); ?> </h3>
                            <p class="news-content"> <?php the_content(); ?> </p>
                            <a class="learn-more" href="<?php the_permalink(); ?>"> Lire Plus </a>
                        </div>
                    </article>
                </section>
        <?php
            }
        }
        else {
        ?>
            Nous n'avons pas trouvé d'article répondant à votre recherche
        <?php
        }
        ?>
        <?php
    $args = array( 'post_type' => 'equipe' );

    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {

        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            if(has_post_thumbnail())
            {
            the_post_thumbnail( 'single_thumbnail');
            }
            ?>

            <h2><?php the_title(); ?></h2>
            <?php 
            echo '<h1>' . get_the_content() . '</h1>';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
    } else {
        // no posts found
    }

    ?>

</main>
<?php get_footer(); ?>
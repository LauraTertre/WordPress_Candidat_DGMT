<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<main class="homepage">
    <div class="hero" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>')">
        <h1>Adrien Demaegdt, <br> une nouvelle vision de Paris</h1>
    </div>
<?php
    // boucle WordPress
    if (have_posts()){
        while (have_posts()){
            the_post();
?>
        <section class="team">
            <h2>Notre équipe</h2>
            <section class="team-container">
                
        <?php
            $args = array( 'post_type' => 'equipe' );
            $the_query = new WP_Query( $args );
            // The Loop
            if ( $the_query->have_posts() ) {

                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
        ?>
                    <article class="team-member">
                        <div class="team-member-content">
                            <?php the_post_thumbnail('single_thumbnail',array('class' => 'team-member-face')); ?>
                            <h3 class="team-member-name"><?php the_title(); ?></h3>
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
            </section>
        </section>

        <section class="propositions">
            <h2>Nos propositions</h2>
            <div class="logo-container">
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/006-landscape.svg'; ?>" alt="ecologie"><p>Ecologie</p></div>
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/003-policeman.svg'; ?>" alt="securite"><p>Sécurité</p></div>
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/002-building.svg'; ?>" alt="logement"><p>Logement</p></div>
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/001-bus.svg'; ?>" alt="transport"><p>Transport</p></div>
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/004-movie-film.svg'; ?>" alt="culture"><p>Culture</p></div>
                <div class="logo"><img src="<?php echo get_template_directory_uri() . '../sources/images/icons/005-law.svg'; ?>" alt="service public"><p>Service public</p></div>
            </div>

            <a class="link-to-propositions" href="<?php echo get_permalink(94);?>">Découvrir toutes les propositions</a>

        </section>

        <section class="news">
            <h2>Nos actualités</h2>

            <?php
                $args = array( 'post_type' => 'post', 'posts_per_page' => 2 );
                $the_query = new WP_Query( $args );
                // The Loop
                if ( $the_query->have_posts() ) {

                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        // if(has_post_thumbnail())
                        // {
                        //   the_post_thumbnail( 'single_thumbnail');
                        // }
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


</main>
<?php get_footer(); ?>
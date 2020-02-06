<?php
/*
Template Name: Candidat
*/
?>
<?php get_header(); ?>

<main role="main" class="probootstrap-main js-probootstrap-main">
    <div class="hero" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>')">
        <h1>Adrien Demaegdt, <br> une nouvelle vision de Paris</h1>
    </div>

    <?php
    // boucle WordPress
        if (have_posts()) {
            while (have_posts()) {
                the_post();
    ?>
                <section class="candidate-info">
                <h3><?php the_title(); ?></h3>
                <p class="content">
                    <?php the_content(); ?>
                </p>
                </section>
            <?php
            }
        }
            ?>

</main>

<?php get_footer(); ?>
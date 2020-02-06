
<?php
/*
Template Name: Propositions
*/
?>
<?php get_header(); ?>

<main class="propositions">
    <div class="hero" style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID,'full'); ?>')">
        <h1>Adrien Demaegdt, <br> une nouvelle vision de Paris</h1>
    </div>

    <h2><?php the_title(); ?></h2>

<?php 
    $terms = get_terms( 'genre', 'orderby=count&hide_empty=0' );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    echo '<ul>';
    foreach ( $terms as $term ) {
        echo '<li><a href="'.get_permalink(73).'?genre='.$term->slug.'" >' . $term->name . '</a></li>';
    }
    echo '</ul>';
   }
?>

<!-- Gestion dynamique du display des thématiques en un menu -->
<div class="tags">
<?php 
$args=array(
    'public'   => true,
    '_builtin' => false
);
$output = 'names'; // or objects
$operator = 'and';
$taxonomies=get_taxonomies($args,$output,$operator); 
if  ($taxonomies) {
    foreach ($taxonomies  as $taxonomy ) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);
            foreach ( $terms as $term) {
?>
            <a href="#" class="<?php echo $term->slug; ?>" ><?php echo $term->name; ?></a>
       <?php 
            }
    }
}
        ?>
</div>
    <?php
// The Query
$the_query = new WP_Query( array( 'post_type'=>'propositions') );

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts()){
        $the_query->the_post();
?>
<?php
// recuperation des thématiques, ajout dans un
$catList = array();
    // a utiliser dans la boucle WordPress ou ds la WP_QUERY
    $terms = get_the_terms(get_the_id(), 'thematique');
    $count = count( $terms );
    if ( $count > 0 ) {
        foreach ( $terms as $term ) {
            $cat = $term->slug;
            array_push($catList,$cat);
            
        }
    }
?>
        <article class="news-article <?php foreach($catList as $cat){ echo $cat . ' '; } ?>" >
            <div class="proposition">
                <?php the_post_thumbnail('single_thumbnail',array('class' => 'news-thumbanil')); ?>
                <h3 class="proposition-title"> <?php the_title(); ?> </h3>
                <p class="proposition-content"> <?php the_content(); ?></p>
                <a class="learn-more" href="<?php the_permalink();?>"> Lire Plus </a>
            </div>
        </article>
<?php
    }
    /* Restore original Post Data */
    wp_reset_postdata();
    }
 else {
    // no posts found
};

?>

</main>

<?php get_footer(); ?>
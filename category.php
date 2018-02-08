<?php get_header(); ?>
<?php
$posts_array =  convert_posts_to_strings();
$current_cat = get_category( get_query_var( 'cat' ) );
$title = "<h1><strong><em>Nos articles</em></strong> sur <strong><em>l'art, les expos, la danse, le cinéma, la littérature</em></strong> et <strong><em>le théâtre</em></strong> à <strong><em>Genève</em></strong> et <strong><em>ailleurs</em></strong></h1>";
$show_artist_of_month = true;

$category_id = $current_cat->cat_ID;
if ($current_cat->parent > 0) {
    $parent_cat = get_category( $current_cat->parent );
    $phrase =  get_field('phrase', $parent_cat);

    if ($parent_cat->slug == 'art-et-culture') $show_artist_of_month = true;
} else {
    $phrase =  get_field('phrase', $current_cat);
    if ($current_cat->slug == 'art-et-culture') $show_artist_of_month = true;
}

if ( $phrase  && trim($phrase) !== '' ) {
    $title = $phrase;
}




?>


<div class="container">

    <?php echo $title; ?>
    <?php get_template_part('partials/categories-list'); ?>

</div><!--  END OF CONTAINER -->


<div class="container">
    <?php get_template_part('partials/index', 'first-articles');  // also includes artist of the month  ?>
</div><!--  END OF CONTAINER -->

<?php  // get_template_part('partials/index', 'agenda');   ?>


<div class="container">
    <?php get_template_part('partials/index', 'more-articles');   ?>
    <?php get_template_part('pagination'); ?>
</div><!--  END OF CONTAINER -->




<?php get_footer(); ?>

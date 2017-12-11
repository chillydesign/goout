<?php get_header(); ?>
<?php // $posts_array =  convert_events_to_strings();  ?>




<div class="container">

    <h1 class="fancy_title"> <span style="display:none"><?php single_cat_title(); ?></span>  Notre selection de <strong><em>Cool Things</em></strong> rien que pour les <strong><em>cool cats</em></strong>.</h1>
    <?php get_template_part('partials/categories-coolthings'); ?>
    <?php get_template_part('partials/archive-coolthings'); ?>
    <?php get_template_part('pagination'); ?>


</div><!--  END OF CONTAINER -->



    <?php // get_template_part('partials/events', 'index'); ?>



<?php get_footer(); ?>

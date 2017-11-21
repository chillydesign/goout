<?php get_header(); ?>





<div class="container">

    <h1><?php single_cat_title(); ?></h1>
    <?php get_template_part('partials/categories-hotspots'); ?>
    <?php get_template_part('partials/archive-hotspots'); ?>
    <?php get_template_part('pagination'); ?>



</div><!--  END OF CONTAINER -->


<?php get_footer(); ?>

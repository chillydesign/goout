<?php get_header(); ?>
<?php  $posts_array =  convert_events_to_strings();  ?>




<div class="container">

    <h1><?php single_cat_title(); ?></h1>
    <?php get_template_part('partials/categories-list-events'); ?>

</div><!--  END OF CONTAINER -->



    <?php get_template_part('partials/events', 'index'); ?>



<?php get_footer(); ?>

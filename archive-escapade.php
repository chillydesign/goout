
<?php get_header(); ?>
<?php // $posts_array =  convert_events_to_strings();  ?>




<div class="container">

    <h1>Escapades</h1>
    <?php get_template_part('partials/cooltrips-list'); ?>


    <?php get_template_part('loop'); ?>
    <?php get_template_part('pagination'); ?>

</div><!--  END OF CONTAINER -->



<?php // get_template_part('partials/events', 'index'); ?>



<?php get_footer(); ?>

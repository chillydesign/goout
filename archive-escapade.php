
<?php get_header(); ?>
<?php // $posts_array =  convert_events_to_strings();  ?>




<div class="container">

    <h1 class="fancy_title">Envie de <em><strong>déployer vos ailes</strong></em>? On vous dévoile tous les <em><strong>bons plans</strong></em> du <em><strong>Globe</strong></em>.</h1>
    <?php get_template_part('partials/cooltrips-list'); ?>


    <?php get_template_part('loop'); ?>
    <?php get_template_part('pagination'); ?>

</div><!--  END OF CONTAINER -->



<?php // get_template_part('partials/events', 'index'); ?>



<?php get_footer(); ?>

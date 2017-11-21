<?php get_header(); ?>


<div class="container">

    <h1>City Guides</h1>
    <?php get_template_part('partials/cooltrips-list'); ?>


    <?php get_template_part('loop'); ?>
    <?php get_template_part('pagination'); ?>

</div><!--  END OF CONTAINER -->




<?php get_footer(); ?>

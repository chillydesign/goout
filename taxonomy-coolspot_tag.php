<?php get_header(); ?>





<div class="container">

    <h1 class="fancy_title"><strong><em><?php single_tag_title() ?></em></strong></h1>
    <?php // get_template_part('partials/categories-coolspots'); ?>
    <?php get_template_part('partials/archive-coolspots'); ?>
    <?php get_template_part('pagination'); ?>



</div><!--  END OF CONTAINER -->


<?php get_footer(); ?>

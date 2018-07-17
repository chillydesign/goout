<?php get_header(); ?>

<div class="container">


    <h1 class="fancy_title">Il n'y a pas que <strong><em>l'horloge fleurie</em></strong> à Genève, il y a auusi les <strong><em>Hot Spots</em></strong> de <strong><em>Go Out!</em></strong>.</h1>
    <?php get_template_part('partials/categories-hotspots'); ?>
    <?php get_template_part('partials/archive-hotspots'); ?>
    <?php get_template_part('pagination'); ?>

</div><!--  END OF CONTAINER -->



<?php get_footer(); ?>

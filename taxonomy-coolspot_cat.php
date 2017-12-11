<?php get_header(); ?>





<div class="container">

    <h1 class="fancy_title"> <span style="display:none"><?php single_cat_title(); ?></span>   Il n'y a pas que <strong><em>l'horloge fleurie</em></strong> à Genève, il y a auusi les <strong><em>Cool Spots</em></strong> de <strong><em>Go Out!</em></strong>.</h1>
    <?php get_template_part('partials/categories-coolspots'); ?>
    <?php get_template_part('partials/archive-coolspots'); ?>
    <?php get_template_part('pagination'); ?>



</div><!--  END OF CONTAINER -->


<?php get_footer(); ?>

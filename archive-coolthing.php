<?php get_header(); ?>




<div class="container">


    <h1 class="fancy_title">Notre sélection de <strong><em>Cool Things</em></strong> rien que pour les <strong><em>Cool Cats</em></strong>.</h1>
    <?php get_template_part('partials/categories-coolthings'); ?>
    <?php get_template_part('partials/archive-coolthings'); ?>
    <?php get_template_part('pagination'); ?>

</div><!--  END OF CONTAINER -->



<?php get_footer(); ?>

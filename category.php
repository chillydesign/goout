<?php get_header(); ?>
<?php  $posts_array =  convert_posts_to_strings();  ?>




<div class="container">

    <h1><?php single_cat_title(); ?></h1>
    <?php get_template_part('partials/categories-list'); ?>

</div><!--  END OF CONTAINER -->


<div class="container">
    <?php get_template_part('partials/index', 'first-articles');  // also includes artist of the month  ?>
</div><!--  END OF CONTAINER -->

<?php get_template_part('partials/index', 'agenda');   ?>


<div class="container">
    <?php get_template_part('partials/index', 'more-articles');   ?>
    <?php get_template_part('pagination'); ?>
</div><!--  END OF CONTAINER -->




<?php get_footer(); ?>

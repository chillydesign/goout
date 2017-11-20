<?php /* Template Name: Accueil */ get_header(); ?>


<?php $adverts = get_posts(array(
    'post_type' => 'publicite',
    'posts_per_page' =>  2
)); ?>


<?php get_template_part('partials/front', 'first-articles' ); ?>
<?php get_template_part('partials/front', 'latest-articles' ); ?>
<?php get_template_part('partials/front', 'on-en-parle' ); ?>
<?php get_template_part('partials/front', 'focus' ); ?>
<?php get_template_part('partials/front', 'latest-edition' ); ?>
<?php get_template_part('partials/front', 'on-air' ); ?>
<?php get_template_part('partials/front', 'agenda' ); ?>
<?php if (sizeof($adverts) > 0 ) show_advert($adverts[0]); ?>
<?php get_template_part('partials/front', 'hot-spots' ); ?>
<?php if (sizeof($adverts) > 1 ) show_advert($adverts[1]); ?>
<?php get_template_part('partials/front', 'coolthings' ); ?>
<?php get_template_part('partials/front', 'partners' ); ?>
<?php get_template_part('partials/front', 'instagram' ); ?>





<?php get_footer(); ?>

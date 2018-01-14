<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php $post_id = get_the_ID(); ?>


        <header class="coolspot_header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </header>




        <?php get_template_part('section-loop'); ?>

        <div class="container">
            <?php get_template_part('partials/sharing-buttons'); ?>
        </div>




    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <article class="container">
        <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>
    </article>


<?php endif; ?>




<?php get_footer(); ?>

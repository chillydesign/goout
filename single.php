<?php get_header(); ?>



<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>




        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
        <div class="featured_image" style="background-image:url('<?php echo $image; ?>');">

            <div class="article_title_box">
                <div class="article_title">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-sm-push-4">
                                <h1><?php the_title(); ?></h1>
                                <p class="category"><?php the_category(', '); ?></p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="article_title_bg"></div>
            </div>


        </div>

        <div class="container">
            <div class="row">
                <p class="author col-sm-6 col-sm-push-4"><?php _e( 'Published by', 'webfactor' ); ?> <?php the_author_posts_link(); ?></p>
            </div>
        </div>


        <?php include('section-loop.php'); ?>



    </article>
    <!-- /article -->

<?php endwhile; ?>

<?php else: ?>

    <!-- article -->
    <article>
        <div class="container">
            <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>
        </div>

    </article>
    <!-- /article -->

<?php endif; ?>




<?php get_footer(); ?>

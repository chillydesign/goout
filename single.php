<?php get_header(); ?>



<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



        <?php $has_post_thumbnail = has_post_thumbnail(); ?>
        <?php $image = ( $has_post_thumbnail ) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
        <?php $image_caption = ( $has_post_thumbnail ) ?  get_post(get_post_thumbnail_id())->post_excerpt   : false; ?>
        <div class="featured_image" style="background-image:url('<?php echo $image; ?>');">
            <div class="article_title_box">
                <div class="article_title">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8 ">
                                <h1><?php the_title(); ?></h1>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="category"><?php the_category(', '); ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php get_template_part('partials/sharing-buttons'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="article_title_bg"></div>
            </div>
            <?php if ($image_caption) : ?>
                    <div class="single_featured_image_caption"><?php echo $image_caption; ?></div>
            <?php endif; ?>
        </div><!-- END OF FEATURED IMAGE -->

        <div class="container">
            <div class="row">
                <p class="author col-sm-6 col-sm-push-4"><?php _e( 'Published by', 'webfactor' ); ?> <?php the_author_posts_link(); ?> le <?php the_date('d.m.Y'); ?></p>
            </div>
        </div><!-- END OF AUTHOR -->



        <?php get_template_part('section-loop'); ?>

        <div class="container">
            <?php get_template_part('partials/sharing-buttons'); ?>
        </div>


        <?php get_template_part('partials/recommended-articles'); ?>





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

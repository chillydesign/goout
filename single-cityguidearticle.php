<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>






        <div class="container">

            <div class="row">


                <div class="col-sm-8">
                    <?php $gallery = get_field('gallery'); ?>
                    <?php if($gallery): ?>
                        <div class="gallery_images">
                            <?php foreach ($gallery as $image) : ?>
                                <img src="<?php echo $image['sizes']['large']; ?>" alt="">
                            <?php endforeach; ?>
                        </div>
                    <?php endif;?>

                </div>
                <div class="col-sm-4">

                    <div class="cityguidearticle_text">

                        <?php $city_guide = get_field('city_guide'); ?>
                        <?php $phone = get_field('telephone'); ?>
                        <?php $location = get_field('address'); ?>
                        <?php $website = get_field('website'); ?>


                        <?php if ($city_guide) : ?>
                            <a class="city_guide_link" href="<?php echo $city_guide->guid; ?>">
                                <?php echo $city_guide->post_title; ?>
                            </a>
                        <?php endif; ?>

                        <h1><?php the_title(); ?></h1>
                        <ul class="restaurant_meta cityguide_metas">
                            <?php if($location): ?><li><div class="icon_location">Location:</div> <p><?php echo $location; ?></p></li><?php endif;?>
                            <?php if($phone): ?><li><div class="icon_phone">Phone:</div> <p><?php echo $phone; ?></p></li><?php endif;?>
                            <?php if($website): ?><li><div class="icon_website">Website:</div> <p><a target="_blank" href="<?php echo esc_url($website); ?>">Site web</a></p></li><?php endif;?>

                        </ul>
                        <?php the_content(); ?>


                    </div>
                    <?php get_template_part('partials/sharing-buttons'); ?>
                </div>
            </div>



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

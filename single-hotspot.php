<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="hotspot_header">
            <div class="container">
                <h1><?php the_title(); ?></h1>

                <?php $la_fourchette_rating = get_field('la_fourchette_rating'); ?>
                <?php $star_rating = get_field('star_rating'); ?>
                <?php $price_rating = get_field('price_rating'); ?>
                <?php $opening_times = get_field('opening_times'); ?>
                <?php $chef = get_field('chef'); ?>
                <?php $phone = get_field('phone'); ?>
                <?php $location = get_field('location'); ?>
                <?php $website = get_field('website'); ?>
                <?php $gallery = get_field('gallery'); ?>


                    <div class="row">
                        <ul class=" restaurant_meta col-sm-4">
                            <?php if($la_fourchette_rating): ?><li> <?php echo $la_fourchette_rating; ?>/10 sur lafourchette.ch</li><?php endif;?>
                            <?php if($star_rating && false): ?><li>Star rating: <?php echo $star_rating; ?></li><?php endif;?>
                            <?php if($price_rating): ?><li>Price rating: <?php echo $price_rating; ?></li><?php endif;?>
                        </ul>
                        <ul class=" restaurant_meta col-sm-4">

                            <?php if($chef): ?><li>Chef: <?php echo $chef; ?></li><?php endif;?>
                            <?php if($opening_times): ?><li>Opening times: <?php echo $opening_times; ?></li><?php endif;?>
                        </ul>
                        <ul class=" restaurant_meta col-sm-4">
                            <?php if($location): ?><li>Location: <?php echo $location; ?></li><?php endif;?>
                            <?php if($phone): ?><li>Phone: <?php echo $phone; ?></li><?php endif;?>
                            <?php if($website): ?><li>Website: <?php echo esc_url($website); ?></li><?php endif;?>
                        </ul>
                    </div>

                <ul class="restaurant_meta">



                </ul>

            </div>
        </header>


        <div class="container">

            <div class="row">


                <div class="col-sm-8">

                    <?php if($gallery): ?>
                        <div class="gallery_images">
                        <?php foreach ($gallery as $image) : ?>
                            <img src="<?php echo $image['sizes']['large']; ?>" alt="">
                        <?php endforeach; ?>
                        </div>
                    <?php endif;?>

                </div>
                <div class="col-sm-4">
                    <?php the_content(); ?>

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

<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php $la_fourchette_rating = get_field('la_fourchette_rating'); ?>
        <?php $star_rating = get_field('star_rating'); ?>
        <?php $price_rating = get_field('price_rating'); ?>
        <?php $opening_times = get_field('opening_times'); ?>
        <?php $chef = get_field('chef'); ?>
        <?php $phone = get_field('phone'); ?>
        <?php $la_fourchette_link = get_field('la_fourchette_link'); ?>
        <?php $location = get_field('location'); ?>
        <?php $website = get_field('website'); ?>
        <?php $gallery = get_field('gallery'); ?>
        <?php $tags =  get_the_terms( get_the_ID(), 'coolspot_tag' ); ?>
        <?php $tags =  array_map( function($tag) { return $tag->name;    }, $tags);  ?>
        <?php $cat =  get_the_terms( get_the_ID(), 'coolspot_cat' ); ?>
        <?php $cat =  array_map( function($cat) {
             return   '<span>' . $cat->name[0] .'</span>' .  $cat->name;
          }, $cat);  ?>


        <div class="container">
                <p class="coolspot_cat"> <?php echo implode($cat, ' | '); ?></p>

        </div>


        <header class="coolspot_header">
            <div class="container">
                <h1>
                    <?php the_title(); ?>
                    <?php if($star_rating || $star_rating == '0'): ?>
                        <?php echo generate_stars($star_rating, 5, 'stars'); ?>
                    <?php endif;?>
                </h1>

                <ul class="restaurant_meta">

                        <?php if($la_fourchette_rating): ?><li> <strong><span class="fourchette_rating"><?php echo $la_fourchette_rating; ?></span>/10 </strong> &nbsp; sur lafourchette.ch</li><?php endif;?>

                        <?php if($price_rating || $price_rating == '0'): ?>
                            <li>
                                <div class="icon_price_rating">Price rating:</div>
                                <p><?php echo generate_stars($price_rating, 5, 'price_dots'); ?></p>
                            </li>
                        <?php endif;?>

                        <?php if($chef): ?><li><div class="icon_chef">Chef:</div> <p><?php echo $chef; ?></p></li><?php endif;?>


                        <?php if($tags): ?><li><div class="icon_tag">Etiquettes:</div> <p><?php echo implode($tags, ' | ' ); ?></p></li><?php endif;?>

                        <?php if($opening_times): ?><li><div class="icon_opening">Opening times:</div><p><?php echo $opening_times; ?></p></li><?php endif;?>
                        <?php if($location): ?><li><div class="icon_location">Location:</div> <p><?php echo $location; ?></p></li><?php endif;?>


                        <?php if($phone): ?><li><div class="icon_phone">Phone:</div> <p><?php echo $phone; ?></p></li><?php endif;?>
                        <?php if($website): ?><li><div class="icon_website">Website:</div> <p><a target="_blank" href="<?php echo esc_url($website); ?>">Site web</a></p></li><?php endif;?>

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

                    <?php if($la_fourchette_link):  ?>
                        <a href="<?php echo esc_url($la_fourchette_link); ?>" target="_blank" class="button">  <span class="tag_reserve"></span> Réserver avec lafourchette.ch</a>
                    <?php endif; ?>

                    <?php get_template_part('partials/sharing-buttons'); ?>

                    <?php  if($location)  generate_map($location);     ?>





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

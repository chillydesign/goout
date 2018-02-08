<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php $post_id = get_the_ID(); ?>
        <?php $la_fourchette_rating = get_field('la_fourchette_rating'); ?>
        <?php $la_fourchette_site_link = get_field('la_fourchette_site_link'); ?>
        <?php $star_rating = get_field('star_rating'); ?>
        <?php $price_rating = get_field('price_rating'); ?>
        <?php $opening_times = get_field('opening_times'); ?>
        <?php $chef = get_field('chef'); ?>
        <?php $phone = get_field('phone'); ?>
        <?php $la_fourchette_link = get_field('la_fourchette_link'); ?>
        <?php $reservation_la_fourchette = get_field('reservation_la_fourchette'); ?>
        <?php $location = get_field('location'); ?>
        <?php $website = get_field('website'); ?>
        <?php $gallery = get_field('gallery'); ?>
        <?php $tags =  get_the_terms( $post_id, 'coolspot_tag' ); ?>
        <?php  if($tags) {
            $tags_string =  array_map( function($tag) {
                $link = get_tag_link( $tag );
                return '<a href="'. $link.'">'. $tag->name .'</a>';
              }, $tags);
        };   ?>
        <?php $cat =  get_the_terms( $post_id, 'coolspot_cat' ); ?>
        <?php $cat_strings =  array_map( function($cat) {
             return   '<span>' . $cat->name[0] .'</span>' .  $cat->name;
          }, $cat);  ?>


        <div class="container">
                <p class="coolspot_cat"> <?php echo implode($cat_strings, ' | '); ?></p>

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

                        <?php if($la_fourchette_rating): ?><li> <strong><span class="fourchette_rating"><?php echo $la_fourchette_rating; ?></span>/10 </strong> &nbsp; <span class="surlafourchette">sur <a href="<?php echo $la_fourchette_site_link; ?>" target="_blank">lafourchette.ch</a></span></li><?php endif;?>

                        <?php if($price_rating || $price_rating == '0'): ?>
                            <li>
                                <div class="fancy_icon icon_price_rating">Price rating:</div>
                                <p><?php echo generate_stars($price_rating, 5, 'price_dots'); ?></p>
                            </li>
                        <?php endif;?>

                        <?php if($chef): ?><li><div class="fancy_icon icon_chef">Chef:</div> <p><?php echo $chef; ?></p></li><?php endif;?>


                        <?php if($tags): ?><li><div class="fancy_icon icon_tag">Etiquettes:</div> <p><?php echo implode($tags_string, ' | ' ); ?></p></li><?php endif;?>

                        <?php if($opening_times): ?><li><div class="fancy_icon icon_opening">Opening times:</div><p><?php echo $opening_times; ?></p></li><?php endif;?>
                        <?php if($location): ?><li><div class="fancy_icon icon_location">Location:</div> <p><?php echo $location; ?></p></li><?php endif;?>


                        <?php if($phone): ?><li><div class="fancy_icon icon_phone">Phone:</div> <p><?php echo $phone; ?></p></li><?php endif;?>
                        <?php if($website): ?><li><div class="fancy_icon icon_website">Website:</div> <p><a target="_blank" href="<?php echo esc_url($website); ?>">Site web</a></p></li><?php endif;?>

                        <?php if($reservation_la_fourchette): ?><li><p class="toggle_booking">Réserver sur LaFourchette</p></li><?php endif;?>

                    </ul>
                </div>


            </div>
        </header>


        <div class="container">

            <div class="row">


                <div class="col-sm-8">

                    <?php if($gallery): ?>
                        <div class="gallery_images">
                            <?php foreach ($gallery as $image) : ?>
                                <img src="<?php echo $image['sizes']['large']; ?>" alt="">
                                <?php if (strlen($image['caption'])) : ?>
                                    <p class="caption"><?php echo $image['caption']; ?></p>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif;?>

                </div>
                <div class="col-sm-4">
                    <?php the_content(); ?>

                    <?php if($la_fourchette_link):  ?>
                        <a href="<?php echo esc_url($la_fourchette_link); ?>" target="_blank" class="button">  <span class="tag_reserve"></span> Réserver avec lafourchette.ch</a>
                    <?php endif; ?>

                    <?php if($reservation_la_fourchette): ?>
                      <div class="toggle_booking">Réserver sur LaFourchette</div>
                      <div class="booking_popup">
                        <div class="close_booking"><span>+</span></div>
                        <iframe src="<?php echo $reservation_la_fourchette;?>"></iframe>
                      </div>
                    <?php endif; ?>

                    <?php get_template_part('partials/sharing-buttons'); ?>

                    <?php  if($location)  generate_map($location);     ?>


                    <?php  if( sizeof($cat) > 0)  $other_coolspots = show_random_coolspots($cat[0]->slug, 3, $post_id  ); ?>

                    <?php if (sizeof($other_coolspots)> 0) : ?>
                        <div class="other_coolspots">
                        <h2>Lieux <span>similaires</span></h2>
                        <?php foreach ($other_coolspots as $other_coolspot) : ?>
                            <?php $other_image = thumbnail_of_post_url( $other_coolspot->ID, 'small' ); ?>
                                <div class="other_coolspot">
                                    <a  href="<?php echo $other_coolspot->guid; ?>" class="other_coolspot_image" style="background-image:url(<?php echo $other_image; ?>);" ></a>
                                <h3><a href="<?php echo $other_coolspot->guid; ?>"><?php echo $other_coolspot->post_title; ?></a></h3>
                                </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>


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

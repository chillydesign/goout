<?php get_header(); ?>


<?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <!-- article -->
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <?php $pays = get_field('pays'); ?>
        <?php $habitants = get_field('habitants'); ?>
        <?php $langue = get_field('langue'); ?>
        <?php $monnaie = get_field('monnaie'); ?>
        <?php $addresses = get_field('addresses'); ?>
        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
        <?php $articles = get_cityguidearticles_for_cityguide(  get_the_ID() ); ?>


        <div class="container">

            <div class="cityguide_header" style="background-image:url('<?php echo $image; ?>');">

                <div class="cityguide_header_text">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>

                    <ul class="city_guide_stats">
                        <?php if ($pays): ?><li>Pays - <?php echo $pays; ?></li><?php endif; ?>
                        <?php if ($habitants): ?><li>Habitants - <?php echo $habitants; ?></li><?php endif; ?>
                        <?php if ($langue): ?><li>Langue - <?php echo $langue; ?></li><?php endif; ?>
                        <?php if ($monnaie): ?><li>Monnaie - <?php echo $monnaie; ?></li><?php endif; ?>
                    </ul>
                </div>

            </div>

        </div>


        <?php  if ($articles->have_posts() ) : $aa = 0;  ?>
            <div class="container">
                <?php  while($articles->have_posts()) : $articles->the_post();  ?>
                    <?php $telephone = get_field('telephone'); ?>
                    <?php $address = get_field('address'); ?>
                    <?php $website = get_field('website'); ?>
                    <?php $gallery = get_field('gallery'); ?>
                    <?php $classes = ( $aa % 2 == 0 ) ?  array('col-sm-6', 'col-sm-6') : array('col-sm-6 col-sm-push-6', 'col-sm-6 col-sm-pull-6'); ?>


                    <div class="row"  data-mh="city-group">


                        <div class="<?php echo $classes[0]; ?>">
                            <div class="cityguidearticle_text cityguide_text city_match">
                                <?php $permalink = get_the_permalink(); ?>
                                <h2><a href="<?php echo $permalink; ?>"><?php the_title(); ?></h2></a>
                                <p><?php echo get_the_excerpt(); ?></p>
                                <ul class="cityguide_metas">
                                    <?php if($address): ?><li><?php echo $address; ?></li><?php endif;?>
                                    <?php if($telephone): ?><li><?php echo $telephone; ?></li><?php endif;?>
                                    <?php if($website): ?><li><?php echo esc_url($website); ?></li><?php endif;?>
                                </ul>

                            </div>

                        </div>
                        <div class="<?php echo $classes[1]; ?>">
                            <div class="image_slider city_match">
                                <?php foreach ($gallery as $image) : ?>
                                    <div  class="city_image city_match" style="background-image:url(<?php echo $image['sizes']['medium']; ?>)"><a href="<?php echo $permalink; ?>"></a></div>
                                <?php endforeach; ?>

                            </div>

                        </div>

                    </div>

                    <?php $aa++; endwhile; ?>
                </div>
            <?php endif; wp_reset_query(); ?>


            <?php if( have_rows('addresses') ): ?>
                <div class="container ">
                    <div class="address_supplemenaires">
                        <h3>Adresse Supplemenaires</h3>

                        <div class="row">
                            <ul class="col-sm-6 col-sm-push-3">
                                <?php while ( have_rows('addresses') ) : the_row(); ?>
                                    <?php $name = get_sub_field('name'); ?>
                                    <?php $category = get_sub_field('category'); ?>
                                    <?php $website = get_sub_field('website'); ?>
                                    <li>
                                        <?php if ($name): ?><span class="cityguide_name"><?php echo $name; ?> | </span><?php endif; ?>
                                        <?php if ($category): ?><span class="cityguide_category"><?php echo $category; ?> | </span><?php endif; ?>
                                        <?php if ($website): ?><a href="<?php echo  esc_url($website); ?>" class="cityguide_website"><?php echo $website ; ?></a><?php endif; ?>

                                    </li>
                                <?php endwhile; ?>

                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <section class="container">
                <h2 style="text-align:center"><a  style="border:0" href="<?php echo home_url();?>/cool-trips">COOL TRIPS</a></h2>
            </section>


        </article>
        <!-- /article -->

    <?php endwhile; ?>

<?php else: ?>

    <article class="container">
        <h1><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h1>
    </article>


<?php endif; ?>




<?php get_footer(); ?>

<?php $content =  get_sub_field('content'); ?>
<?php $adverts = get_posts( array(
    'post_type' =>  'publicite',
    'posts_per_page' => 1
));  ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-push-4">

            <?php echo $content; ?>


        </div>
        <div class="col-sm-3 col-sm-pull-8">

            <?php foreach ( $adverts as $advert ) :  setup_postdata( $advert ); ?>
                <?php $image = thumbnail_of_post_url($advert->ID, 'medium' ); ?>
                <?php $lien = get_field('lien', $advert->ID); ?>
                <a href="<?php echo esc_url($lien); ?>" class="singl_dvr_cont" style="background-image:url('<?php echo $image; ?>')"><?php the_title(); ?></a>
            <?php endforeach; wp_reset_postdata(); ?>


        </div>

    </div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->

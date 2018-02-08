<?php get_header(); ?>
<?php $partners = new WP_Query(array(
    'post_type' => 'partenaire',
    'posts_per_page' =>  -1

));  ?>



<div class="container">


    <h1 class="fancy_title"><em><strong>Partenaires</strong> et <strong>Ego Boosters</strong></em>.</h1>

    <div class="partners_archive_container">

        <?php  if ($partners->have_posts() ) :  while($partners->have_posts()) : $partners->the_post();  ?>


            <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'small') : ''; ?>
            <?php $link = get_field('link'); ?>
            <?php if ($image) : ?>
                <div class="single_partner">
                    <?php if ($link): ?> <a target="_blank"  href="<?php echo esc_url($link); ?>"> <?php endif; ?>
                            <div class="partner_image" style=background-image:url("<?php echo $image; ?>)"></div>
                        <?php if ($link): ?></a> <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif;  ?>
        <?php wp_reset_query(); ?>


    </div>


</div><!--  END OF CONTAINER -->



<?php get_footer(); ?>

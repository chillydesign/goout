

<?php $artist = new WP_Query(array('post_type' => 'artistofthemonth',   'posts_per_page' =>  1 )); ?>
<?php  if ($artist->have_posts() ) :  while($artist->have_posts()) : $artist->the_post();  ?>
    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
    <?php $website = get_field('website'); ?>
    <?php $subtitle = get_field('subtitle'); ?>
    <div class="artist_of_month_box">

        <h4>ARTISTE DU MOIS</h4>

        <div class="row">
            <div class="col-sm-6">
                <h2><?php echo get_the_title(); ?></h2>
                <p>
                    <?php echo $subtitle; ?>
                </p>
            </div>
            <div class="col-sm-6">
                <img src="<?php echo $image; ?>" alt="">
            </div>
        </div>

    </div>

<?php  endwhile;endif;  ?>
<?php wp_reset_query(); ?>

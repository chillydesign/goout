

<?php $artist = new WP_Query(array('post_type' => 'artistofthemonth',   'posts_per_page' =>  1 )); ?>
<?php  if ($artist->have_posts() ) :  while($artist->have_posts()) : $artist->the_post();  ?>
    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
    <?php $website = get_field('website'); ?>
    <?php $subtitle = get_field('subtitle'); ?>
    <?php $permalink = get_the_permalink(); ?>
    <div class="artist_of_month_box">

        <h4>ARTISTE DU MOIS</h4>

        <div class="row">
            <div class="col-xs-6">
                <h2><?php echo get_the_title(); ?></h2>
                <p><?php echo $subtitle; ?></p>
                <?php if( false) : ?>
                    <div class="fancy_icon icon_website">Website:</div> <span><a target="_blank" href="<?php echo esc_url($website); ?>">Site web</a></span>
                <?php endif; ?>

            </div>
            <div class="col-xs-6">
                <?php if( $website) : ?><a target="_blank" href="<?php echo esc_url($website); ?>"><?php endif; ?>
                <img src="<?php echo $image; ?>" alt="ARTISTE DU MOIS" />
                <?php if( $website) : ?></a><?php endif; ?>
            </div>
        </div>

    </div>

<?php  endwhile;endif;  ?>
<?php wp_reset_query(); ?>

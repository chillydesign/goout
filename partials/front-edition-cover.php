<?php
$latest_editions = new WP_Query(array(
    'post_type' => 'edition',
    'posts_per_page' =>  5,
    'orderby'   => 'meta_value_num',
    'meta_key'  => 'issue_number'
));


?>



<?php  if ($latest_editions->have_posts() ) :  ?>

    <div id="latest_editions_cover">

        <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>

        <div class="post_slider">
            <?php  while($latest_editions->have_posts()) : $latest_editions->the_post();  ?>

                <?php $image = get_field('big_image');  ?>
                <?php $issue_number = get_field('issue_number');  ?>
                <?php $subtitle = get_field('subtitle');  ?>
                <div class="latest_edition_cover" style="background-image:url(<?php echo $image['sizes']['large']; ?>);">

                    <a href="<?php echo get_the_permalink(); ?>" class="subtitle">issue <?php echo $issue_number; ?> <span><?php echo $subtitle; ?></span></a>

                </div>

            <?php endwhile; ?>
        </div>
        <a href="#header" id="down_arrow"></a>
    </div>
<?php endif;  ?>
<?php wp_reset_query(); ?>

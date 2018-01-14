<?php

$first_args = array(
    'post_type' => 'post',
    'posts_per_page' =>  5,
    'meta_query' => array(  /// DONT SHOW FOCUS ARTICLES
        'relation' => 'OR',
        array(
            'key'     => 'focus',
            'value'   => '1',
            'compare' => '!='
        ),
        array(
            'key'     => 'focus',
            'compare' => 'NOT EXISTS'
        )
    )

);

$first_articles = new WP_Query($first_args);
 ?>


<?php if ($first_articles->have_posts() ) : ?>
<div class="container">
    <div class="first_articles_slider">
        <?php  while($first_articles->have_posts()) : $first_articles->the_post();  ?>
            <div class="first_article">
                <div class="row">
                    <?php $permalink  = get_the_permalink(); ?>
                    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                    <div class="col-sm-6">
                        <a  class="latest_image" href="<?php echo $permalink; ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <p class="category"><?php the_category(', '); ?></p>
                        <h2><a href="<?php echo $permalink; ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                        <p><?php echo get_the_excerpt(); ?><a class="read_more" href="<?php echo $permalink; ?>"> lire plus...</a></p>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div><!-- END OF first_articles_slider -->
</div>
<?php endif;  ?>
<?php wp_reset_query(); ?>

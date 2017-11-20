<?php

$latest = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' =>  5,
    'offset' => 5,
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
));
$l = 0;

?>
<?php  if ($latest->have_posts() ) :  ?>
    <div class="container">
        <div class="latest_articles">
            <div class="row">
                <?php  while($latest->have_posts()) : $latest->the_post();  ?>
                    <?php $col_class = ( $l == 1 ) ? 'col-sm-8' : 'col-sm-4' ?>
                    <div class="latest_article <?php echo $col_class; ?>">
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                        </a>
                        <div class="latest_text">
                            <p class="category"><?php the_category(', '); ?></p>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                            <p><?php echo get_the_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php if ($l == 1)  echo '</div><div class="row">'; ?>
                    <?php  $l++; endwhile; ?>
            </div>
        </div> <!-- END OF recommended_articles -->
    </div>
<?php endif;  ?>
<?php wp_reset_query(); ?>

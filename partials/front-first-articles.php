<div class="container">
    <div class="first_articles_slider">
        <?php $first_articles = new WP_Query(array('post_type' => 'post',   'posts_per_page' =>  5 ));  ?>
        <?php  if ($first_articles->have_posts() ) :  while($first_articles->have_posts()) : $first_articles->the_post();  ?>
            <div class="first_article">
                <div class="row">
                    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                    <div class="col-sm-6">
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <p class="category"><?php the_category(', '); ?></p>
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                        <p><?php echo get_the_excerpt(); ?></p>
                    </div>
                </div>
            </div>
        <?php endwhile;endif;  ?>
        <?php wp_reset_query(); ?>
    </div><!-- END OF first_articles_slider -->
</div>

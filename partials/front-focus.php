

<div class="container">

    <div class="focus_articles">

        <h5>Focus</h5>

            <?php $latest = new WP_Query(array('post_type' => 'post',   'posts_per_page' =>  3 )); $f = 0;  ?>
            <?php  if ($latest->have_posts() ) :  while($latest->have_posts()) : $latest->the_post();  ?>
                <?php $col_class = ( $f == 1 ) ? ['col-sm-6 col-sm-push-6', 'col-sm-6 col-sm-pull-6' ] : ['col-sm-6', 'col-sm-6'] ?>
                <div class="focus_article focus_article_<?php echo $f; ?>">
                    <div class="row">

                        <div class="<?php echo $col_class[0]; ?>">

                            <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                            <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                            </a>

                        </div>
                        <div class="<?php echo $col_class[1]; ?>">

                            <p class="category"><?php the_category(', '); ?></p>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                            <p><?php echo get_the_excerpt(); ?></p>

                            <?php get_template_part('partials/sharing-buttons'); ?>

                        </div>

                    </div>


                </div>

            <?php  $f++; endwhile;endif;  ?>
            <?php wp_reset_query(); ?>

    </div> <!-- END OF recommended_articles -->
</div>

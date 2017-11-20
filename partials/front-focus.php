<?php

$focus_args = array(
    'post_type' => 'post',
    'posts_per_page' =>  3,
    'meta_query' => array(
		array(
			'key'     => 'focus',
            'value'   => '1',
            'compare' => '=',
		)
    )
);

$focus = new WP_Query( $focus_args );
$f = 0;

 ?>

<?php   if ($focus->have_posts() ) :  ?>
<div class="container">
    <div class="focus_articles">

        <h5>Focus</h5>
            <?php while($focus->have_posts()) : $focus->the_post();  ?>
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

            <?php  $f++; endwhile; ?>

            <p class="plus_icon"><a  href="<?php echo get_post_type_archive_link( 'post' ); ?>">Plus</a></p>


    </div> <!-- END OF recommended_articles -->
</div>




<?php endif;  ?>
<?php wp_reset_query(); ?>

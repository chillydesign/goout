<?php

$hotspots = new WP_Query(array(
    'post_type' => 'hotspot',
    'posts_per_page' =>  5
));
$h = 0;

?>
<?php  if ($hotspots->have_posts() ) :  ?>
    <div class="container">
        <div class="hotspot_articles ">
        <h5>Hot spots</h5>
        <?php get_template_part('partials/categories-hotspots'); ?>

            <div class="row">
                <?php  while($hotspots->have_posts()) : $hotspots->the_post();  ?>
                    <?php $col_class = ( $h == 1 ) ? 'col-sm-8' : 'col-sm-4' ?>
                    <div class="hotspot_article <?php echo $col_class; ?>">
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                        <?php $hotspot_cat = get_the_terms( get_the_ID(), 'hotspot_cat' ); ?>
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                        </a>
                        <div class="latest_text">
                            <?php if(  $hotspot_cat && sizeof($hotspot_cat) > 0 ): ?>
                                 <p class="category"><?php echo $hotspot_cat[0]->name; ?></p>
                             <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                        </div>
                    </div>
                    <?php if ($h == 1)  echo '</div><div class="row">'; ?>
                    <?php  $h++; endwhile; ?>
            </div>
        </div> <!-- END OF hotspots latest articles -->
        <p class="plus_icon"><a  href="<?php echo get_post_type_archive_link( 'hotspot' ); ?>">Plus</a></p>

    </div>
<?php endif;  ?>
<?php wp_reset_query(); ?>

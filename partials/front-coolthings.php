<?php

$coolthings = new WP_Query(array(
    'post_type' => 'coolthing',
    'posts_per_page' =>  5
));
$c = 0;

?>
<?php  if ($coolthings->have_posts() ) :  ?>
    <div class="container">
        <div class=" coolthing_articles ">
        <h5>Cool things</h5>

        <?php get_template_part('partials/categories-coolthings'); ?>

            <div class="row">
                <?php  while($coolthings->have_posts()) : $coolthings->the_post();  ?>
                    <?php $col_class = ( $c == 0 ) ? 'col-sm-8' : 'col-sm-4' ?>
                    <div class="coolthing_article <?php echo $col_class; ?>">
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                        <?php $url = get_field('link'); ?>
                        <?php $title = get_the_title() ;?>
                        <a  class="latest_image" href="<?php echo esc_url($url); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php echo $title; ?>">
                        </a>
                        <div class="latest_text">
                        <h2><a href="<?php echo esc_url($url); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h2>
                        </div>
                    </div>
                    <?php if ($c == 1)  echo '</div><div class="row">'; ?>
                    <?php  $c++; endwhile; ?>
            </div>
        </div> <!-- END OF coolthings latest articles -->
        <p class="plus_icon"><a  href="<?php echo get_post_type_archive_link( 'coolthing' ); ?>">Plus</a></p>
    </div>
<?php endif;  ?>
<?php wp_reset_query(); ?>

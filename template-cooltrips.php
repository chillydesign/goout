<?php /* Template Name: Cool Trips */ get_header(); ?>

<?php  $articles =  get_cityguide_and_escapades();  ?>


<div class="container">
  <h1 class="fancy_title">Envie de <em><strong>déployer vos ailes</strong></em>? On vous dévoile tous les <em><strong>bons plans</strong></em> du <em><strong>Globe</strong></em>.</h1>


    <?php get_template_part('partials/cooltrips-list'); ?>


    <?php  if ($articles->have_posts() ) : $aa = 0;  ?>
        <div class="latest_articles">
            <div class="container">

                <div class="row">
                    <?php  while($articles->have_posts()) : $articles->the_post();  ?>
                        <?php $col_class = ( $aa % 5 == 0 ) ? 'col-sm-8' :  'col-sm-4'; ?>
                        <?php $permalink = get_the_permalink(); ?>
                        <?php $post_type =  ( $post->post_type == 'cityguide' )  ? 'City Guide' : 'Escapade' ?>
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  $image_size  ) : ''; ?>

                        <div class="latest_article <?php echo $col_class; ?>">
                            <a href="<?php echo $permalink; ?>"  class="latest_image" style="background-image:url(<?php echo $image; ?>);" ></a>
                            <div class="latest_text">
                                <p class="category"><?php echo $post_type; ?></p>
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>

                        <?php if ($aa % 5 == 1 || $aa % 5 == 4) echo '</div><div class="row">'; ?>
                            <?php $aa++; endwhile; ?>
                        </div>
                    </div>
                <?php endif; wp_reset_query(); ?>

            </div><!--  END OF CONTAINER -->
        </div>




        <?php get_footer(); ?>

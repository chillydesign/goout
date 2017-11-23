<div class="container">

    <?php $latest_edition = new WP_Query(array('post_type' => 'edition',   'posts_per_page' =>  1 ));  ?>
    <?php  if ($latest_edition->have_posts() ) :  while($latest_edition->have_posts()) : $latest_edition->the_post();  ?>
        <div class="latest_edition">
            <div class="row">

                <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'small') : ''; ?>
                <?php $featured_pages = get_field('featured_pages'); ?>

                <div class="col-sm-6">

                    <div class="row">

                        <div class="col-xs-4" style="padding-right:0">
                            <a  href="<?php the_permalink(); ?>">
                                <img class="latest_edition_img" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                            </a>
                        </div>
                        <div class="col-xs-8">

                            <div class="image_slider">
                                <?php if ($featured_pages): foreach($featured_pages as $page): ?>
                                    <div class="featured_page">
                                        <img class="latest_edition_img" src="<?php echo $page['sizes']['small']; ?>" alt="<?php the_title(); ?>">
                                    </div>
                                    <div class="featured_page">
                                        <img class="latest_edition_img" src="<?php echo $page['sizes']['small']; ?>" alt="<?php the_title(); ?>">

                                    </div>



                                <?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>





                </div>
                <div class="col-sm-6">
                    <p class="category">Issue <?php echo get_field('issue_number'); ?></p>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                    <p><?php echo get_the_excerpt(); ?></p>

                    <p><a class="abonnez_vous" href="">Abonnez-vous</a></p>
                </div>
            </div>
        </div>
    <?php endwhile;endif;  ?>
    <?php wp_reset_query(); ?>
</div>

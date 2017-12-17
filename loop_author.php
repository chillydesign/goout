

<?php $ap = 0; if (have_posts()):  ?>
    <div class="latest_articles">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>

                <?php $date =   date('d.m.Y', strtotime($post->post_date));
                if ( $post->post_type == 'coolspot' ){
                    $posttype = 'Cool spot';
                } else if ( $post->post_type == 'coolthing' ){
                    $posttype = 'Cool thing';
                } else if ( $post->post_type == 'cityguidearticle' ){
                    $posttype = 'City guide article';
                } else if ( $post->post_type == 'cityguide' ){
                    $posttype = 'City guide ';
                }else if ( $post->post_type == 'escapade' ){
                    $posttype = 'Escapade ';
                } else {
                    $posttype = 'Post';
                }

                        $categories =  get_the_category( $post->ID  );
                        $image = ( has_post_thumbnail(  $post->ID )) ? thumbnail_of_post_url( $post->ID, 'medium'  ) : '';
                ?>

                <div class=" latest_article col-sm-4">
                    <!-- article -->
                    <article >


                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>"></a>
                        <div class="latest_text">
                            <?php if ( sizeof($categories) > 0) : ?>
                                <p class="category"><?php echo $categories[0]->cat_name; ?> </p>
                            <?php else: ?>
                                <p class="category"><?php echo $posttype; ?></p>
                            <?php endif; ?>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
                                    <p class="date"><?php echo $date; ?></p>
                        </div>

                    </article>
                    <!-- /article -->
                </div>
                <?php if ($ap % 3 == 2)  echo '</div><!--  END OF ROW --><div class="row">'; ?>

                <?php $ap++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>

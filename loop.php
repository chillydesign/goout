

<?php $pp = 0; if (have_posts()):  ?>
    <div class="latest_articles">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>

                <div class=" latest_article col-sm-4">
                    <!-- article -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>"></a>
                        <div class="latest_text">

                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

                            <?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>

                        </div>

                    </article>
                    <!-- /article -->
                </div>
                <?php if ($pp % 3 == 2)  echo '</div><!--  END OF ROW --><div class="row">'; ?>

                <?php $pp++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->

<?php else: ?>

    <!-- article -->
    <article>
        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>
    </article>
    <!-- /article -->

<?php endif; ?>

<?php $pp = 0; if (have_posts()):  ?>
    <div class="latest_articles">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <?php $col_class = ( $pp  % 5 == 0 ) ? 'col-sm-8' : 'col-sm-4' ?>
                <div class="     latest_article latest_article_no_fixed_height <?php echo $col_class; ?>">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php //$link = get_field('link');  ?>
                        <?php $link = get_permalink(); ?>
                        <?php $title = get_the_title(); ?>
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
                        <a  class="latest_image" href="<?php echo ($link); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php echo $title; ?>"></a>
                        <div class="latest_text">

                            <h2><a href="<?php echo $link; ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></h2>

                            <?php html5wp_excerpt('html5wp_index');  ?>

                        </div>
                    </article>
                </div>
                    <?php if ($pp % 5 == 1 || $pp % 5 == 4) echo '</div><div class="row">'; ?>
                <?php $pp++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->
<?php endif; ?>

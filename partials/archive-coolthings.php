<?php $pp = 0; if (have_posts()):  ?>
    <div class="latest_articles">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <?php $col_class = ( $pp  % 5 == 0 ) ? 'col-sm-8' : 'col-sm-4' ?>
                <div class=" latest_article latest_article_no_fixed_height <?php echo $col_class; ?>">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <?php $link = get_field('link');  ?>
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
                        <a  class="latest_image" href="<?php echo esc_url($link); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>"></a>
                        <div class="latest_text latest_text_dark">
                            <h2><a href="<?php echo esc_url($link); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </article>
                </div>
                    <?php if ($pp % 5 == 1 || $pp % 5 == 4) echo '</div><div class="row">'; ?>
                <?php $pp++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->
<?php endif; ?>

<?php $pp = 0; if (have_posts()):  ?>
    <div class="latest_articles">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <?php $col_class = ( $pp  % 5 == 1 ) ? 'col-sm-8' : 'col-sm-4' ?>
                <div class=" animate_in_viewport    latest_article latest_article_no_fixed_height <?php echo $col_class; ?>">
                    <article <?php post_class(); ?>>
                        <?php $link = get_the_permalink();  ?>
                        <?php $cool_id =  get_the_ID(); ?>
                        <?php $coolspot_cat = get_the_terms( $cool_id , 'coolspot_cat' ); ?>
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url($cool_id,  'medium') : ''; ?>
                        <a  class="latest_image" href="<?php echo ($link); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>"></a>
                        <div class="latest_text ">
                            <?php if(  $coolspot_cat && sizeof($coolspot_cat) > 0 ): ?>
                                 <p class="category"><?php echo $coolspot_cat[0]->name; ?></p>
                             <?php endif; ?>
                            <h2><a href="<?php echo esc_url($link); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </article>
                </div>
                    <?php if ($pp % 5 == 1 || $pp % 5 == 4) echo '</div><div class="row">'; ?>
                <?php $pp++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->
<?php endif; ?>

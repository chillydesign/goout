<?php $pp = 0; if (have_posts()):  ?>
    <div class="on_air_section ">
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <?php $col_class = ( $pp  % 5 == 0 ) ? 'col-sm-8' : 'col-sm-4' ?>
                <div class="  latest_article latest_article_no_fixed_height <?php echo $col_class; ?>">
                  <?php
                    $video = get_field('video');
                    $excerpt = get_the_excerpt(  );
                    $video_id = get_the_ID();
                    $title = get_the_title();
                    $image_size = ($v == 0 ) ? 'large' : 'medium';
                    $image = ( has_post_thumbnail()) ? thumbnail_of_post_url( $video_id ,  $image_size  ) : '';
                    $vid_string = '<div class="on_air_video on_air_video_'. $image_size .'">';
                    $vid_string .= '<a data-lity title="' .  $title . '" href="#video_inline_'.$video_id.'" ><h3>' . $title . '</h3></a>';
                    $vid_string .= '<div  class="latest_image" style="background-image:url(' . $image . ');" ></div>';
                    $vid_string .='</div>';
                    $vid_string .= '<div id="video_inline_'. $video_id .'" class="lity-hide"><div class="video_iframe_container"><div class="container"><div class="row"><div class="col-sm-6"><h3>'.$title.'</h3><p>'.  $excerpt.'</p>'.  generate_sharing_buttons(get_the_permalink(),  $title, '' ).'</div><div class="col-sm-6">'. wp_oembed_get($video).'</div></div></div></div></div>';
                    echo $vid_string;
                  ?>

                </div>
                    <?php if ($pp % 5 == 1 || $pp % 5 == 4) echo '</div><div class="row">'; ?>
                <?php $pp++; endwhile; ?>
        </div><!--  END OF ROW -->
    </div> <!-- END OF LATEST ARTICLES -->
<?php endif; ?>

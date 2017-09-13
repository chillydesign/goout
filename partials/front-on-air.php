<?php
$videos = new WP_Query(array('post_type' => 'video',   'posts_per_page' =>  4 ));
$v = 0;
$videos_array = array();
// loop through all videos, get their images and then add to array for later echoing out
if ($videos->have_posts() ) :  while($videos->have_posts()) : $videos->the_post();
$video = get_field('video');
$image_size = ($v == 0 ) ? 'large' : 'medium';
$image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  $image_size  ) : '';
$vid_string = '<div class="on_air_video on_air_video_'. $image_size .'">';
$vid_string .= '<a data-lity title="' .  get_the_title() . '" href="' . $video . '" ><h3>' .  get_the_title() . '</h3></a>';
$vid_string .= '<div  class="latest_image" style="background-image:url(' . $image . ');" ></div>';
$vid_string .='</div>';

array_push($videos_array, $vid_string);

$v++; endwhile;  endif;
wp_reset_query();

?>


<?php if ( sizeof($videos_array) > 0 ) : ?>
    <div class="container">
        <h5>On Air</h5>
    </div>
    <div class="on_air_section">

        <div class="container">

            <div class="row">
                <div class="col-sm-9 col-sm-push-3 large_video">

                    <?php $first_vid = array_shift($videos_array); echo $first_vid; ?>

                </div>
                <div class="col-sm-3 col-sm-pull-9">
                    <?php foreach ($videos_array as $video) {
                        echo $video;
                    }; ?>
                </div>

            </div>


        </div>
    </div> <!-- END OF on_air_section -->
<?php endif; ?>
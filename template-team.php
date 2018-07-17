<?php /* Template Name: Team */ get_header(); ?>


<?php
$tdu = get_template_directory_uri();
$post_types = array('post', 'coolspot', 'coolthing', 'cityguidearticle', 'cityguide', 'escapade' );
$user_args = array(
    'role__in'     => array('editor', 'administrator'),
    'exclude' => array(1), //exclude webfactor employees
    'orderby' => 'meta_value',
    'meta_key' => 'order'
);
$members = get_users( $user_args );
$member_strings = array();
$member_details = array();
$m = 0;
$is_big = true;
$is_second_row_big = false;
foreach ($members as $member) :
    $member_id = $member->ID;
    $display_name = $member->display_name;
    $biography = get_the_author_meta('description', $member_id) ;
    $email = get_the_author_meta('user_email', $member_id) ;
    $job_title = get_field('job_title', 'user_' . $member_id) ;
    $picture = get_wp_user_avatar_src(get_the_author_meta('user_email', $member_id), 512);
    $author_posts = get_posts( array('author' =>  $member_id, 'posts_per_page' => 6, 'post_type'=> $post_types   ) );
    // $big_class = ($is_big) ? ' member_container_big ' : '';
    // $second_row_class = ($is_second_row_big) ? ' member_container_second_row ' : '';
    $member_string = '<div data-member="member_'.$member_id.'"   class="member_container " style="background-image:url('. $picture.');">';
    $member_string .= '<div class="member_container_info"><h3> '. $display_name .'</h3>';
    if ($job_title) $member_string .= '<p class="job_title">' .  $job_title .'</p>';
    $member_string .= '</div></div>';

    $member_detail = '<div class="member_detail"  id="member_'.$member_id.'"   >';
    $member_detail .= '<div class="picture_info">';
    $member_detail .= '<div class="member_picture" style="background-image:url('. $picture.');" ></div>';
    $member_detail .= '<div class="member_info"><h2>'. $display_name .'</h2><div class="member_info_box">';
    if ($job_title) $member_detail .= '<p class="job_title">' .  $job_title .'</p>';
    if ($biography) $member_detail .= '<div class="biography">' .  $biography .'</div>';
    if ($email) $member_detail .= '<p class="email">' .  $email .'</p>';
    $member_detail .= '';
    $member_detail .= '<a href="#" class="scroll_to_top"></a>';
    $member_detail .= '</div> <!--END OF MEMBER INFO BOX --> </div> <!-- END OF MEMBER INFO --> ';


    $member_detail .= '    </div> <!--END OF PICTURE INFO --> <div class="latest_articles"><h3>LES DERNIERS ARTICLES DE '. $display_name .'</h3><div class="row">';
    $ap = 0;

    foreach ($author_posts as $author_post) {

        $date =   date('d.m.Y', strtotime($author_post->post_date));
        if ( $author_post->post_type == 'coolspot' ){
            $posttype = 'Cool spot';
        } else if ( $author_post->post_type == 'coolthing' ){
            $posttype = 'Cool thing';
        } else if ( $author_post->post_type == 'cityguidearticle' ){
            $posttype = 'City guide article';
        } else if ( $author_post->post_type == 'cityguide' ){
            $posttype = 'City guide ';
        }else if ( $author_post->post_type == 'escapade' ){
            $posttype = 'Escapade ';
        } else {
            $posttype = 'Post';
        }


        $categories =  get_the_category( $author_post->ID  );
        $image = ( has_post_thumbnail(  $author_post->ID )) ? thumbnail_of_post_url( $author_post->ID, 'medium'  ) : '';
        $member_detail .= '<div class="col-sm-4">';
        $member_detail .= '<div class="latest_article">';
        $member_detail .= '<a href="' . $author_post->guid . '"  class="latest_image" style="background-image:url(' . $image . ');" ></a>';
        $member_detail .= '<div class="latest_text">';
        if ( sizeof($categories) > 0) :
            $member_detail .= '<p class="category">' . $categories[0]->cat_name . '</p>';
        else:
            $member_detail .= '<p class="category">' . $posttype. '</p>';
        endif;
        $member_detail .= '<h2><a href="' . $author_post->guid . '">'.  $author_post->post_title .'</a></h2>';
        $member_detail .= '<p>' . $author_post->post_excerpt .'<a class="read_more" href="' . $author_post->guid . '"> lire plus</a></p>';
        $member_detail .= '<p class="date">' . $date .'</p>';
        $member_detail .= '</div><!-- END OF LATEST TEXT --> ';
        $member_detail .= '</div><!-- END OF LATEST ARTICLE --> ';
        $member_detail .= '</div><!-- END OF COL -->';
        if ($ap % 3 ==2 )     $member_detail .= '</div> <!-- END OF ROW --><div class="row">';
        $ap++;
    }

    $member_detail .= '</div> <!-- END OF ROW --> </div> <!-- END OF AUTHOR PSOTS --> ';
    $member_detail .= '</div> <!-- END OF MEMBER DETAIL -->'. "\n\n";


    // $is_big = !$is_big;
    // if ( $m % 6 == 5 ) $is_big = !$is_big;
    // if ($m > 5) $is_second_row_big = true;

    array_push($member_strings, $member_string);
    array_push($member_details, $member_detail);
    $m++;
endforeach; ?>


<div class="container">
    <h1><?php the_title(); ?></h1>
</div>



<div class="members_container ">

        <?php $mm = 0; foreach ($member_strings as $member_string) : ?>
            <?php echo $member_string; ?>

        <?php $mm++; endforeach; ?>

</div>

<div class="container">
    <div class="member_details">
        <?php echo implode($member_details , "\n"); ?>
    </div>
</div>



        <?php get_footer(); ?>

<?php get_header(); ?>
<?php
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
$author_id = $author->ID;
$biography = get_the_author_meta('description', $author_id) ;
$email = get_the_author_meta('user_email', $author_id) ;
$job_title = get_field('job_title', 'user_' . $author_id) ;
$picture = get_wp_user_avatar_src(get_the_author_meta('user_email', $author_id), 512);
?>
<div class="container">

    <div class="member_details">
        <div class="member_detail member_visible">
            <div class="picture_info">
                <div class="member_picture" style="background-image:url(<?php echo $picture; ?>);" ></div>
                <div class="member_info">
                    <h2><?php echo get_the_author(); ?></h2>
                    <div class="member_info_box">
                        <?php if ($job_title) : ?><p class="job_title"><?php echo $job_title; ?></p><?php endif; ?>
                        <?php if ($biography) : ?><div class="biography"><?php echo $biography; ?></div><?php endif; ?>
                        <?php if ($email) : ?><p class="email"><?php echo $email; ?></p><?php endif; ?>
                    </div> <!--END OF MEMBER INFO BOX -->
                </div> <!-- END OF MEMBER INFO -->
            </div> <!--END OF PICTURE INFO -->
        </div> <!-- END OF MEMBER DETAIL -->



    <?php get_template_part('loop_author'); ?>

    <?php get_template_part('pagination'); ?>
    </div> <!-- END OF MEMBER DETAILs -->

</div>


<?php get_footer(); ?>

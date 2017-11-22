<?php
$latest_editions = new WP_Query(array(
    'post_type' => 'edition',
    'posts_per_page' =>  5,
    'orderby'   => 'meta_value_num',
    'meta_key'  => 'issue_number'
));


$edition_numbers = array();
$edition_strings = array();
if ($latest_editions->have_posts() ):  while($latest_editions->have_posts()) : $latest_editions->the_post();
    $image = get_field('big_image');
    $issue_number = get_field('issue_number');
    $subtitle = get_field('subtitle');
    $str =  '<div data-issuenumber="'. $issue_number .'" class="latest_edition_cover" style="background-image:url('.  $image['sizes']['large'] . ');">';
    $str .= '<a href="' .  get_the_permalink() .'" class="subtitle">issue ' . $issue_number . '<span>' . $subtitle  .'</span></a>';
    $str .= '</div>';
    array_push($edition_strings, $str);
    array_push($edition_numbers, $issue_number);
endwhile;endif;
wp_reset_query();
?>



<?php  if ( sizeof($edition_strings) > 0) :  ?>

    <div id="latest_editions_cover">

        <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>

        <div class="issues_slider">
            <?php echo implode('',  $edition_strings ); ?>
        </div>
        <div id="prev_issue_number"><?php echo $edition_numbers[4]; ?></div>
        <div id="next_issue_number"><?php echo $edition_numbers[1]; ?></div>
        <a href="#header" id="down_arrow"></a>
    </div>
<?php endif;  ?>

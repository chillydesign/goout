<?php
$parent_categories = get_the_category( ) ;
// if have a category
if (sizeof($parent_categories) > 0) :
$parent_category = $parent_categories[0];
// find 6 posts in same category, but not the post you are on, and in a random order
$recommended = new WP_Query(array(
    'post_type' => 'post',
    'orderby' => 'rand',
    'posts_per_page' =>  6,
    'post__not_in' => array( get_the_ID()   ) ,
    'cat' =>  $parent_category->term_id
));

// if have posts in this category
if ($recommended->have_posts() ) :  ?>
<div class="recommended_articles">
    <div class="container">
        <h3>Articles Recommandes</h3>
    </div>

    <?php goout_posts_slider($recommended); ?>

</div> <!-- END OF recommended_articles -->
<?php endif; wp_reset_query(); ?>
<?php endif; ?>

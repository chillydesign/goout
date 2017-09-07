<?php

$onenparles = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' =>  6

));

// if have posts in this category
if ($onenparles->have_posts() ) :  ?>
<div class="recommended_articles ">
    <div class="container">
        <h3>On En Parle</h3>
    </div>
    <?php goout_posts_slider($onenparles); ?>
</div> <!-- END OF recommended_articles -->

<?php endif; wp_reset_query(); ?>

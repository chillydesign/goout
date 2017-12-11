<?php

$onenparles = new WP_Query(array(
    'post_type' => 'news',
    'posts_per_page' =>  6
));

// if have posts in this category
if ($onenparles->have_posts() ) :  ?>
<div class="onenparle_articles ">
    <div class="container">
        <h5>On En Parle</h5>
    </div>
    <?php goout_posts_slider($onenparles); ?>
</div> <!-- END OF recommended_articles -->

<?php endif; wp_reset_query(); ?>

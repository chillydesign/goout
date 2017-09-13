<?php

// $more_articles = new WP_Query(array(
//     'post_type' => 'post',
//      'posts_per_page' =>  12,
//      'offset' => 4  // we are alreadys how the first 4 elsewhere
//  )); $m = 0;


// array of posts made in index.php
global $posts_array;
// other 4 posts have already been displayed
$more_posts = array_slice($posts_array, 4);
$mp = 0;


?>

<?php if ( sizeof($more_posts) > 0 ) :  ?>

<div class="container">
    <div class="latest_articles">
        <div class="row">

            <?php foreach ($more_posts as $post) :   ?>
                <div class="latest_article col-sm-4"><?php echo $post; ?></div>
                <?php if ($mp % 3 == 2)  echo '</div><div class="row">'; ?>
            <?php $mp++; endforeach; ?>


        </div>
    </div> <!-- END OF recommended_articles -->
</div>

<?php endif; // if more than 4 posts avaialbe to show  ?>

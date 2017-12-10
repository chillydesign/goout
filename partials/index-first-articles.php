<?php



// array of posts made in index.php
global $posts_array;
global $show_artist_of_month;

?>


<?php if ( sizeof($posts_array) > 0 ) : ?>



            <div class="latest_articles">
            <div class="row">
                <div class="col-sm-8 larger_article_image">

                    <?php   echo $posts_array[0]; ?>

                </div>
                <div class="col-sm-4 ">

                    <?php if ($show_artist_of_month) get_template_part('partials/index', 'artistofmonth'); // artist of the month  ?>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-4"><?php if( sizeof($posts_array) > 1)  echo $posts_array[1]; ?></div>
                <div class="col-sm-4"><?php if( sizeof($posts_array) > 2)  echo $posts_array[2]; ?></div>
                <div class="col-sm-4"><?php if( sizeof($posts_array) > 3)  echo $posts_array[3]; ?></div>
            </div>


        </div>

<?php endif; ?>

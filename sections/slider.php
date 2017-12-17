
<div class="container">
    <div class="row">

        <div class="col-sm-8 col-sm-push-4">

            <ul class="image_slider">
                <?php while ( have_rows('slides') ) : the_row() ; ?>
                    <?php $image =  get_sub_field('image');   ?>
                    <li> <div class="slide_div"   style="background-image: url(<?php echo $image['url']; ?>);" ></div></li>
                <?php endwhile; ?>
            </ul>

        </div>
    </div>

</div>

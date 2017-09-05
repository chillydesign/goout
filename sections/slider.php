<ul class="image_slider">
    <?php while ( have_rows('slides') ) : the_row() ; ?>
        <?php $image =  get_sub_field('image');   ?>
        <li> <div class="slide_div"   style="background-image: url(<?php echo $image['url']; ?>);" ></div></li>
    <?php endwhile; ?>
</ul>

<?php $tdu = get_template_directory_uri(); ?>

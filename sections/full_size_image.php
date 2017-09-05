<?php $image =  get_sub_field('image'); ?>
<?php $description =  get_sub_field('description'); ?>


<div class="container">

    <figure>
        <img src="<?php echo $image['sizes']['large']; ?>" alt="Image" class="full_width_image">
        <?php if ($description): ?>
            <figcaption>
                <p><?php echo $description; ?></p>
            </figcaption>
        <?php endif; ?>
    </figure>



</div><!--  END OF CONTAINER -->

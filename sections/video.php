<?php $video =  get_sub_field('video'); ?>
<?php $image =  get_sub_field('image'); ?>
<?php $title =  get_sub_field('title'); ?>

<div class="container">


<figure>
    <a href="<?php echo $video;?>" data-lity>
    <img src="<?php echo $image['sizes']['large']; ?>" alt="Image" class="full_width_image">
    </a>
    <?php if ($title): ?>
        <figcaption>
            <p><?php echo $title; ?></p>
        </figcaption>
    <?php endif; ?>
</figure>


</div>

<?php $image =  get_sub_field('image'); ?>
<?php $content =  get_sub_field('content'); ?>
<?php $image_position = get_sub_field('image_position'); ?>

<?php

if ( $image_position == 'right' ) {
    $classes = [ 'col-sm-8', 'col-sm-4'  ];
} else {
    $classes = [ 'col-sm-8 col-sm-push-4', 'col-sm-4 col-sm-pull-8'  ];
};



?>

<div class="container">
    <div class="row">
        <div class="<?php echo $classes[0]; ?>">
        
                <?php echo $content; ?>


        </div>
        <div class="<?php echo $classes[1]; ?>">


            <img class="sidebar_photo" src="<?php echo $image['url']; ?>" alt="" />




        </div>

    </div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->

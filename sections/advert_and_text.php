<?php $image =  get_sub_field('image'); ?>
<?php $content =  get_sub_field('content'); ?>
<?php $advert_position = get_sub_field('advert_position'); ?>

<?php

if ( $advert_position == 'right' ) {
    $classes = [ 'col-sm-8', 'col-sm-push-1 col-sm-3'  ];
} else {
    $classes = [ 'col-sm-8 col-sm-push-4', 'col-sm-3 col-sm-pull-8'  ];
};



?>

<div class="container">
    <div class="row">
        <div class="<?php echo $classes[0]; ?>">

            <?php echo $content; ?>


        </div>
        <div class="<?php echo $classes[1]; ?>">


            <div style="background:grey;height:200px;width:100%;"></div>

        </div>

    </div> <!-- END OF ROW -->
</div><!--  END OF CONTAINER -->

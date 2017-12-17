<?php $image =  get_sub_field('image'); ?>
<?php $content =  get_sub_field('content'); ?>
<?php $image_position = get_sub_field('image_position'); ?>
<?php $image_lien = get_sub_field('image_lien'); ?>

<?php

// if ( $image_position == 'right' ) {
//     $classes = [ 'col-sm-8', 'col-sm-3 col-sm-push-1'  ];
// } else {
//     $classes = [ 'col-sm-8 col-sm-push-4', 'col-sm-3 col-sm-pull-8'  ];
// };


$classes = [ 'col-sm-8 col-sm-push-4', 'col-sm-3 col-sm-pull-8'  ];


?>

<div class="container">
    <div class="row">
        <div class="<?php echo $classes[0]; ?>">

            <?php echo $content; ?>


        </div>
        <div class="<?php echo $classes[1]; ?>">


            <?php if ($image_lien) : ?><a class="sidebar_photo_link"  target="_blank" href="<?php echo esc_url( $image_lien ); ?>"><?php endif; ?>
                <figure>
                    <img class="sidebar_photo" src="<?php echo $image['url']; ?>" alt="" />
                    <?php if($image['caption'] !== '' ): ?>

                            <p class="sidebar_caption"><?php echo $image['caption']; ?></p>

                    <?php endif ?>
                </figure>
                <?php if ($image_lien) : ?></a><?php endif; ?>




            </div>

        </div> <!-- END OF ROW -->
    </div><!--  END OF CONTAINER -->

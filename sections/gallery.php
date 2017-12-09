<?php $images =  get_sub_field('images'); ?>
<?php $tdu = get_template_directory_uri(); ?>
<?php $image_array = []; ?>
<?php
foreach( $images as $image ):
    $str = '<li  class="gallery_image">';

    $str .= '<img src="' . $image['sizes']['medium'] . '"  alt="" />';

    if (strlen($image['caption'])) :
            $str .= '<p class="caption">' . $image['caption']   . '</p>';
    endif;

    $str .= '</li>';
    array_push($image_array, $str);
endforeach;




?>



<div class="container">

    <ul class="gallery_images ">
        <?php echo implode($image_array, " "); ?>
    </ul>

</div>

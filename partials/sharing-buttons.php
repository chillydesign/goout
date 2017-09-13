<?php $share_image_file = ''; ?>
<?php $share_permalink = get_the_permalink(); ?>
<?php $share_title = get_the_title(); ?>
<div class="share_buttons" >
    <a class="share_button share_button_facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_permalink; ?>"></a>
    <a class="share_button share_button_twitter" href="http://www.twitter.com/share?url=<?php echo $share_permalink ; ?>&via=GOOUTMAG&text=<?php echo $share_title; ?>&image-src=<?php echo $share_image_file; ?>"></a>
    <a class="share_button share_button_google" href="https://plus.google.com/share?url=<?php echo $share_permalink; ?>"></a>
    <a class="share_button share_button_pinterest" href="http://pinterest.com/pin/create/button/?url=<?php echo $share_permalink; ?>&description=<?php echo $share_title; ?>&media=<?php echo $share_image_file; ?>"></a>
    <a class="share_button share_button_instagram" href="#"></a>
</div>

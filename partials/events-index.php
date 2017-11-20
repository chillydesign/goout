<?php
// array of posts made in index.php
global $posts_array;

 ?>
<div class="container">
<div class="row">
    <?php $ev = 0; foreach ($posts_array as $post) : ?>


        <div class="col-sm-3 ">
            <?php echo $post; ?>
        </div>

        <?php if ($ev % 4 ==3) echo '</div><div class="row">'; ?>

    <?php $ev++; endforeach; ?>
</div>

    <?php get_template_part('pagination'); ?>
</div><!--  END OF CONTAINER -->

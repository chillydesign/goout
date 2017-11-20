<?php
 $categories = get_categories( array("hide_empty" => 0,   'taxonomy' => 'event_cat') );
 $current_cat = get_the_category();

 $current_cat_id = ( is_category() &&  sizeof($current_cat)) ? $current_cat[0]->cat_ID : 0;
 ?>
<ul class="categories_list">
<?php $blog_active = ( $current_cat_id == 0 ) ? ' class="active_link" '  : ''; ?>
<li <?php echo $blog_active; ?>><a href="<?php echo get_post_type_archive_link( 'evenement' ); ?>">Tous</a></li>
<?php foreach ($categories as $category) : ?>
<?php $active = ( $current_cat_id == $category->term_id  ) ?  ' class="active_link" '  : ''; ?>
<li <?php echo $active; ?>><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></li>
<?php endforeach; ?>
<li>
    <form action="">
        <input placeholder="search" name="s" type="text">
        <input  type="hidden" name="post_type" value="evenement">
    </form>
</li>
</ul>

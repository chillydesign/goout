<?php
 $categories = get_categories( array("hide_empty" => 0,   'taxonomy' => 'news_cat') );
 $current_cat =  get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
 $current_cat_id = (  is_tax() &&   sizeof($current_cat)) ? $current_cat->term_id : 0;
 ?>
<ul class="categories_list">
<?php $blog_active = ( $current_cat_id == 0 ) ? ' class="active_link" '  : ''; ?>
<li <?php echo $blog_active; ?>><a href="<?php echo get_post_type_archive_link( 'news' ); ?>">Tous</a></li>
<?php foreach ($categories as $category) : ?>
<?php $active = ( $current_cat_id == $category->term_id  ) ?  ' class="active_link" '  : ''; ?>
<li <?php echo $active; ?>><a href="<?php echo get_category_link($category); ?>"><?php echo $category->name; ?></a></li>
<?php endforeach; ?>

</ul>

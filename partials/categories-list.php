<?php
$categories_args =  array("hide_empty" => 1);
$current_cat = get_category( get_query_var( 'cat' ) );
$current_cat_id = 0;

if (!isset($current_cat->errors)) {
if ( $current_cat->parent > 0 ) {
    $categories_args['parent'] = $current_cat->parent;
    $parent = get_category( $current_cat->parent );
    $parent_link =  get_category_link( $parent );
    $current_cat_id =  $current_cat->cat_ID;
} else {
    $categories_args['parent'] = $current_cat->cat_ID;
    $parent_link =  get_category_link( $current_cat );
    $current_cat_id = 0;
}
}



$categories = get_categories( $categories_args );




?>
<ul class="categories_list">
    <?php $blog_active = ( $current_cat_id == 0 ) ? ' class="active_link" '  : ''; ?>
    <li <?php echo $blog_active; ?>><a href="<?php echo $parent_link; ?>">Tous</a></li>
    <?php foreach ($categories as $c) : ?>
        <?php $active = ( $current_cat_id == $c->term_id  ) ?  ' class="active_link" '  : ''; ?>
        <li <?php echo $active; ?>><a href="<?php echo get_category_link($c->term_id); ?>"><?php echo $c->name; ?></a></li>
    <?php endforeach; ?>
</ul>

<?php $partners = new WP_Query(array(
    'post_type' => 'partenaire',
    'posts_per_page' =>  -1 ,
    'tax_query' => array(
		array(
			'taxonomy' => 'partner_cat',
			'field'    => 'slug',
			'terms'    => 'on-home-page'
		)
	)

));  ?>




<div class=" partners_container">
        <h5><a  href="<?php echo get_post_type_archive_link( 'partenaire' ); ?>">Partenaires</a></a></h5>



    <ul class="partners_slider">
        <?php  if ($partners->have_posts() ) :  while($partners->have_posts()) : $partners->the_post();  ?>
            <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'small') : ''; ?>
            <?php $link = get_field('link'); ?>
            <?php if ($image) : ?>
            <li class="partner_li">
                <?php if ($link): ?> <a   href="<?php echo esc_url($link); ?>"> <?php endif; ?>
                    <img class="partner_image" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                <?php if ($link): ?></a> <?php endif; ?>
            </li>
            <?php endif; ?>


        <?php endwhile;endif;  ?>
    </ul>
</div>

<?php wp_reset_query(); ?>

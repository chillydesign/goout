

<div class="container">
    <div class="latest_articles">
        <div class="row">
            <?php $latest = new WP_Query(array('post_type' => 'post',   'posts_per_page' =>  5 )); $l = 0;  ?>
            <?php  if ($latest->have_posts() ) :  while($latest->have_posts()) : $latest->the_post();  ?>
                <?php $col_class = ( $l == 1 ) ? 'col-sm-8' : 'col-sm-4' ?>
                <div class="latest_article <?php echo $col_class; ?>">
                    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'large') : ''; ?>
                    <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php the_title(); ?>">
                    </a>
                    <div class="latest_text">
                        <p class="category"><?php the_category(', '); ?></p>
                        <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
                        <p> Ex doctrina est aliquip o aut nam quem aliqua fugiat. Se est quis ipsum quis, do duis incurreret consequat.De aute singulis iudicem ab eram cohaerescant laboris duis mentitum. Magna admodum cupidatat ad summis excepteur aut eiusmod. </p>
                    </div>
                </div>
                <?php if ($l == 1)  echo '</div><div class="row">'; ?>
            <?php  $l++; endwhile;endif;  ?>
            <?php wp_reset_query(); ?>
        </div>
    </div> <!-- END OF recommended_articles -->
</div>

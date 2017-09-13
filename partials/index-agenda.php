<?php


$evenements = new WP_Query(array(
    'post_type' => 'evenement',
    'posts_per_page' =>  6,
));
?>


<div class="index_agenda">
    <div class="container">
        <h5>Agenda</h5>
    </div>

<?php if ($evenements->have_posts() ) :  ?>

    <?php goout_posts_slider($evenements); ?>


<?php endif; wp_reset_query(); ?>

</div> <!-- END OF recommended_articles -->

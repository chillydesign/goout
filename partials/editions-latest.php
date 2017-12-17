<?php $edition_args = array(
    'post_type' => 'edition',
    'posts_per_page' =>  12,

);

$editions = new WP_Query( $edition_args );
$ed = 0;

?>

<div class="latest_editions">

    <div class="container">
        <h2>Numeros precedents</h2>


        <?php  if ($editions->have_posts() ) :  ?>
            <div class=" editions_index">
                <?php while($editions->have_posts()) : $editions->the_post();  ?>

                        <?php $issue_link = get_field('issue_link'); ?>
                        <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'small') : ''; ?>

                            <a class="edition"  target="_blank" href="<?php echo $issue_link; ?>">
                                <img class="" src="<?php echo $image; ?>" alt="<?php the_title(); ?>">
                            </a>


                    <?php  $ed++; endwhile; ?>
                </div>
            <?php endif;  ?>
            <?php wp_reset_query(); ?>


        </div>

    </div>

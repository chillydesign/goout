<?php


$evenements = new WP_Query(array(
    'post_type' => 'evenement',
    'posts_per_page' =>  8,
));
?>


<?php  if ($evenements->have_posts() ) :  ?>


    <div class="front_agenda">
        <div class="container">
            <h5>Agenda</h5>
            <?php get_template_part('partials/categories-list-events'); ?>

            <div class="row">


            <?php $ev = 0; while($evenements->have_posts()) : $evenements->the_post();   ?>
                    <?php $image = ( has_post_thumbnail()) ? thumbnail_of_post_url(get_the_ID(),  'medium') : ''; ?>
                    <?php $title = get_the_title(); ?>
                    <?php $date = get_field('date'); ?>
                    <?php $event_cat = get_the_terms( get_the_ID(), 'event_cat' ); ?>
                    <div class="latest_event col-sm-3">
                        <a  class="latest_image" href="<?php the_permalink(); ?>" style="background-image:url('<?php echo $image; ?>');" title="<?php echo $title;; ?>">

                            <div class="latest_text">
                                <?php if(  $event_cat && sizeof($event_cat) > 0 ): ?>
                                     <p class="category"><?php echo $event_cat[0]->name; ?></p>
                                 <?php endif; ?>
                                 <div class="latest_text_inner">
                                 <?php if  ($date ): ?>
                                     <p class="date"><?php echo $date; ?></p>
                                 <?php endif; ?>
                                <h2><?php echo $title; ?></h2>
                                </div>
                            </div>

                        </a>

                    </div>

                    <?php if ($ev % 4 == 3) echo '</div><!-- END OF ROW --> <div class="row">'; ?>

            <?php $ev++; endwhile; ?>

            </div><!-- END OF ROW -->

        </div>




    </div>
<?php endif; ?>

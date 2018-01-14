<?php get_header(); ?>
<?php  $posts_array =  convert_posts_to_strings();  ?>
<?php $showing_focus_articles  = get_query_var('focus') =='focus'; ?>

<div class="container">
<h1 class="fancy_title">
  <?php if( $showing_focus_articles  ){?>
        <em><strong>Focale ajustée</strong></em> : les <em><strong>Interviews</strong></em>, <em><strong>coups</strong></em> de <em><strong>cœur</strong></em>, <em><strong>reportages</strong></em> et <em><strong>focus</strong></em> de <em><strong>Go Out</strong></em>!
  <?php } else { ?>
    <strong><em>Nos articles</em></strong> sur <strong><em>l'art, les expos, la danse, le cinéma, la littérature</em></strong> et <strong><em>le théâtre</em></strong> à <strong><em>Genève</em></strong> et <strong><em>ailleurs</em></strong>
  <?php } ?>
</h1>
<?php

if ($showing_focus_articles == false): // dont show categoeis on focus page
get_template_part('partials/categories-list');
endif;
?>
</div><!--  END OF CONTAINER -->


<div class="container">
<?php get_template_part('partials/index', 'first-articles');  // also includes artist of the month  ?>
</div><!--  END OF CONTAINER -->

<?php // get_template_part('partials/index', 'agenda');   ?>


<div class="container">
<?php get_template_part('partials/index', 'more-articles'); ?>
<?php get_template_part('pagination'); ?>
</div><!--  END OF CONTAINER -->




<?php get_footer(); ?>

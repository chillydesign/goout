<?php get_header(); ?>


		<div class="container">

			<h1><?php  echo get_the_author() ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>




<?php get_footer(); ?>

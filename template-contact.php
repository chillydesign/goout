<?php /* Template Name: Contact */ get_header(); ?>


<?php $tdu = get_template_directory_uri(); ?>

<div class="container">
    <h1><?php the_title(); ?></h1>
</div>


<div id="map_container"></div>
<script type='text/javascript' src='//maps.google.com/maps/api/js?key=AIzaSyC-BDJZU14ltCrYRPei33a4ZSQfJqRbxNY&#038;ver=4.8.1'></script>
<script>
    var lat = 46.2016553;
    var lng = 6.1390332;
</script>

<div class="container" id="contact_details">

    <div class="row">

        <div class="col-sm-4 col-sm-push-2">


            <img src="<?php echo $tdu;?>/img/pencil.png" alt="">

            <h4>Nous contacter</h4>
            <p>41 22 328 10 90 <br>
            <a href="mailto:info@gooutmag.ch">info@gooutmag.ch</a></p>




        </div>
        <div class="col-sm-4 col-sm-push-2">
            <img src="<?php echo $tdu;?>/img/marker_black.png" alt="">
            <h4>L’Arcade</h4>
            <p>16, rue du Diorama <br>
            1204 Genève</p>
        </div>
    </div>
</div>

<div id="contact_form_container">
<div class="container">

<?php echo do_shortcode('[contact-form-7 id="3711" title="Contact form 1"]'); ?>


</div>
</div>

<?php get_footer(); ?>

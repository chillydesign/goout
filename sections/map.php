<?php $location =  get_sub_field('location'); ?>
<?php $titre =  get_sub_field('titre'); ?>

<?php if ($location != ''): ?>

    <div class="container">
        <div class="row">

            <div class="col-sm-8 col-sm-push-4">
                <?php if ($titre != '') : ?>
                    <h3><?php echo $titre; ?></h3>
                <?php endif; ?>
                <div style="height:400px" id="map_container"></div>
                <script type='text/javascript' src='//maps.google.com/maps/api/js?key=AIzaSyAxQfqRqtPLAW4BolFMCxTiv9y--R8CXdU&#038;ver=4.8.1'></script>
                <script> var  place_location = "<?php echo  $location; ?>";</script>
            </div>
        </div>
    </div>
<?php endif; ?>

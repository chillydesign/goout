<?php /* Template Name: Abonnement */ get_header(); ?>



<?php if (have_posts()): while (have_posts()) : the_post(); ?>


    <div class="container">

        <h1><em><?php the_title(); ?></em></h1>
    </div>
    <div id="dont_show_subscription_button">
        <?php get_template_part('partials/front', 'latest-edition' ); ?>
    </div>


    <div class="container">

        <?php if (isset($_GET['success'])) : ?>
            <p class="success">Merci!</p>
        <?php endif; ?>

        <h3>JE M'ABONNE</h3>

        <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">


            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <label class=" abonne_label">
                        <span>Le Sympathique</span><span class="subscription_price">50 chf</span>
                        <input type="radio" name="subscription_type" value="sympathetique" />
                    </label>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label class="abonne_label">
                        <span>Le Tonique</span><span class="subscription_price">100 chf</span>
                        <input type="radio" name="subscription_type" value="tonique" />
                    </label>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label class="abonne_label">
                        <span>Le Sublime</span><span class="subscription_price">250 chf</span>
                        <input type="radio" name="subscription_type" value="sublime" />
                    </label>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label class="abonne_label">
                        <span>Le Paradise</span><span class="subscription_price">1000 chf</span>
                        <input type="radio" name="subscription_type" value="paradise" />
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-9">




                    <div class="row">
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="last_name" id="last_name" placeholder="Nom"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="first_name" id="first_name" placeholder="Prénom"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="phone" id="phone" placeholder="Téléphone"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="email" id="email" placeholder="Email"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="field"><input type="text" name="road" id="road" placeholder="Rue, N°"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="postcode" id="postcode" placeholder="Code postal"></div>
                        </div>
                        <div class="col-sm-3">
                            <div class="field"><input type="text" name="town" id="town" placeholder="Ville"></div>
                        </div>
                    </div>

                    <div class="field textarea_field">    <textarea name="message" id="message" placeholder="Message"></textarea></div>
                </div>


                <div class="col-sm-3">
                    <p>Vous allez adorer recevoir le magazine chaque debut de mois pour faire vos choix de sorties. Alors abonnez - vous selon votre humeur du moment. Soutenez go</p>

                    <div class="field">
                        <input type="hidden" name="action" value="abonne_form">
                        <input type="submit" value="Je m'incris" name="submit_abonne" />
                    </div>

                </div>
            </div>
        </form>

    </div>

    <?php get_template_part('partials/editions', 'latest' ); ?>





<?php endwhile; ?>
<?php else: ?>

    <article class="container">
        <h2><?php _e( 'Sorry, nothing to display.', 'webfactor' ); ?></h2>
    </article>

<?php endif; ?>




<?php get_footer(); ?>

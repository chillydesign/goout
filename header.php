<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond:400,400i,700,700i" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php  echo $site_description = get_bloginfo('description'); ?>">

        <?php wp_head(); ?>

        <?php $smp = social_meta_properties(); ?>
      	<!-- Open Graph -->
      	<meta property="og:url" content="<?php echo $smp->url; ?>">
      	<meta property="og:type" content="article" />
      	<meta property="og:site_name" content="Go Out! Magazine"/>
      	<meta property="og:title" content="<?php echo $smp->title; ?>">
      	<meta property="og:description" content="<?php echo $smp->description; ?>">
      	<meta property="og:img" content="<?php echo $smp->image; ?>">
      	<meta property="og:image" content="<?php echo $smp->image; ?>">
      	<meta property="fb:admins" content="286502748099458" />

      	<!-- TWITTER -->
      	<meta name="twitter:card" value="<?php echo $smp->description; ?>">
      	<meta name="twitter:title" content="<?php echo $smp->title; ?>">
      	<meta name="twitter:description" content="<?php echo $smp->description; ?>">
      	<meta name="twitter:image" content="<?php echo $smp->image; ?>">
      	<!-- GOOGLE -->
      	<meta itemprop="name" content="<?php echo $smp->title; ?>">
      	<meta itemprop="description" content="<?php echo $smp->description; ?>">
      	<meta itemprop="image" content="<?php echo $smp->image; ?>">


    </head>
    <body <?php body_class(); ?>>


<?php if (is_front_page() ): ?>
    <?php get_template_part('partials/front', 'edition-cover'); ?>
<?php endif; ?>

<nav id="navigation_menu" role="navigation">
    <a href="#" class="menu_button" id="close_menu_button" >Close</a>
    <ul>
        <?php chilly_nav('primary-navigation'); ?>
    </ul>
</nav>

<div class="pushydiv"> <!-- DIV TO BE PUSHED WHEN MENU OPENS -->

        <div class="container">
            <header class="header"  id="header">
                <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
                <a href="#"  class="menu_button open_menu_button" >Menu</a>
                <p id="slogan"><?php echo $site_description; ?></p>
            </header>
        </div>




        <header class="header "  id="secondary_header">

            <a href="<?php echo home_url(); ?>" class="branding"><?php bloginfo('name'); ?></a>
            <a href="#"  class="menu_button open_menu_button" >Menu</a>

        </header>

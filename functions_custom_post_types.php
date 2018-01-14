<?php

add_action('init', 'create_custom_post_types'); // Add our HTML5 Blank Custom Post Type


function create_custom_post_types() {


  $labels_news_cat = array(
      'name'                       => 'Catégories',
      'singular_name'              => 'Catégorie',
      'menu_name'                  => 'Catégorie',
      'all_items'                  => 'Toutes les Catégories',
      'parent_item'                => 'Catégorie parente',
      'parent_item_colon'          => 'Catégorie parente:',
      'new_item_name'              => 'Nom de la nouvelle categorie',
      'add_new_item'               => 'Ajouter une categorie',
      'edit_item'                  => 'Modifier categorie',
      'update_item'                => 'Mettre à jur la categorie',
      'separate_items_with_commas' => 'Separer les categories avec des virgules',
      'search_items'               => 'Chercher dans les categories',
      'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
      'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
  );
  $args_news_cat = array(
      'labels'                     => $labels_news_cat,
      'hierarchical'               => true,
      'public'                     => true,
      'show_ui'                    => true,
      'show_admin_column'          => true,
      'show_in_nav_menus'          => true,
      'show_tagcloud'              => false,
  );
  register_taxonomy( 'news_cat', array( 'news' ), $args_news_cat );


        register_post_type('news', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('News', 'html5blank'), // Rename these to suit
                'singular_name' => __('News', 'html5blank'),
                'add_new' => __('Ajouter', 'html5blank'),
                'add_new_item' => __('Add New News', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit News', 'html5blank'),
                'new_item' => __('New News', 'html5blank'),
                'view' => __('View News', 'html5blank'),
                'view_item' => __('View News', 'html5blank'),
                'search_items' => __('Search News', 'html5blank'),
                'not_found' => __('No News found', 'html5blank'),
                'not_found_in_trash' => __('No News found in Trash', 'html5blank')
            ),
            'public' => true,
            'exclude_from_search' => false,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail',
                'excerpt'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(
                'news_cat'
            ) // Add Category and Post Tags support

        ));


    register_post_type('escapade', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Escapades', 'html5blank'), // Rename these to suit
            'singular_name' => __('Escapade', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Escapade', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Escapade', 'html5blank'),
            'new_item' => __('New Escapade', 'html5blank'),
            'view' => __('View Escapade', 'html5blank'),
            'view_item' => __('View Escapade', 'html5blank'),
            'search_items' => __('Search Escapade', 'html5blank'),
            'not_found' => __('No Escapades found', 'html5blank'),
            'not_found_in_trash' => __('No Escapade found in Trash', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => false,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));






    register_post_type('evenement', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Evenements', 'html5blank'), // Rename these to suit
            'singular_name' => __('Evenement', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Evenement', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Evenement', 'html5blank'),
            'new_item' => __('New Evenement', 'html5blank'),
            'view' => __('View Evenement', 'html5blank'),
            'view_item' => __('View Evenement', 'html5blank'),
            'search_items' => __('Search Evenement', 'html5blank'),
            'not_found' => __('No Evenements found', 'html5blank'),
            'not_found_in_trash' => __('No Evenement found in Trash', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => false,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));

    $labels_event_cat = array(
        'name'                       => 'Catégories',
        'singular_name'              => 'Catégorie',
        'menu_name'                  => 'Catégorie',
        'all_items'                  => 'Toutes les Catégories',
        'parent_item'                => 'Catégorie parente',
        'parent_item_colon'          => 'Catégorie parente:',
        'new_item_name'              => 'Nom de la nouvelle categorie',
        'add_new_item'               => 'Ajouter une categorie',
        'edit_item'                  => 'Modifier categorie',
        'update_item'                => 'Mettre à jur la categorie',
        'separate_items_with_commas' => 'Separer les categories avec des virgules',
        'search_items'               => 'Chercher dans les categories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
        'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
    );
    $args_event_cat = array(
        'labels'                     => $labels_event_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'event_cat', array( 'evenement' ), $args_event_cat );


    $labels_partner_cat = array(
        'name'                       => 'Catégories',
        'singular_name'              => 'Catégorie',
        'menu_name'                  => 'Catégorie',
        'all_items'                  => 'Toutes les Catégories',
        'parent_item'                => 'Catégorie parente',
        'parent_item_colon'          => 'Catégorie parente:',
        'new_item_name'              => 'Nom de la nouvelle categorie',
        'add_new_item'               => 'Ajouter une categorie',
        'edit_item'                  => 'Modifier categorie',
        'update_item'                => 'Mettre à jur la categorie',
        'separate_items_with_commas' => 'Separer les categories avec des virgules',
        'search_items'               => 'Chercher dans les categories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
        'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
    );
    $args_partner_cat = array(
        'labels'                     => $labels_partner_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'partner_cat', array( 'partenaire' ), $args_partner_cat );


    register_post_type('partenaire', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Partenaires', 'html5blank'), // Rename these to suit
            'singular_name' => __('Partenaire', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Partenaire', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Partenaire', 'html5blank'),
            'new_item' => __('New Partenaire', 'html5blank'),
            'view' => __('View Partenaire', 'html5blank'),
            'view_item' => __('View Partenaire', 'html5blank'),
            'search_items' => __('Search Partenaire', 'html5blank'),
            'not_found' => __('No Partenaires found', 'html5blank'),
            'not_found_in_trash' => __('No Partenaire found in Trash', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'partner_cat'
        ) // Add Category and Post Tags support
    ));



        register_post_type('cityguidearticle', // Register Custom Post Type
        array(
            'labels' => array(
                'name' => __('CityGuide Articles', 'html5blank'), // Rename these to suit
                'singular_name' => __('CityGuide Article', 'html5blank'),
                'add_new' => __('Ajouter', 'html5blank'),
                'add_new_item' => __('Add New CityGuide Article', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit CityGuide Article', 'html5blank'),
                'new_item' => __('New CityGuide Article', 'html5blank'),
                'view' => __('View CityGuide Article', 'html5blank'),
                'view_item' => __('View CityGuide Article', 'html5blank'),
                'search_items' => __('Search CityGuide Article', 'html5blank'),
                'not_found' => __('No CityGuide Articles found', 'html5blank'),
                'not_found_in_trash' => __('No CityGuide Article found in Trash', 'html5blank')
            ),
            'public' => true,
            'exclude_from_search' => true,
            'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
            'has_archive' => true,
            'supports' => array(
                'title',
                'thumbnail',
                'editor',
                'excerpt'
            ), // Go to Dashboard Custom HTML5 Blank post for supports
            'can_export' => true, // Allows export in Tools > Export
            'taxonomies' => array(

            ) // Add Category and Post Tags support
        ));


    register_post_type('cityguide', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('City Guides', 'html5blank'), // Rename these to suit
            'singular_name' => __('City Guide', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New City Guide', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit City Guide', 'html5blank'),
            'new_item' => __('New City Guide', 'html5blank'),
            'view' => __('View City Guide', 'html5blank'),
            'view_item' => __('View City Guide', 'html5blank'),
            'search_items' => __('Search City Guide', 'html5blank'),
            'not_found' => __('No City Guides found', 'html5blank'),
            'not_found_in_trash' => __('No City Guide found in Trash', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => false,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));



    $labels_coolspot_tag = array(
        'name'                       => 'Etiquettes',
        'singular_name'              => 'Etiquette',
        'menu_name'                  => 'Etiquette',
        'all_items'                  => 'Toutes les Etiquettes',
        'parent_item'                => 'Etiquette parente',
        'parent_item_colon'          => 'Etiquette parente:',
        'new_item_name'              => 'Nom de la nouvelle étiquette',
        'add_new_item'               => 'Ajouter une étiquette',
        'edit_item'                  => 'Modifier étiquette',
        'update_item'                => 'Mettre à jur la étiquette',
        'separate_items_with_commas' => 'Separer les étiquettes avec des virgules',
        'search_items'               => 'Chercher dans les étiquettes',
        'add_or_remove_items'        => 'Ajouter ou supprimer des étiquettes',
        'choose_from_most_used'      => 'Choisir parmi les étiquettes les plus utilisées',
    );
    $args_coolspot_tag = array(
        'labels'                     => $labels_coolspot_tag,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'coolspot_tag', array( 'coolspot' ), $args_coolspot_tag );

    $labels_coolspot_cat = array(
        'name'                       => 'Catégories',
        'singular_name'              => 'Catégorie',
        'menu_name'                  => 'Catégorie',
        'all_items'                  => 'Toutes les Catégories',
        'parent_item'                => 'Catégorie parente',
        'parent_item_colon'          => 'Catégorie parente:',
        'new_item_name'              => 'Nom de la nouvelle categorie',
        'add_new_item'               => 'Ajouter une categorie',
        'edit_item'                  => 'Modifier categorie',
        'update_item'                => 'Mettre à jur la categorie',
        'separate_items_with_commas' => 'Separer les categories avec des virgules',
        'search_items'               => 'Chercher dans les categories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
        'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
    );
    $args_coolspot_cat = array(
        'labels'                     => $labels_coolspot_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'coolspot_cat', array( 'coolspot' ), $args_coolspot_cat );

    register_post_type('coolspot', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Cool Spots', 'html5blank'), // Rename these to suit
            'singular_name' => __('Cool Spot', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Cool Spot', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Cool Spot', 'html5blank'),
            'new_item' => __('New Cool Spot', 'html5blank'),
            'view' => __('View Cool Spot', 'html5blank'),
            'view_item' => __('View Cool Spot', 'html5blank'),
            'search_items' => __('Search Cool Spots', 'html5blank'),
            'not_found' => __('No Cool Spots found', 'html5blank'),
            'not_found_in_trash' => __('No Cool Spots found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));



            $labels_coolthing_cat = array(
                'name'                       => 'Catégories',
                'singular_name'              => 'Catégorie',
                'menu_name'                  => 'Catégorie',
                'all_items'                  => 'Toutes les Catégories',
                'parent_item'                => 'Catégorie parente',
                'parent_item_colon'          => 'Catégorie parente:',
                'new_item_name'              => 'Nom de la nouvelle categorie',
                'add_new_item'               => 'Ajouter une categorie',
                'edit_item'                  => 'Modifier categorie',
                'update_item'                => 'Mettre à jur la categorie',
                'separate_items_with_commas' => 'Separer les categories avec des virgules',
                'search_items'               => 'Chercher dans les categories',
                'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
                'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
            );
            $args_coolthing_cat = array(
                'labels'                     => $labels_coolthing_cat,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => false,
            );
            register_taxonomy( 'coolthing_cat', array( 'coolthing' ), $args_coolthing_cat );

            register_post_type('coolthing', // Register Custom Post Type
            array(
                'labels' => array(
                    'name' => __('Cool Things', 'html5blank'), // Rename these to suit
                    'singular_name' => __('Cool Thing', 'html5blank'),
                    'add_new' => __('Ajouter', 'html5blank'),
                    'add_new_item' => __('Add New Cool Thing', 'html5blank'),
                    'edit' => __('Edit', 'html5blank'),
                    'edit_item' => __('Edit Cool Thing', 'html5blank'),
                    'new_item' => __('New Cool Thing', 'html5blank'),
                    'view' => __('View Cool Thing', 'html5blank'),
                    'view_item' => __('View Cool Thing', 'html5blank'),
                    'search_items' => __('Search Cool Thing', 'html5blank'),
                    'not_found' => __('No Cool Things found', 'html5blank'),
                    'not_found_in_trash' => __('No Cool Thing found in Trash', 'html5blank')
                ),
                'public' => true,
                'exclude_from_search' => false,
                'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'thumbnail'
                ), // Go to Dashboard Custom HTML5 Blank post for supports
                'can_export' => true, // Allows export in Tools > Export
                'taxonomies' => array(
                ) // Add Category and Post Tags support
            ));


    register_post_type('publicite', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Publicités', 'html5blank'), // Rename these to suit
            'singular_name' => __('Publicité', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Publicité', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Publicité', 'html5blank'),
            'new_item' => __('New Publicité', 'html5blank'),
            'view' => __('View Publicité', 'html5blank'),
            'view_item' => __('View Publicité', 'html5blank'),
            'search_items' => __('Search Publicités', 'html5blank'),
            'not_found' => __('No Publicités found', 'html5blank'),
            'not_found_in_trash' => __('No Publicités found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));


    register_post_type('edition', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Éditions', 'html5blank'), // Rename these to suit
            'singular_name' => __('Édition', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Édition', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Édition', 'html5blank'),
            'new_item' => __('New Édition', 'html5blank'),
            'view' => __('View Édition', 'html5blank'),
            'view_item' => __('View Édition', 'html5blank'),
            'search_items' => __('Search Éditions', 'html5blank'),
            'not_found' => __('No Éditions found', 'html5blank'),
            'not_found_in_trash' => __('No Éditions found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'excerpt',
            'thumbnail',
            'editor'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));


    register_post_type('artistofthemonth', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Artiste du mois', 'html5blank'), // Rename these to suit
            'singular_name' => __('Artiste du mois', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Artiste du mois', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Artiste du mois', 'html5blank'),
            'new_item' => __('New Artiste du mois', 'html5blank'),
            'view' => __('View Artiste du mois', 'html5blank'),
            'view_item' => __('View Artiste du mois', 'html5blank'),
            'search_items' => __('Search Artiste du mois', 'html5blank'),
            'not_found' => __('No Artiste du mois found', 'html5blank'),
            'not_found_in_trash' => __('No Artiste du mois found in Trash', 'html5blank')
        ),
        'public' => true,
        'exclude_from_search' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
        ) // Add Category and Post Tags support
    ));



    register_post_type('video', // Register Custom Post Type
    array(
        'labels' => array(
            'name' => __('Videos', 'html5blank'), // Rename these to suit
            'singular_name' => __('Video', 'html5blank'),
            'add_new' => __('Ajouter', 'html5blank'),
            'add_new_item' => __('Add New Video', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Video', 'html5blank'),
            'new_item' => __('New Video', 'html5blank'),
            'view' => __('View Video', 'html5blank'),
            'view_item' => __('View Video', 'html5blank'),
            'search_items' => __('Search Video', 'html5blank'),
            'not_found' => __('No Videos found', 'html5blank'),
            'not_found_in_trash' => __('No Video found in Trash', 'html5blank')
        ),
        'exclude_from_search' => true,
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(

        ) // Add Category and Post Tags support
    ));

};

?>

<?php

add_action('init', 'create_custom_post_types'); // Add our HTML5 Blank Custom Post Type


function create_custom_post_types() {




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
                    'thumbnail'
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
            'name'                       => 'Categories',
            'singular_name'              => 'Categorie',
            'menu_name'                  => 'Categorie',
            'all_items'                  => 'Toutes les Categories',
            'parent_item'                => 'Categorie parente',
            'parent_item_colon'          => 'Categorie parente:',
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
        'name'                       => 'Categories',
        'singular_name'              => 'Categorie',
        'menu_name'                  => 'Categorie',
        'all_items'                  => 'Toutes les Categories',
        'parent_item'                => 'Categorie parente',
        'parent_item_colon'          => 'Categorie parente:',
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



    $labels_hotspot_cat = array(
        'name'                       => 'Categories',
        'singular_name'              => 'Categorie',
        'menu_name'                  => 'Categorie',
        'all_items'                  => 'Toutes les Categories',
        'parent_item'                => 'Categorie parente',
        'parent_item_colon'          => 'Categorie parente:',
        'new_item_name'              => 'Nom de la nouvelle categorie',
        'add_new_item'               => 'Ajouter une categorie',
        'edit_item'                  => 'Modifier categorie',
        'update_item'                => 'Mettre à jur la categorie',
        'separate_items_with_commas' => 'Separer les categories avec des virgules',
        'search_items'               => 'Chercher dans les categories',
        'add_or_remove_items'        => 'Ajouter ou supprimer des categories',
        'choose_from_most_used'      => 'Choisir parmi les categories les plus utilisées',
    );
    $args_hotspot_cat = array(
        'labels'                     => $labels_hotspot_cat,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
    );
    register_taxonomy( 'hotspot_cat', array( 'hotspot' ), $args_hotspot_cat );

        register_post_type('hotspot', // Register Custom Post Type
            array(
            'labels' => array(
                'name' => __('Hot Spots', 'html5blank'), // Rename these to suit
                'singular_name' => __('Hot Spot', 'html5blank'),
                'add_new' => __('Ajouter', 'html5blank'),
                'add_new_item' => __('Add New Hot Spot', 'html5blank'),
                'edit' => __('Edit', 'html5blank'),
                'edit_item' => __('Edit Hot Spot', 'html5blank'),
                'new_item' => __('New Hot Spot', 'html5blank'),
                'view' => __('View Hot Spot', 'html5blank'),
                'view_item' => __('View Hot Spot', 'html5blank'),
                'search_items' => __('Search Hot Spots', 'html5blank'),
                'not_found' => __('No Hot Spots found', 'html5blank'),
                'not_found_in_trash' => __('No Hot Spots found in Trash', 'html5blank')
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

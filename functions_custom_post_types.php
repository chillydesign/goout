<?php

add_action('init', 'create_custom_post_types'); // Add our HTML5 Blank Custom Post Type


function create_custom_post_types() {

    register_post_type('partenaire', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Partenaires', 'html5blank'), // Rename these to suit
            'singular_name' => __('Partenaire', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
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
        ) // Add Category and Post Tags support
    ));

    register_post_type('edition', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Éditions', 'html5blank'), // Rename these to suit
            'singular_name' => __('Édition', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
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



        register_post_type('video', // Register Custom Post Type
            array(
            'labels' => array(
                'name' => __('Videos', 'html5blank'), // Rename these to suit
                'singular_name' => __('Video', 'html5blank'),
                'add_new' => __('Add New', 'html5blank'),
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

<?php
// POSTTYPE

add_action( 'init', 'ferieejendomme_create_posttype' );
function ferieejendomme_create_posttype() {

    // Kommissionsaftale
    register_post_type('ejendom', array('labels' => array(
            'name' => __('Ejendomme', 'ferieejendomme-domain'),
            'singular_name' => __('Ejendom', 'ferieejendomme-domain'),
            'add_new_item' => __('Tilfølj ny ejendom', 'ferieejendomme-domain'),
            'add_new' => __('Tilføj ny ejendom', 'ferieejendomme-domain'),
            'edit_item' => __('Ret ejendom', 'ferieejendomme-domain'),
            'view_item' => __('Se ejendom', 'ferieejendomme-domain'),
            'update_item' => __('Opdater ejendom', 'ferieejendomme-domain')
        ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-admin-home',
            'rewrite' => array('slug' => 'ejendom'),
            'supports' => array('title', 'thumbnail'),
    ));
}

function ferieejendomme_function() {
    ferieejendomme_create_posttype();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ferieejendomme_function' );

// Register Custom Taxonomy
function custom_taxonomy() {

    $labels = array(
        'name'                       => _x( 'Land', 'Taxonomy General Name', 'ferieejendomme-domain' ),
        'singular_name'              => _x( 'Land', 'Taxonomy Singular Name', 'ferieejendomme-domain' ),
        'menu_name'                  => __( 'Lande', 'ferieejendomme-domain' ),
        'all_items'                  => __( 'Alle lande', 'ferieejendomme-domain' ),
        'parent_item'                => __( 'Parent Item', 'ferieejendomme-domain' ),
        'parent_item_colon'          => __( 'Parent Item:', 'ferieejendomme-domain' ),
        'new_item_name'              => __( 'New Item Name', 'ferieejendomme-domain' ),
        'add_new_item'               => __( 'Tiføj nyt land', 'ferieejendomme-domain' ),
        'edit_item'                  => __( 'Ret land', 'ferieejendomme-domain' ),
        'update_item'                => __( 'Update land', 'ferieejendomme-domain' ),
        'view_item'                  => __( 'Se land', 'ferieejendomme-domain' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'ferieejendomme-domain' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'ferieejendomme-domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'ferieejendomme-domain' ),
        'popular_items'              => __( 'Popular Items', 'ferieejendomme-domain' ),
        'search_items'               => __( 'Søg land', 'ferieejendomme-domain' ),
        'not_found'                  => __( 'Not Found', 'ferieejendomme-domain' ),
        'no_terms'                   => __( 'No items', 'ferieejendomme-domain' ),
        'items_list'                 => __( 'Items list', 'ferieejendomme-domain' ),
        'items_list_navigation'      => __( 'Items list navigation', 'ferieejendomme-domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        "query_var"                  => true,
        "show_in_menu" => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite'                    => array('slug' => 'land'),
    );
    register_taxonomy( 'land', array( 'ejendom' ), $args );
}


add_action( 'init', 'custom_taxonomy', 2 );
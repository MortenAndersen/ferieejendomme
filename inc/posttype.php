<?php
// POSTTYPE

add_action( 'init', 'ferieejendomme_create_posttype' );
function ferieejendomme_create_posttype() {

    // Kommissionsaftale
    register_post_type('ejendom', array('labels' => array(
        'name' => __('Ejendom', 'ferieejendomme-domain'),
        'singular_name' => __('Ejendom', 'ferieejendomme-domain'),
        'add_new_item' => __('Tilfølj ny ejendom', 'ferieejendomme-domain'),
        'add_new' => __('Tilføj ny ejendom', 'ferieejendomme-domain'),
        'edit_item' => __('Ret ejendom', 'ferieejendomme-domain'),
        'view_item' => __('Se ejendom', 'ferieejendomme-domain'),
        'update_item' => __('Opdater ejendom', 'ferieejendomme-domain')
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-gallery',
        'supports' => array('title'),
        'exclude_from_search' => true,
        'rewrite' => array('slug' => 'ejendom'),
    ));
}

function ferieejendomme_function() {
    ferieejendomme_create_posttype();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'ferieejendomme_function' );
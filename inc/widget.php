<?php
function ferieejendomme_widgets_init() {

	// Sidebar
	register_sidebar(
		array(
			'name'          => __( 'Aside right', 'ferieejendomme-domain' ),
			'id'            => 'aside-right',
			'description'   => __( 'Vises i højre spalte (aside).', 'ferieejendomme-domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-right">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Aside right 2', 'ferieejendomme-domain' ),
			'id'            => 'aside-right-bottom',
			'description'   => __( 'Vises i højre spalte (aside) under tekstbokse.', 'ferieejendomme-domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-right">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Sidefod', 'ferieejendomme-domain' ),
			'id'            => 'footer',
			'description'   => __( 'Sidefod', 'ferieejendomme-domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-footer flex-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Post Sidefod', 'ferieejendomme-domain' ),
			'id'            => 'postfooter',
			'description'   => __( 'Post Sidefod', 'ferieejendomme-domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-post-footer">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Forside billede', 'ferieejendomme-domain' ),
			'id'            => 'frontimg',
			'description'   => __( 'Billede på forsiden', 'ferieejendomme-domain' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s widget-front-img">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="screen-reader-text">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Banner', 'ferieejendomme-domain' ),
			'id'            => 'banner',
			'description'   => __( 'Billede på forsiden', 'ferieejendomme-domain' ),
			'before_widget' => '<div class="banner">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="screen-reader-text">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Formular', 'ferieejendomme-domain' ),
			'id'            => 'formular',
			'description'   => __( 'Formular på ejendom', 'ferieejendomme-domain' ),
			'before_widget' => '<div class="formular">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}

add_action( 'widgets_init', 'ferieejendomme_widgets_init' );
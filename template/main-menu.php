<?php
if ( has_nav_menu( 'main-menu' ) ) :

	$main_nav = array(
		'theme_location' => 'main-menu',
		'container' =>  false,
	);
	echo '<nav class="main-menu">';
		wp_nav_menu( $main_nav );
	echo '</nav>';

endif;
?>
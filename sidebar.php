<aside>
<?php
	dynamic_sidebar( 'aside-right' );


	if (is_singular( 'ejendom' )) {
		ferieejedomme_ejendom_list_aside();
	}

	ferieejedomme_right_content();

	dynamic_sidebar( 'aside-right-bottom' );
?>
</aside>
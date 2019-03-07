<?php
function ferieejedomme_right_content() {
	if( have_rows('tekstbokse') ):

    while ( have_rows('tekstbokse') ) : the_row();

    	$style = strtolower( get_sub_field('tekstboks_style') );
    	$overskrift = get_sub_field('overskrift');

    	echo '<div class="aside-text-box ' . $style . '">';
    	if ( $overskrift) {
    		echo '<h5>' . $overskrift . '</h5>';
    	}
        the_sub_field('tekstboks');
        echo '</div>';

    endwhile;

else :

    // no rows found

endif;
}
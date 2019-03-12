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

// Ejendom

function ferieejedomme_ejendom_list() {
    echo '<div class="box content">';
    the_archive_title( '<h1>', '</h1>' );
    the_archive_description( '<div class="taxonomy-description">', '</div>' );
    echo '<ul class="ejendomme-list">';
    if(have_posts()) : while(have_posts()) : the_post();
        $adresse = get_field('adresse');
        $data = get_field('data');

        echo '<li>';
        echo '<a href="' . get_the_permalink() . '">';
            the_post_thumbnail('small-image');
            the_title('<h6>', '</h6>');
            echo $adresse['vej'] . ' ' . $adresse['vej_nr'] . ', ' . $adresse['post_nr'] . ' ' . $adresse['by'];
            echo '<br />';
            //echo $data['pris'];
            echo 'grundareal: ' . $data['grundareal'] . ' m<sup>2</sup></span>';
            echo ' / Boligareal: ' . $data['boligareal'] . ' m<sup>2</sup></span>';
            echo ' / Rum: ' . $data['antal_rum'];

        echo '</a>';
        echo '</li>';
endwhile; else :
    echo '<p>Ingen ejendomme endnu</p>';
 endif;
echo '</ul>';
posts_nav_link();
echo '</div>';
}


function ferieejedomme_the_post_thumbnail() {
    $caption = get_the_post_thumbnail_caption();
    if ( has_post_thumbnail() ) {
        echo '<div class="content-images">';
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
        echo '<a href="'.esc_url($featured_img_url).'" rel="data-lightbox" data-lightbox="hus" data-title="' . get_the_title() . '">';
            the_post_thumbnail('large');
        echo '</a>';
        if(!empty($caption)) {
            echo '<div class="img-caption">' . $caption . '</div>';
        }
        echo '</div>';
    }
}
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

// Ejendom data (li element)

function ferieejedomme_ejendom_list_elements() {

    $adresse = get_field('adresse');
    $data = get_field('data');





        echo '<li>';
            echo '<a href="' . get_the_permalink() . '">';

                the_post_thumbnail('small-image');

                echo '<div class="text-data">';

                    the_title('<h6>', '</h6>');

                    if ( $adresse['vej'] || $adresse['post_nr'] || $adresse['by'] ) {
                        echo $adresse['vej'] . ', ' . $adresse['post_nr'] . ' ' . $adresse['by'];
                        echo '<br />';
                    }

                    if ( $data['grundareal'] ) {
                        echo 'grundareal: ' . $data['grundareal'] . ' m<sup>2</sup></span> / ';
                    }

                    if ( $data['boligareal'] ) {
                        echo 'Boligareal: ' . $data['boligareal'] . ' m<sup>2</sup></span> / ';
                    }

                    if ( $data['antal_rum'] ) {
                        echo 'Rum: ' . $data['antal_rum'];
                    }

                echo '</div>'; // end <div class="text-data">

                if ( $data['pris'] ) {
                    echo '<div class="andel-bar">';
                        $pris_tyve = $data['pris'] * .2;
                        echo '<span class="andel andel-tyve">20% = ';
                            echo number_format($pris_tyve,0,",",".") . ' ' . $data['valuta'];
                        echo '</span>';

                        $pris_femtyve = $data['pris'] * .25;
                        echo '<span class="andel andel-tyve">25% = ';
                            echo number_format($pris_femtyve,0,",",".") . ' ' . $data['valuta'];
                        echo '</span>';

                        $pris_tr = $data['pris'] / 3;
                        echo '<span class="andel andel-tyve">33% = ';
                            echo number_format($pris_tr,0,",",".") . ' ' . $data['valuta'];
                        echo '</span>';
                    echo '</div>';

                }

            echo '</a>';
        echo '</li>';
}

// Ejendomme generelle loop

function ferieejedomme_ejendom_list() {
    echo '<div class="box content">';
    the_archive_title( '<h1>', '</h1>' );
    the_archive_description( '<div class="taxonomy-description">', '</div>' );
    echo '<ul class="ejendomme-list">';
    if(have_posts()) : while(have_posts()) : the_post();

        ferieejedomme_ejendom_list_elements();

endwhile; else :
    echo '<p>Ingen ejendomme endnu</p>';
 endif;

echo '</ul>';

posts_nav_link();

echo '</div>';
wp_reset_query();
}


// Ejendomme forside loop

function ferieejedomme_ejendom_list_front() {
$loop = new WP_Query( array( 'post_type' => 'ejendom', 'posts_per_page' => 3) );
    echo '<ul class="ejendomme-list">';
    if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();

        ferieejedomme_ejendom_list_elements();

endwhile; else :
    echo '<p>Ingen ejendomme endnu</p>';
 endif;
echo '</ul>';
wp_reset_query();
}

// Ejendomme aside loop

function ferieejedomme_ejendom_list_aside() {

    global $post;
    $loop = new WP_Query( array( 'post_type' => 'ejendom', 'orderby'   => 'rand', 'posts_per_page' => 3, 'post__not_in' => array($post->ID) ) );

    echo '<h3>Se andre ejendomme:</h3>';
    echo '<ul class="ejendomme-list">';
    if($loop->have_posts()) : while($loop->have_posts()) : $loop->the_post();

        ferieejedomme_ejendom_list_elements();

endwhile; else :
    echo '<p>Ingen ejendomme endnu</p>';
 endif;
echo '</ul>';
wp_reset_query();
}

// Billeder på ejendom

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
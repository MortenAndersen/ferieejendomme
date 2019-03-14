<?php get_header(); ?>

<div class="box content">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php

// Image
ferieejedomme_the_post_thumbnail();

// WP normal
	the_title( '<h1>', '</h1>');

	if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile;
	endif;


// Lande term
	$terms = get_the_terms( $post->ID , 'land' );
	if ($terms > 0 ) {
echo '<div class="box">';
	echo '<ul class="terms design-list">';
	    foreach ( $terms as $term ) {
	        $term_link = get_term_link( $term, 'land' );
	            if( is_wp_error( $term_link ) ) continue;
	                echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';
	            }
	echo '</ul>';
echo '</div>';
}


// Adresse
$adresse = get_field('adresse');

if( $adresse ) {
	echo '<div class="box adresse-box">';
	echo '<h4>Adresse:</h4>';
	if ( $adresse['omrade'] ) {
		echo '<span class="adresse omraade">' . $adresse['omrade'] . '</span><br />';
	}
	if ( $adresse['vej'] ) {
		echo '<span class="adresse vej">' . $adresse['vej'] . '</span><br />';
	}
	if ( $adresse['post_nr'] ) {
		echo '<span class="adresse post-nr">' . $adresse['post_nr'] . '</span>';
	}
	if ( $adresse['by'] ) {
		echo ' <span class="adresse by">' . $adresse['by'] . '</span>';
	}
	echo '</div>';
}

// Data
$data = get_field('data');

if( $data ) {
	echo '<div class="box data-box">';
	echo '<h4>Data:</h4>';
	if ( $data['byggear'] ) {
		echo '<span class="data bygge-aar"><span class="label">Byggeår</span>: ' . $data['byggear'] . '</span>';
	}
	if ( $data['grundareal'] ) {
		echo '<span class="data grundareal"><span class="label">Grund</span>: ' . $data['grundareal'] . ' m<sup>2</sup></span>';
	}
	if ( $data['boligareal'] ) {
		echo ' <span class="data boligareal"><span class="label">Boligareal</span>: ' . $data['boligareal'] . ' m<sup>2</sup></span>';
	}
	if ( $data['antal_rum'] ) {
		echo '<span class="data antal-rum"><span class="label">Antal rum</span>: ' . $data['antal_rum'] . '</span>';
	}
	if ( $data['antal_sovepladser'] ) {
		echo '<span class="data antal-sovepladser"><span class="label">Antal sovepladser</span>: ' . $data['antal_sovepladser'] . '</span>';
	}

	if ( $data['pris'] ) {
		$tal = $data['pris'];
		$tyve = number_format($tal*.2, 0, ',', '.');
		$femtyve = number_format($tal*.25, 0, ',', '.');
		$tredje = number_format($tal/3, 0, ',', '.');

		$data['pris'] = number_format($data['pris'], 0, ',', '.');
		echo '<span class="data pris"><span class="label">Pris (samlet)</span>: ' . $data['pris'] . ' ' .$data['valuta'] . '</span>';

		echo '<br /><h4>Andel:</h4>';
		echo '<span class="data pris"><span class="label">Andel = 20%</span>: ' . $tyve . ' ' .$data['valuta'] . '</span>';
		echo '<span class="data pris"><span class="label">Andel = 25%</span>: ' . $femtyve . ' ' .$data['valuta'] . '</span>';
		echo '<span class="data pris"><span class="label">Andel = 1/3</span>: ' . $tredje . ' ' .$data['valuta'] . '</span>';
		echo '<span class="data"><em>Priseksempler på ejerandele.</em></span>';
	}

	echo '</div>';
}

// ejerandel
echo '<div class="box status-box">';
echo '<h4>Status:</h4>';
echo '<p>Nuværende interesse for ejendommen.</p>';
echo '<p>Antal familier: ' . get_field( 'familier' ) . '</p>';
echo '<p>Interesserede <em class="small-font">(procentvis andel)</em> <span class="forklaring int"></span><br />Ledig <em class="small-font">(procentvis andel)</em> <span class="forklaring led"></span></p>';

$rest = 100 - get_field( 'ejerandel' );
echo '<style>';
echo '.andel-barometer span.int-procent {width:' . get_field( 'ejerandel' ) . '%;}';
if ($rest == 100) {
	echo '.andel-barometer span.int-procent{display:none;}';
}
echo '.andel-barometer span.rest-procent {width:' . $rest . '%;}';
echo '</style>';

echo '<div class="andel-barometer"><span class="int-procent">' . get_field( 'ejerandel' ) . '% </span> <span class="rest-procent">' . $rest . '% </span> </div>';
echo '</div>';

// Link
$link = get_field('link_til_ejendomsmaegler');

	if( $link ) {
		echo '<a class="ejendomsmaelger-link" href="' . $link . '" target="_blank" rel="nofollow">Ejendomsmælger</a>';
	}

?>

	</article>
</div>

	<div class="box sidebar not-phone js-nav-toggle">
	 	<?php get_template_part( 'template/main-menu' ); ?>
  	</div>

	<div class="box sidebar2">
		<?php get_template_part( 'test' ); ?>
		<?php get_template_part( 'sidebar' ); ?>
	</div>

<?php get_footer(); ?>
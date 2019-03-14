


<?php

/*
$related = array(
    'tax_query' => array(
        array(
            'taxonomy' => 'land',
            'field' => 'slug',
            'terms' => the_terms( $post->ID, 'land'),

        )
    )
);
$related = new WP_Query( $related );
if( $related->have_posts() ) {
    while( $related->have_posts() ) {
        $related->the_post();
        the_title();
        echo '<br />';
    }
    wp_reset_postdata();
}
*/

?>



<?php




//Get array of terms
$terms = get_the_terms( $post->ID , 'land');
//Pluck out the IDs to get an array of IDS
$term_ids = wp_list_pluck($terms,'term_id');

//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
//Chose 'AND' if you want to query for posts with all terms
  $second_query = new WP_Query( array(
      'post_type' => 'ejendom',
      'tax_query' => array(
                    array(
                        'taxonomy' => 'land',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                     )),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in'=>array($post->ID)
   ) );

//Loop through posts and display...
    if($second_query->have_posts()) {
     while ($second_query->have_posts() ) : $second_query->the_post(); ?>
      <div class="single_related">
           <?php if (has_post_thumbnail()) { ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"> <?php the_post_thumbnail( 'related_sm', array('alt' => get_the_title()) ); ?> </a>
            <?php } else { ?>
                 <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
            <?php } ?>
       </div>
   <?php endwhile; wp_reset_query();
   }


   ?>

<?php
// kilde
// https://wordpress.stackexchange.com/questions/75112/query-related-posts-in-a-custom-post-type-by-a-custom-taxonomy
?>



<?php
var_dump( wp_get_object_terms( $id, 'land' ) );
?>
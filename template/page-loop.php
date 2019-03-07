<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="box content">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_title( '<h1>', '</h1>'); ?>
		<?php the_content(); ?>
		<?php if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif; ?>
	</article>
</div>
<?php endwhile; else : ?>
<div class="box content">
<article>
<h1>Ups - noget er forkert!</h1>
<p>Det ser ud som om, du har fanget os i en fejl, vi beklager meget.</p>
</article>
</div>
<?php endif; ?>
<?php get_header(); ?>

	<div class="box content">
		<?php dynamic_sidebar( 'frontimg' ); ?>
		<article>
			<?php the_title( '<h1>', '</h1>'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			<h2>Nye ejendomme</h2>
			<?php ferieejedomme_ejendom_list_front(); ?>
			<p><em>De tre senest tilføjede ejendomme.</em></p>
		</article>
	</div>

	<div class="box sidebar not-phone js-nav-toggle">
	 	<?php get_template_part( 'template/main-menu' ); ?>
  	</div>

	<div class="box sidebar2">
		<?php get_template_part( 'sidebar' ); ?>
	</div>

<?php get_footer(); ?>
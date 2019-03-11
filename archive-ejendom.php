<?php get_header(); ?>

	<?php ferieejedomme_ejendom_list(); ?>

	<div class="box sidebar not-phone js-nav-toggle">
	 	<?php get_template_part( 'template/main-menu' ); ?>
  	</div>

	<div class="box sidebar2">
		<?php get_template_part( 'sidebar' ); ?>
	</div>

<?php get_footer(); ?>
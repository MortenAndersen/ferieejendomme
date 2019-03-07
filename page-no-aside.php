<?php /*
		Template Name: No Aside
		*/
?>
<?php get_header(); ?>

	<?php get_template_part( 'template/page', 'loop' ); ?>

	<div class="box sidebar not-phone js-nav-toggle">
	 	<?php get_template_part( 'template/main-menu' ); ?>
  	</div>

<?php get_footer(); ?>
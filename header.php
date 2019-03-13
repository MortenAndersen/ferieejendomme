<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<div class="box header darklight-tb">
			<?php dynamic_sidebar( 'banner' ); ?>
		</div>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php bloginfo('title'); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
					aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<a class="navbar-brand" href="/">
					<?php 
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
					echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
					?>
				</a>
				<?php
                wp_nav_menu([
                    'theme_location'    => 'main-menu',
                    'depth'             => 2,
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'main-menu',
                    'menu_class'        => 'nav navbar-nav',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker(),
                ]);
			?>
				<?php if (is_active_sidebar('sidebar-header')): ?>
				<?php dynamic_sidebar('sidebar-header'); ?>
				<script language="javascript">
					const a = document.querySelector('#woocommerce-product-search-field-0');
					a.setAttribute('placeholder','Tìm kiếm tin tức');
				</script>
				<?php endif; ?>
			</div>
		</nav>
		
			<div id="slide">
				<?php masterslider(1); ?>
			</div>
	</header>
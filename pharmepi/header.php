<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/assets/lab_logo_t1_bk.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/lab_logo_t1_bk.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/lab_logo_t1_bk.png">
            <meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<div id="container" class="content-wrapper">

			<header class="header" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div id="inner-header" class="wrap cf header">
					<?php // to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> ?>
					<a href="<?php echo home_url(); ?>" rel="nofollow" class="header__home-link">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/lab_logo_t1_bk.png" class="header__image">
						<div class="header__home-name">
							<span class="weak">明治薬科大学</span>
							<h1 id="logo" class="homepage-name" itemscope itemtype="http://schema.org/Organization"><?php bloginfo('name'); ?></h1>
						</div>
					</a>

					<?php // if you'd like to use the site description you can un-comment it below ?>
					<?php // bloginfo('description'); ?>
					<nav role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement" class="nav-wrapper">
						<?php wp_nav_menu(array(
    					        //  'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					        'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					        'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					    	'theme_location' => 'main-nav',                 // where it's located in the theme
    					        'before' => '',                                 // before the menu
        			            'after' => '',                                  // after the menu
        			            'link_before' => '',                            // before each link
        			            'link_after' => '',                             // after each link
        			        	'depth' => 1,                                   // limit the depth of the nav
    					        'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
						<button type="button" onclick="location.href='https://www.my-pharm.ac.jp'" class="header-btn">明治薬科大学HP</button>
					</nav>
					
				</div>

			</header>

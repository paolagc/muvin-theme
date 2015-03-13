<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<title><?php bloginfo( 'title' ); ?></title>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?> 
	</head>
	<body>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			    <nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array(  'theme_location' => 'main'  , 'menu_class' => 'nav navbar-nav' ); ?>
				</nav>
				<div class="header_toggle_menu">
					<div class="open_toogle_menu">
						<i class="fa fa-bars"></i>
					</div>
					<div class="close_toogle_menu">
						<i class="fa fa-times"></i>
					</div>
				</div>
			  </div>
			</nav>
		</header>
		<div id="content">
			
		</div>
		<footer>
			<?php wp_nav_menu( array(  'theme_location' => 'footer' ) ); ?> 
		</footer>
		<?php wp_footer(); ?> 
	</body>
</html>
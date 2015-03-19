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
			    <?php 
			    	$args = array(
							'post_type' => 'page',
							'post_status' => 'publish'
						);
					$pages = get_pages($args);
					$cont =0;
					foreach ($pages as $page):
						$title = $page->post_title;
						$slug = $page->post_name;
			    ?>
			    	<li <?php if($cont == 0) print 'class="active"' ?> ><a href="#<?php print $slug?>"><?php print $title ?></a></li>
				<?php 
					$cont++;
					endforeach;
				 ?>
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
		<main id="content">
			<?php
				foreach ($pages as $page):
					$content = apply_filters('the_content', $page->post_content);
				    $title = $page->post_title;
				    $slug = $page->post_name;
			?>
			<section id="<?php print $slug?>">
				<h2><?php print $title ?></h2>
				<?php print $content ?>
			</section>
			<?php endforeach; ?>
		</main>
		<footer>
			<?php wp_nav_menu( array(  'theme_location' => 'footer' ) ); ?> 
		</footer>
		<?php wp_footer(); ?> 
	</body>
</html>
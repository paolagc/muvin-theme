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
					
					<div class="navbar-header">
			          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <i class="fa fa-bars"></i>
			          </button>
			          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'title' ); ?></a>
			        </div>
				
			        
					<?php wp_nav_menu( array(  'theme_location' => 'main'  , 'menu_class' => 'nav navbar-nav' ); ?>

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
			<div class="container">
				<div class="row">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div class="post">
								<div class="col-sm-6 col-xs-12">
									<?php the_post_thumbnail('grid6', array('class' => 'img-responsive gray-image')); ?>
									<div class="post-content row">
										<div class="date col-sm-2">
											<?php the_date('d M'); ?>
										</div>
										<div class="post-meta col-sm-10">
											<h2>
												<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
												<small>Posted by: <?php the_author_link(); ?></small>
											</h2>
										</div>
									</div>
									<?php the_excerpt(); ?> 
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</main>
		<footer>
			<?php wp_nav_menu( array(  'theme_location' => 'footer' ) ); ?> 
		</footer>
		<?php wp_footer(); ?> 
	</body>
</html>
<?php
/**
*
* @package
*/
?>

<div id="SiteMasthead">
	<header id="SiteHeader bcorr-header" role="banner">
		<div class="HeaderContainer">
			<div id="Header__ContactButtons">
				<a href="mailto:<?php echo get_theme_mod('CompanyEmail'); ?>"><i class="fa fa-envelope"></i>
					<span><?php echo get_theme_mod('CompanyEmail'); ?></span>
			</a>
				<a href="tel:<?php echo get_theme_mod('CompanyPhone'); ?>"><i class="fa fa-phone"></i>
					<span><?php echo get_theme_mod('CompanyPhone'); ?></span>
				</a>
			</div>

			<?php if ( get_theme_mod( 'CompanyLogo' ) ) : ?>
				<div class='site-logo'>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'CompanyLogo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				</div>
				<div class="alt_logo">
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <h1><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h1></a>
				</div>
			<?php endif; ?>

		</div>
	</header>

	<?php get_template_part('_modules/module', 'navigation'); ?>


</div>

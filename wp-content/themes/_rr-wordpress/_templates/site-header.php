<?php
/**
 * 
 * @package 
 */ 
?>

<div id="SiteMasthead">
	<header id="SiteHeader" role="banner">
		<div class="HeaderContainer">
			<div id="Header__ContactButtons">
				<!-- <a href="mailto:<?php echo get_theme_mod('CompanyEmail'); ?>"><i class="fa fa-envelope"></i></a> -->
				<a href="tel:<?php echo get_theme_mod('CompanyPhone'); ?>"><i class="fa fa-phone"></i><?php echo get_theme_mod('CompanyPhone'); ?></a>
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

	<?php if ( has_nav_menu('primary') ): ?>
		<nav id="SiteNavigation" class="SimpleResponsiveNav" role="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement">

			<div class="HeaderContainer">
				<a href="#0" id="MobileToggle"><i class="fa fa-bars"></i> MENU</a>
				<?php 
					wp_nav_menu( 
						array( 
							'theme_location' => 'primary',
							'items_wrap'      => '<ul id="PrimaryMenu" class="%2$s">%3$s</ul>',
							'container' => ''
						) 
					); 
				?>
			</div>
		</nav>	
	<?php endif; ?>

</div>



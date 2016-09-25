<?php
/**
 *Template Name: Sidebar Page Template
 * @package brandco
 */

get_header(); ?>

<main id="SiteMain" role="main">

<section id="IntroHeader" 
		<?php 
			
			if ( has_post_thumbnail() ) {
				echo 'style="background-image:url(' . BrandCo\Image( null, 'full' ) . ')"';
			}
		else{
				echo 'style="background-image:url(' . get_bloginfo('template_url') . '/_assets/images/light_bg.jpg)"'; 
			}
		?>
		>
		<div class="PageContainer">

			
		</div>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header id="PageHeader">
				<div class="PageContainer">
					<?php
						if ( get_field('hide_page_title') !== 'hide' ) {
							$title = ( get_field('replace_page_title') ) ? get_field('replace_page_title') : get_the_title();
							echo sprintf( '<h1 class="entry-title" itemprop="headline">%s</h1>', $title );
						}
					?>
				</div>
			</header>

			<section id="PageMain">
				<div class="PageContainer">
					<div class="entry-content ColumnPrimary" itemprop="mainContentOfPage">
						<?php the_content(); ?>					
					</div>
					<aside class="ColumnAside">
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
					</aside>
				</div>
			</section>

			<footer id="PageFooter">
				<div class="PageContainer"></div>
			</footer>
		</article>
	<?php endwhile; ?> 

</main>

<?php get_footer();?>


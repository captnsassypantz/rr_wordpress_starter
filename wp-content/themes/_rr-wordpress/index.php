<?php
/**
 * Blog Index
 * @package brandco
 */

get_header(); ?>

<main id="SiteMain" role="main">

<section id="IntroHeader"
		<?php
			if ( has_post_thumbnail() ) {
				echo 'style="background-image:url(' . BrandCo\Image( null, 'full' ) . ')"';
			}
		// else{
		// 		echo 'style="background-image:url(' . get_bloginfo('template_url') . '/_assets/images/light_bg.jpg)"';
		// 	}
		?>
		>
		<div class="PageContainer">


		</div>
	</section>

	<header id="PageHeader">
		<div class="PageContainer">
			<?php echo sprintf( '<h1 class="PageTitle">%s</h1>', Brandco\BlogTitle() ); ?>
		</div>
	</header>

	<section id="PageMain">
		<div class="PageContainer">

			<div class="ArchiveList ColumnPrimary">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('_templates/archive', 'post'); ?>
				<?php endwhile; ?>
			</div>

			<aside class="ColumnAside">
				<?php get_sidebar(); ?>
			</aside>

		</div>
	</section>

	<footer id="PageFooter">
		<div class="PageContainer">
			<?php BrandCo_Pagination(); ?>
		</div>
	</footer>

</main>

<?php get_footer();?>

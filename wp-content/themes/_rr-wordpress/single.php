<?php
/**
 * Single Post Template
 * @package brandco
 */

get_header(); ?>

<main id="SiteMain" role="main">

	<section id="IntroHeader"
		<?php
			if ( has_post_thumbnail() ) {
				echo 'style="background-image:url(' . BrandCo\Image( null, 'full' ) . ')"';
			}
			// else {
			// 	echo 'style="background-image:url(' . get_bloginfo('template_url') . '/_assets/images/light_bg.jpg)"'; 
			// }
		?>
		>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header id="PageHeader">
				<div class="PageContainer">
					<?php echo sprintf( '<h1 class="entry-title" itemprop="headline">%s</h1>', get_the_title() ); ?>
				</div>
			</header>

			<section id="PageMain">
				<div class="PageContainer">

					<div class="ColumnPrimary entry-content" itemprop="mainContentOfPage">
						<?php the_content(); ?>
					</div>

					<aside class="ColumnAside">
						<?php get_sidebar(); ?>
					</aside>

				</div>
			</section>

			<footer id="PageFooter">
				<div class="PageContainer">

					<?php if ( is_singular('post') ) : ?>
						<?php echo sprintf( '<span class="ArticleAuthor author vcard" itemprop="author">Written by %s. </span>', get_the_author() ); ?>
						<?php echo sprintf( '<span class="ArticleDate">Posted %s. </span>', BrandCo\Date() ); ?>
						<?php BrandCo\Categories(); ?>
						<?php BrandCo\Tags(', '); ?>
					<?php endif; ?>

					<?php BrandCo\ArchiveBackLink(); ?>

					<?php the_posts_navigation(); ?>

				</div>
			</footer>

		</article>

	<?php endwhile; ?>

</main>

<?php get_footer();?>

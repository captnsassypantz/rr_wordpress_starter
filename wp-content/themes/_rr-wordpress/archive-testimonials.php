<?php
/**
 * Special Index page for Testimonials
 * @package brandco
 */

get_header(); ?>

<main id="SiteMain" role="main">

	<!-- <section id="IntroHeader"
		<?php

				// echo 'style="background-image:url(/wp-content/uploads/2016/02/bg.jpg)"';

		?>
		>
		<div class="PageContainer">
		</div>
	</section> -->

	<header id="PageHeader">
		<div class="PageContainer">
			<?php echo sprintf( '<h1 class="PageTitle">%s</h1>', Brandco\PostTypeTitle() ); ?>
		</div>
	</header>

	<section id="PageMain">
		<div class="PageContainer">
			<?php

				$args = array('post_type' => 'testimonials', 'posts_per_page' => -1);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						the_title('<h3>', '</h3>');
						the_content();
						echo '<br>';
						if ( has_post_thumbnail() ) {
							echo '<img src=' . BrandCo\Image( null, 'medium' ) . '>';
						}
						echo '<br><br><hr>';
					}
				} else {}
				wp_reset_postdata();
			 ?>
		</div>

		</section>

		<footer id="PageFooter">
			<div class="PageContainer">
				<?php BrandCo_Pagination(); ?>
			</div>
		</footer>

	</main>

	<?php get_footer();?>

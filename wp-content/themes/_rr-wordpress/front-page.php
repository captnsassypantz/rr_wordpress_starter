<?php
/**
 * Front Page
 * @package brandco
 */

get_header(); ?>

<main id="SiteMain" role="main">
	<section id="IntroHeader">
		<?php $images = get_field('slider');

		// Slider
			if( $images ): ?>
			    <div id="slider" class="flexslider">
			        <ul class="slides">
			            <?php foreach( $images as $image ): ?>
			                <li style="background-image:url(<?php echo $image['url']; ?>);">
			                	<?php if ( $image['description'] ) : ?>
			                		<a href="<?php echo $image['description']; ?>"></a>
			                	<?php endif; ?>
			                   <!--  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> -->
			                </li>
			            <?php endforeach; ?>
			        </ul>
			    </div>
			<?php endif; ?>

		<!-- > -->
<!-- 		<div class="PageContainer">

		</div> -->
	</section>

	<div class="section group">
		<div class="col span_1_of_3">
			This is column 1
		</div>
		<div class="col span_1_of_3">
			This is column 2
		</div>
		<div class="col span_1_of_3">
			This is column 3
		</div>
	</div>

	<div class="section group">
		<div class="col span_1_of_6">
			This is column 1
		</div>
		<div class="col span_1_of_6">
			This is column 2
		</div>
		<div class="col span_1_of_6">
			This is column 3
		</div>
		<div class="col span_1_of_6">
			This is column 1
		</div>
		<div class="col span_1_of_6">
			This is column 2
		</div>
		<div class="col span_1_of_6">
			This is column 3
		</div>
	</div>

	<section id="Section__CTA1">
		<div class="PageContainer">
			<ul class="GridFours">

				<?php if( have_rows('call_to_actions') ): ?>
				<?php while( have_rows('call_to_actions') ): the_row();

					// vars
					$title = get_sub_field('title');
					$image = get_sub_field('picture');
					$link = get_sub_field('link');
					$hyperlink = get_sub_field('hyperlink'); ?>

					<li>
						<a href="<?php echo $link ?>">
						<div class="QuickLink__image" style="background-image: url(<?php echo $image; ?>)"></div>
						<div class="QuickLink__title"><?php echo $title; ?></div>
						</a>
					</li>

				<?php endwhile; ?>
				<?php endif; ?>

			</ul>
		</div>

	</section>

	<section id="Section__AboutAgent">
	<div class="HomepageTitle"></div>
		<div class="PageContainer">
			<div class="Section__center">
				<div id="AboutAgent__excerpt">

					<?php the_field('video_link') ?>
					<?php the_content(); ?>

				</div>
				<div id="AboutAgent__details">
					<br>
					<div class="buttons">
					<button><a href="<?php echo bloginfo('url') ?>/">Click here for full report</a></button>

					</div>
			</div>

		</div>


	</section>

	<section id="Section__testimonials">
		<div class="PageContainer">
		<i class="fa fa-quote-left" aria-hidden="true"></i>
		<i class="fa fa-quote-right" aria-hidden="true"></i>
			<?php
				$args = array('post_type' => 'testimonials', 'posts_per_page' => 1);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						the_content();

						the_title('<span> - ','</span>');
					}
				} else {}
				wp_reset_postdata();
		 ?>

		<button><a href="<?php bloginfo('url') ?>/testimonials">Raving fans</a></button>
		</div>
	</section>

	<section id="Section__blogreel">
			<div class="HomepageTitle">
				<h2>- From the Blog -</h2>
			</div>
		<div class="PageContainer">
		<ul class="GridThrees">
				<?php
				$args = array('orderby' => 'date', 'posts_per_page' => 3);
				$the_query = new WP_Query( $args );

				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
					echo '<li>';
						$the_query->the_post();
						if (has_post_thumbnail()) {
								the_post_thumbnail('medium');
						}
						else{
							echo '<img src="'. esc_url( get_theme_mod( 'CompanyLogo' )) .'">';
							// <img src='<?php echo esc_url( get_theme_mod( 'CompanyLogo' ) );
						}

						the_title('<h3>','</h3>');
						the_date('M, d, Y', '<span>', '</span>');
						the_excerpt();

						echo '<span><a href="' . get_permalink() . '">Read More</a></span>';
					echo '</li>';
					}
				} else {}
				wp_reset_postdata();
			 ?>
			</ul>
		<button><a href="<?php bloginfo('url') ?>/blog">View all blog posts</a></button>
		</div>
	</section>


	<section id="Section__SocialMedia">
		<div class="PageContainer" style="text-align:center;">
			<div class="SocialMedia__title">
				<span>Questions? We Can Help!</span>
				<button><a href="<?php echo bloginfo('url') ?>/contact">Contact Us</a></button>
				<div class="SocialMedia__links"><?php BrandCo\SocialMedia(); ?></div>

				<img src='<?php echo esc_url( get_theme_mod( 'CompanyLogoAlt' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
			</div>
		</div>
	</section>


</main>

<?php get_footer();?>

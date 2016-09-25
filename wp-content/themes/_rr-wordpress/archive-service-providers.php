<?php
/**
* Special Index page for Service Providers
* @package brandco
*/

get_header(); ?>

<main id="SiteMain" role="main">

	<!-- <section id="IntroHeader"
	<?php

	// if ( has_post_thumbnail() ) {
	// 	echo 'style="background-image:url(' . BrandCo\Image( null, 'full' ) . ')"';
	// }
	// else{
	//	echo 'style="background-image:url(/wp-content/uploads/2016/02/bg.jpg)"';
	// }
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

		<?php $positions = get_terms('service-providers', array("fields" => "names")); ?>
		<div class="ColumnAside">
			<h2>Services</h2>
			<?php
			for ( $myterm = 0; $myterm < count($positions); $myterm++) { ?>
				<h3><?php echo '<a href="#'. $positions[$myterm] .'">' . $positions[$myterm] . '</a>' ?></h3>
				<?php } ?>
			</div>

			<div class="ArchiveList ColumnPrimary">

				<?php for ( $myterm = 0; $myterm < count($positions); $myterm++) { ?>
					<h2><?php echo '<a name="'. $positions[$myterm] .'">' . $positions[$myterm] . '</a>'; ?>:</h2>
					<div class="group">
						<?php $loop = new WP_Query(array('service-providers' => $positions[$myterm]));
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<article <?php post_class('ArticlePreview entry-summary'); ?>>
							<?php echo sprintf( '<h3 class="ArticlePreview__Title entry-title">%s</h3>', get_the_title() ); ?>
							<div class="ArticlePreview__Excerpt">
								<?php the_post_thumbnail('thumbnail'); ?>
								<!-- Display all fields in these posts, exclude empty fields -->
								<?php $fields = get_field_objects();
								if( $fields ): ?>
								<ul>
									<?php foreach( $fields as $field ): ?>
										<?php if( $field['value'] ): ?>
											<?php $hyperlink = $field['name']; ?>
											<li><?php echo "<strong>" . $field['label'] . "</strong>" ?>:
												<?php if($hyperlink == "website"){ echo '<a href="';} ?>
													<?php if($hyperlink == "email"){ echo '<a href="mailto:';} ?>
														<?php if($hyperlink == "phone" || $hyperlink == "mobile"){echo '<a href="tel:';} ?>

															<?php echo $field['value']; ?>

															<?php if($hyperlink == "website" || $hyperlink == "email" || $hyperlink == "phone" || $hyperlink == "mobile"){ echo '">' . $field['value'] . '</a>';}?>
														</li>
													<?php endif; ?>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</article>
							<?php endwhile;  ?>
						</div>
						<?php } ?>

					</div>

				</section>

				<footer id="PageFooter">
					<div class="PageContainer">
						<?php BrandCo_Pagination(); ?>
					</div>
				</footer>

			</main>

			<?php get_footer();?>

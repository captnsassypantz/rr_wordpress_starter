<?php
/**
* Front Page
* @package brandco
*/

get_header(); ?>

<main id="SiteMain" role="main">
	<section id="IntroHeader">
		<?php get_template_part('_modules/module', 'hero_slider') ?>
	</section>

	<button type="button" name="button">Button</button>

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
	<div class="PageContainer">
			<div id="AboutAgent__image">

			</div>
			<div id="AboutAgent__excerpt">
				<?php the_content(); ?>
			</div>
	</div>
</section>

<?php get_template_part('_modules/module', 'testimonials_reel') ?>

<?php get_template_part('_modules/module', 'blogreel') ?>

<?php get_template_part('_modules/module', 'socialmedia') ?>

</main>

<?php get_footer();?>

<article <?php post_class('ArticlePreview entry-summary'); ?>>
	<?php echo sprintf( '<a href="%s"><h2 class="ArticlePreview__Title entry-title">%s</h2></a>', get_permalink(), get_the_title() ); ?>
	<div class="ArticlePreview__Excerpt"><?php the_excerpt(); ?></div>
</article>
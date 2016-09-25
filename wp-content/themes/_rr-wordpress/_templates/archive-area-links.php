<div <?php post_class(''); ?>>

<?php $link = get_field('website_link'); 
	  $description = get_field('category_of_place');
 ?>
	<?php echo sprintf( '<a href="%s"><span class="ArticlePreview__Title entry-title"><strong>%s</strong></span></a> - %s ', $link, get_the_title(), $description ); ?>
	
</div>
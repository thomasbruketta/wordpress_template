<?php get_header(); ?>
	
<section class="banner">
	<div class="container">
		
		<?php echo apply_filters('the_content', '[image-carousel]') ?>
		
	</div><!-- end container -->
</section>

<?php if (have_posts()) : ?>
			
	<?php while (have_posts()) : the_post(); ?>
	
		<?php echo do_shortcode( get_the_content() ); ?>

	<?php endwhile; ?>

<?php else : ?>

	<h2 class="center">Not Found</h2>
	<p class="center">Sorry, but you are looking for something that isn't here.</p>
	<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

<!--<section id="news" class="teasers">
	<div class="container">
	
		<h1>Latest News</h1>
		
		<div id="newsContainer"></div>
	
	</div>
</section>-->

<?php get_footer(); ?>
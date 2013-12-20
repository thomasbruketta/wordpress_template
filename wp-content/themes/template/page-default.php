<?php get_header(); ?>
<?php $file_name = __FILE__; ?>
<?php echo "<script>console.log('$file_name')</script>"?>
	
<section>
	<div class="container">
		
		<?php if (have_posts()) : ?>
		
			<?php while (have_posts()) : the_post(); ?>
			
				<?php the_content(); ?>
	
			<?php endwhile; ?>
	
		<?php else : ?>
	
			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	
		<?php endif; ?>
		
	</div>
</section>

<?php get_footer(); ?>
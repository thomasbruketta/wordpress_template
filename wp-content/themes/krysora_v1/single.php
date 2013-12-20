<?php get_header(); ?>
	
<section class="page">
	<div class="wrapper">
		<div class="wrapper2">
		
			<?php if (have_posts()) : ?>
		
				<?php while (have_posts()) : the_post(); ?>
		
					<div class="post" id="post-<?php the_ID(); ?>">
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
						<p class="date"><?php the_time('F jS, Y') ?> by <?php the_author() ?></p>
		
						<?php the_content('Read more &raquo;'); ?>
		
						<p class="meta">Posted in <?php the_category(', ') ?></p>
						
						<?php comments_template(); ?>
					</div>
		
				<?php endwhile; ?>
		
				<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
				</div>
		
			<?php else : ?>
			
				<h2>Content Not Found</h2>
				<p>Did you type in the right URL? Your content doesn't seem to be here&hellip;</p>
		
			<?php endif; ?>
			
			<p><a href="<?php bloginfo('url') ?>/blog">Back to blog home</a></p>
		
			<?php //get_sidebar('blog'); ?>
		
		</div>
	</div>
</section>

<?php get_footer(); ?>

<?php get_header(); ?>
		
		<div id="sidebarLeft">
			<?php get_sidebar('nav'); ?>
		</div>
		
		<div id="main">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
				<!--<div class="navigation">
					<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
					<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
				</div>-->
		
				<div class="post postSingle" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					
					<small><?php the_time('l, F jS, Y') ?> <?php the_time() ?> by <?php the_author() ?></small>
		
					<div class="entry">
						<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
						<p>Posted in <?php the_category(', ') ?></p>
					</div>
				</div><!-- end post -->
		
			<?php endwhile; else: ?>
		
				<p>Sorry, no posts matched your criteria.</p>
				
			<?php endif; ?>
			
		</div><!-- end main -->
		
		<div id="sidebarRight">
		</div>

<?php get_footer(); ?>
<?php get_header(); ?>
			
	<div id="sidebarLeft">
		<?php get_sidebar('posts'); ?>
	</div>

	<div id="main">
			
		<h1><?php single_cat_title(); ?></h1>

		<?php if (have_posts()) : ?>		
	
			<?php while (have_posts()) : the_post(); ?>
			<?php //if (is_search() && ($post->post_type=='page')) continue; ?>
			<h3><a class="archiveItem" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<small><?php the_time('l, F jS, Y') ?><!--&nbsp;&nbsp;<?php the_category(', ') ?>--></small>
			<?php the_excerpt() ?>
	
			<?php endwhile; ?>
			
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>

		<?php else : ?>

			<h2 class="pagetitle">Your search for <em><?php the_search_query(); ?></em> returned no results.</h2>

		<?php endif; ?>
		
	</div>
	
	<div id="sidebarRight">			
	</div>
				
<?php get_footer(); ?>

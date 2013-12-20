<?php get_header(); ?>

<?php query_posts($query_string . '&showposts=99'); // increase max number of posts ?>

<section class="above aboveSearch">
	<div class="wrapper">
		<div class="wrapper2">
			
			<?php
				$search_term = get_search_query();
				$posts_found = $wp_query->post_count;
				$published_posts = wp_count_posts()->publish;
				$perc = round( 100 * $posts_found / $published_posts );
				
				if ( $perc > 90 ) {
					$perc_str = "We are way into \"$search_term\". You can find \"$search_term\" in $perc% of our posts.";
				} else if ($perc > 70) {
					$perc_str = "The term \"$search_term\" appears in a whopping $perc% of our posts!";
				} else if ( $perc > 10 ) {
					$perc_str = "The term \"$search_term\" appears in $perc% of our posts.";
				} else if ( $perc > 0 ) {
					$perc_str = "The term \"$search_term\" is in a mere $perc% of our posts.";
				} else {
					$perc_str = "Well, looks like \"$search_term\" isn't on our site anywhere. Want to try another search?";
				}
			?>
			<h1>Search Results for <?php echo $search_term ?></h1>
			<p><?php echo $perc_str ?></p>
		
			<?php display_isotope_filters(); ?>
		</div>
	</div>
</section>

<section class="page pageIsotope">
	<div class="wrapper">
		<div class="wrapper2 loading">
		
			<?php if (have_posts()) : ?>
				<ul id="isoItems" class="isoItems">
					<?php
						$item_count = 0;
						while (have_posts()) {
							the_post();
							$p = $post;
							display_isotope_item( $p, $item_count );
							$item_count++;
						}
					?>
				</ul>
			<?php endif; ?>
			
		</div>
	</div>
</section>
				
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery.isotope.min.js"></script>
<script type="text/javascript">
	$(document).ready( function() {
		var isoTO = setTimeout( initIsotope, 500 ); // let topmenu load first
	});
</script>

<?php get_footer(); ?>

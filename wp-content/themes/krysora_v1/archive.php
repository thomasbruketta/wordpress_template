<?php get_header(); ?>

<?php query_posts($query_string . '&showposts=99'); // increase max number of posts ?>

<section class="above aboveSearch">
	<div class="wrapper">
		<div class="wrapper2">
			
			<?php
				if (is_category()) {
			 		global $wp_query;
					$cat_obj = $wp_query->get_queried_object();				 	
			 		$hdr_text = "Posts in \"{$cat_obj->name}\"";
			 	} elseif (is_day()) {
			 		$hdr_text = "Archive for " . get_the_time('F jS, Y') ;
			 	} elseif (is_month()) {
			 		$hdr_text = "Archive for " . get_the_time('F, Y');
			 	} elseif (is_year()) {
			 		$hdr_text = "Archive for " . get_the_time('Y');
			 	} elseif (is_author()) {
			 		$hdr_text = "Author Archive";
			 	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
			 		$hdr_text = "Blog Archives";
			 	}
			?>
			<h1><?php echo $hdr_text ?></h1>
		
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
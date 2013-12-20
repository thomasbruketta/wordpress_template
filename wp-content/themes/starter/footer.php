		<div id="footer">
			<?php 
				wp_nav_menu(array(
			 		"theme_location" => "footer",
			 		"container_class" => "nav"
				));
			?>
			<p>&copy;<?php echo date("Y"); ?> Harmonic Northwest</p>
			<?php wp_footer(); ?>
		</div><!-- end footer -->

	</div><!-- end wrapper2 -->
</div><!-- end wrapper -->

</body>
</html>
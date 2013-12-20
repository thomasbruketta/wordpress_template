<?php
/*
Template Name: home
*/
?>
<?php get_header(); ?>

	<div id="banner">
		<p>carousel</p>
	</div>
	
	<div id="callout1" class="callout calloutLeft">	
		<?php insertPageContent("home/_callout1"); ?>
	</div>
	
	<div id="callout2" class="callout calloutMiddle">
		<?php insertPageContent("home/_callout2"); ?>
	</div>
	
	<div id="callout3" class="callout calloutMiddle">
		<?php insertPageContent("home/_callout3"); ?>
	</div>
	
	<div id="callout4" class="callout calloutRight">
		<?php insertPageContent("home/_callout4"); ?>
	</div>
	
	<div id="infobox1" class="infobox infoboxLeft">
		<?php insertPageContent("home/_infobox1"); ?>
	</div>
	
	<div id="infobox2" class="infobox infoboxMiddle">
		<?php insertPageContent("home/_infobox2"); ?>
	</div>
	
	<div id="infobox3" class="infobox infoboxRight">
		<?php insertPageContent("home/_infobox3"); ?>
	</div>

<?php get_footer(); ?>
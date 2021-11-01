<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 */

get_header();
?>

	<div class="page">
		<div class="container">
			<?php while ( have_posts() ) : the_post();
				relevanssi_the_title( '<h2 class="entry-title">', '</h2>' ); 
				the_content();
			endwhile; // End of the loop. ?>
		</div>
	</div>

<?php
get_footer();

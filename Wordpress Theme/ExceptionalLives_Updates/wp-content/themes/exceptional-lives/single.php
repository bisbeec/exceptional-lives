<?php
/**
 * The Template for displaying all single posts.
 */

get_header();
do_action('skeleton_before_content');
get_template_part( 'loop', 'single' );
do_action('skeleton_after_content');
get_sidebar('single');
echo "<div id='widthWrapper'>";
	comments_template( '', true );
echo "</div>";
get_footer();
?>
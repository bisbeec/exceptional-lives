<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 */
?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'smpl' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'smpl' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<div class="main">
	<div id="widthWrapper" class="blogWrapper">
		<section class="mainArea">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="<?php the_category_unlinked(' '); ?> botRow">
							<div class="blogBox">
								<div class="img-overflow">
									<?php the_post_thumbnail( 'full', array( 'class' => 'headerImage' ) ); ?>
								</div>
								<div class="blogBoxHeader <?php if ( has_post_thumbnail() ) { echo 'withImage'; } ?>">
									<p class="<?php the_category_unlinked(' '); ?> orangeText headingCat"><?php the_category(', '); ?></p>
									<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'smpl' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
									<h3 class="entry-meta publishDate">
										<?php skeleton_posted_on(); ?>
									</h3><!-- .entry-meta -->
								</div>
								<div class="exerpt">
									<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-summary -->
									<?php else : ?>
									<div class="entry-content">

										<?php
											$content = get_the_content();
											// Limit content excerpt to 200 characters for posts that have thumbnail.
											if ( has_post_thumbnail() ) {
												echo substr($content, 0, 200) . "...";
											}
											// Limit all other posts to 400 characters
											else {
												echo substr($content, 0, 870) . "...";
											}
										?>

										<div class="clear"></div>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'smpl' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
									<?php endif; ?>
								</div>
								<a class="button" href="<?php the_permalink(); ?>">Continue Reading</a>
								<div class="footer">
									<div><a href="<?php echo get_the_author_link(); ?>">By <?php echo get_the_author_link(); ?></a></div>
									<div><a href="<?php comments_link(); ?>"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a></div>
									<div class="setWidth">
										<a href="#">
											<img src="<?php echo get_template_directory_uri(); ?>/images/facebookIconBlack.jpg">
										</a>
										<a href="#">
											<img src="<?php echo get_template_directory_uri(); ?>/images/twitterIconBlack.jpg">
										</a>
										<a href="#">
											<img src="<?php echo get_template_directory_uri(); ?>/images/googlePlusIconBlack.jpg">
										</a>
										<a href="#">
											<img src="<?php echo get_template_directory_uri(); ?>/images/pinterestIconBlack.jpg">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div><!-- #post-## -->	

						<?php comments_template( '', true ); ?>

				<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>

<?php if (  $wp_query->max_num_pages > 1 ) {
	do_action('skeleton_page_navi');
}?>
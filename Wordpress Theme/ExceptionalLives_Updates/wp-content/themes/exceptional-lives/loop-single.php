<?php
/**
 * The loop that displays a single post.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 */
?>

<style>
	/** will remove later **/
	.blogWrapper .type-post {
	    width: 100%;
	    float: left;
	    margin-right: 2%;
	}
	body.sidebar-right #wrap #sidebar {
	    float: left;
	    margin-top: 35px;
	}
	body {
	    background-color: #efefef;
	}
	.blogWrapper .blogBox .headerImage {
	    position: relative;
	    left: 0;
	    width: 100%;
	    margin-top: 25px;
	}
	.blogWrapper .botRow .blogBox .blogBoxHeader.withImage {
	    margin-top: 25px;
	}
</style>

<div class="main">
	<div id="widthWrapper" class="blogWrapper">
		<section class="mainArea">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="<?php the_category_unlinked(' '); ?> botRow">
							<div class="blogBox">
								<?php the_post_thumbnail( 'full', array( 'class' => 'headerImage' ) ); ?>
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
											echo the_content();
										?>

										<div class="clear"></div>
										<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'smpl' ), 'after' => '</div>' ) ); ?>
									</div><!-- .entry-content -->
									<?php endif; ?>
								</div>
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


				<?php endwhile; // End the loop. Whew. ?>
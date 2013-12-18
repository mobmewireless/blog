<?php
/**
* The main template file.
*
* This is the most generic template file in a WordPress theme and one of the
* two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* For example, it puts together the home page when no home.php file exists.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Thirteen
* @since Twenty Thirteen 1.0
*/

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<div class="entry-content">
			<div class="latest-posts">
				<?php
				$args = array( 'numberposts' => 10 );
				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
				<p class="post-credits"> <small> <span class="posted">Posted by <?php the_author_posts_link(); ?></span> <span class="category"> Category <?php the_category(', ') ?></span> 
					<span class="post-time"><a href="<?php the_permalink(); ?>#respond">Comment</a></span></small></p>
				<hr />
			<?php endforeach; ?>                    
			</div><!-- latest-posts-->               
</div><!-- entry-content-->
</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
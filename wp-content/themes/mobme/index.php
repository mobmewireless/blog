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
			<div class="latest-post">
				<?php
				$args = array( 'numberposts' => 1 );
				$lastposts = get_posts( $args );
				foreach($lastposts as $post) : setup_postdata($post); ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
			<?php endforeach; ?>
                
			<p class="post-credits"> <small> <span class="posted">Posted by <?php the_author_posts_link(); ?></span> <span class="category"> Category <?php the_category(', ') ?></span> 
				<span class="post-time"> <?php the_time('m/j/y g:i A') ?> </span></small></p>
                    
			</div><!-- latest-post-->
                 
			<div class="quick-posts-wrap">
                        
				<div class="quick-posts-left">
					<?php
					$catquery = new WP_Query( 'cat=5&posts_per_page=1' );
					while($catquery->have_posts()) : $catquery->the_post();
					?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
					<p class="more"> <a href="<?php the_permalink(); ?>">Read More &rarr;</a></p>
				<?php endwhile; ?>
                                         
			</div>
                         
			<div class="quick-posts-right">
				<?php
				$catquery = new WP_Query( 'cat=1&posts_per_page=1' );
				while($catquery->have_posts()) : $catquery->the_post();
				?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
				<p class="more"><a href="<?php the_permalink(); ?>">Read More &rarr;</a></p>
			<?php endwhile; ?>
                                         
		</div><!-- quick-posts-right -->
                                         
		<div class="clear"></div>
	</div><!-- quick-posts-wrap -->                 
</div><!-- entry-content-->
</div><!-- #content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
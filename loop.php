<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
			</a>
		<?php endif; ?>
		<!-- /post thumbnail -->

		<!-- post title -->
		<h2 class="post-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /post title -->

		<!-- post details -->
		<section class="post-details">
		<label><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> <?php the_time('g:ia'); ?></label>
		<label><i class="fa fa-user"></i>  <?php the_author_posts_link(); ?></label>
		<label class="comments"><i class="fa fa-comments"></i> <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '0 Comments', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></label>
		</section>
		<!-- /post details -->

		<section class="font-stack-serif" style="font-size:90%;">
			<?php html5wp_excerpt('html5wp_index'); ?>
		</section>

		<!--?php edit_post_link(); ?-->

	</article>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>

<?php get_header(); ?>
<div class="container">
	<div class="row">
<main role="main" class="col-sm-9">
		<!-- section -->
		<section class="post">

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if ( has_post_thumbnail()) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				<?php endif; ?>

				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
				<section class="post-details">
					<label><i class="fa fa-calendar"></i> <?php the_time('F j, Y'); ?> <?php the_time('g:ia'); ?></label>
					<label><i class="fa fa-user"></i>  <?php the_author_posts_link(); ?></label>
					<label class="comments"><i class="fa fa-comments"></i> <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( '0 Comments', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></label>
					<label class=""><i class="fa fa-align-left"></i> <?php _e( '', 'html5blank' ); the_category(', '); ?></label>
				</section>

				<?php the_content(); ?>

				<div class="post-tags clear">
					<?php the_tags( __( '', 'html5blank' ), ' ', '<br>'); ?>
				</div>

				<?php edit_post_link(); ?>
				<?php comments_template(); ?>

			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

	<section class="col-sm-3">
		<?php get_sidebar(); ?>
	</section>
	</div>
</div>
<?php get_footer(); ?>

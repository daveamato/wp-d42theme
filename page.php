<?php get_header(); ?>

<div class="container-fluid">
	<div class="top-wrap container">
		<div class="row">
			<main role="main" class="col-sm-9">
		<!-- section -->
		<section class="page">

			<h1><?php the_title(); ?></h1>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<br class="clear">

				<?php edit_post_link(); ?>

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

		</section>
		<!-- /section -->
	</main>
<aside class="col-sm-3">
				<?php get_sidebar(); ?>
			</aside>
		</div>
	</div>
</div>

<?php get_footer(); ?>

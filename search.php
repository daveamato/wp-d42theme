<?php get_header(); ?>

<div class="container-fluid" style="padding-bottom:24px;">
	<div class="top-wrap container">
		<div class="row">
			<main role="main" class="col-sm-9">
				<section>
					<?php if ( have_posts() ) : ?>
						<h1 class="page-title"><?php printf( __( 'Search Results for: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php /* use loop-search.php to customize */
				 get_template_part( 'loop', 'search' ); ?>
<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h2 class="entry-title"><?php _e( 'Nothing Found'); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria.'); ?></p>
						<?php get_search_form(); ?>
					</div>
				</div>
<?php endif; ?>
				</section>
			</main>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
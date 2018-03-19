<?php get_header(); ?>
<div class="container">
	<div class="row">
		<main id="content" role="main" class="col-sm-9">
		<section>
			<h1 class="text-capitalize">Category <small class="text-italic"><?php single_cat_title(); ?></small></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
		</main>
		<aside class="col-sm-3">
<?php get_sidebar(); ?>
		</aside>
	</div>
</div>

<?php get_footer(); ?>

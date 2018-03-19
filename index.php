<?php get_header(); ?>

<div class="container" style="padding-bottom:24px;">
	<div class="top-wrap">
		<div class="row">
			<main role="main the-loop" class="col-sm-9">
				<section>
					<h1><?php bloginfo('description'); ?> <small><?php bloginfo('name'); ?></small></h1>
					<?php get_template_part('loop'); ?>
					<?php get_template_part('pagination'); ?>
				</section>
			</main>
			<div class="col-sm-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>

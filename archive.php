<?php get_header(); ?>
<div class="top-wrap container">
	<div class="row">
		<main role="main" class="col-sm-9">
			<section>
				<h1 class="text-capitalize">Archives <small class="text-italic"><?php single_month_title();?></small></h1>
				<?php get_template_part('loop'); ?>
				<?php get_template_part('pagination'); ?>
			</section>
		</main>
		<div class="col-sm-3">
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>

<!-- sidebar -->
<section>

<aside class="sidebar" role="complementary">

	<div class="sidebar-widget vert-offset-top-1">
	<?php get_template_part('searchform'); ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
</section>
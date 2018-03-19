<?php get_header(); ?>

<div class="container">
	<div id="content" class="row" role="main">
		<div id="post-0" class="col-xs-12 post error404 not-found" style="min-height:500px;">
			<h1 class="entry-title"><?php _e( 'Not Found'); ?></h1>
			<div class="entry-content">
				<p class="lead h3"><?php _e( 'Sorry, the page you requested cannot be found!'); ?></p>
				<h5 style="position:absolute;bottom:0; left:15px;"><a href="<?php echo home_url(); ?>" class="go-back text-muted text-capitalize"><i class="fa fa-arrow-left"></i> Go back to home</a></h5>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
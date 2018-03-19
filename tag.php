<?php
/**
 * The template for displaying Tag Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>

		<div class="container">
			<div class="row">
				<main id="content" class="col-sm-9" role="main">

					<h1 class="page-title"><?php
						printf( __( 'Tag Archives: %s'), '<span class="text-primary">' . single_tag_title( '', false ) . '</span>' );
					?></h1>

				<?php
					/* use loop-tag.php to overload this child theme */
					get_template_part( 'loop', 'tag' );
					get_template_part( 'pagination', 'tag' ); ?>
				</main><!-- #content -->
				<aside class="col-sm-3">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div><!-- #container -->

<?php get_footer(); ?>
			<!-- footer -->
			<?php include('scrape-footer.php'); ?>
			<!-- /footer -->

			<script>
            	$(function() {
				    var logo = document.querySelector(".navbar-brand");
				    var img = logo.querySelector("img");
				    var blogLogo = document.createElement("img");
				    var blogLink = document.createElement("a");
				    logo.setAttribute("title","Device42.com")
				    blogLink.setAttribute("href", "/blog");
				    blogLink.setAttribute("title","Device42 Blog");
				    blogLink.setAttribute("style", "display:table-cell;float:left;");
				    blogLogo.setAttribute("src", "<?php echo get_template_directory_uri(); ?>/images/just-blog-logo.png");
				    blogLogo.setAttribute("class", "navbar-brand inline-block");
				    blogLogo.setAttribute("style", "max-height:41px;width:auto!important;padding-left:4px;margin-left:0;");
				    blogLink.appendChild(blogLogo);
				    logo.parentNode.insertBefore(blogLink, logo.nextSibling);
				});
			</script>

			<script><?php echo get_option('body_scripts'); ?></script>
	</body>
</html>


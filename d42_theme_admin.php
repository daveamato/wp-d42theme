<?php
/**
 * Device42 Wordpress Theme
 * Admin Settings
 */
function display_head_scripts() { ?>
	<textarea type="textarea" style="width:100%;height:200px;" name="head_scripts" id="head_scripts"><?php echo get_option('head_scripts'); ?></textarea>
<?php }
function display_body_scripts() { ?>
	<textarea type="textarea" style="width:100%;height:200px;" name="body_scripts" id="body_scripts"><?php echo get_option('body_scripts'); ?></textarea>
<?php }

function display_custom_styles() { ?>
	<textarea type="textarea" style="width:100%;height:200px;" name="custom_styles" id="custom_styles"><?php echo get_option('custom_styles'); ?></textarea>
<?php }
function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	add_settings_field("head_scripts", "Head Scripts", "display_head_scripts", "theme-options", "section");
	add_settings_field("body_scripts", "Body Scripts", "display_body_scripts", "theme-options", "section");
    add_settings_field("custom_styles", "Custom CSS Styles", "display_custom_styles", "theme-options", "section");

    register_setting("section", "head_scripts");
    register_setting("section", "body_scripts");
    register_setting("section", "custom_styles");
}

add_action("admin_init", "display_theme_panel_fields");

function d42_theme_admin() {
?>
 <div class="wrap">
	    <h1>Device42 Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");
	            submit_button();
	        ?>
	    </form>
		</div>
<?php }
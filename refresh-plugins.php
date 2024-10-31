<?php
/*
Plugin Name: Refresh Plugins / Themes / Core
Plugin URI: http://www.vizioninteractive.com/
Description: Usually, WordPress will only check for updates every 12 hours. Now you can quickly and easily refresh/update your WP Database so WordPress will check for the latest versions of your installed Plugins / Themes and WP Core.
Version: 1.0.3
Author: Vizion Interactive, Inc
Author URI: http://www.vizioninteractive.com/
*/
if(!function_exists('refresh_plugins_menu'))
	{
		function refresh_plugins_menu ()
			{
				add_management_page(__('Refresh Plugins / Themes / Core','refresh_plugins'),__('Refresh Plugins / Themes / Core','refresh_plugins'),'update_plugins',__FILE__);
			}
		add_action('admin_menu','refresh_plugins_menu');
		function refresh_plugins ()
			{
?>
<h1><?php _e('Refresh Plugins / Themes / Core'); ?></h1>
<p><?php _e('Usually, WordPress will only check for updates every 12 hours. Now you can quickly and easily refresh/update your WP Database so WordPress will check for the latest versions of your installed Plugins / Themes and WP Core.'); ?></p>
<form action="plugins.php?refresh_plugins=1" method="post">
<input type="submit" name="submit" value="<?php _e('Refresh Plugins'); ?>" /></>
</form>
<form action="themes.php?refresh_plugins_themes=1" method="post">
<input type="submit" name="submit" value="<?php _e('Refresh Themes'); ?>" />
</form>
<form action="update-core.php?refresh_plugins_core=1" method="post">
<input type="submit" name="submit" value="<?php _e('Refresh Core'); ?>" />
</form>
<form action="plugins.php?refresh_plugins_all=1" method="post">
<input type="submit" name="submit" value="<?php _e('Refresh Them All (Plugins / Themes / Core)'); ?>" />
</form>
<?php
			}
		function refresh_plugins_now ()
			{
				update_option('update_plugins','');
			}
		function refresh_plugins_themes_now ()
			{
				update_option('update_themes','');
			}
		function refresh_plugins_core_now ()
			{
				update_option('update_core','');
			}
	}
else
	{
		refresh_plugins();
	}
if(isset($_GET['refresh_plugins'])&&$_GET['refresh_plugins']==1)
	{
		refresh_plugins_now();
	}
if(isset($_GET['refresh_plugins_themes'])&&$_GET['refresh_plugins_themes']==1)
	{
		refresh_plugins_themes_now();
	}
if(isset($_GET['refresh_plugins_core'])&&$_GET['refresh_plugins_core']==1)
	{
		refresh_plugins_core_now();
	}
if(isset($_GET['refresh_plugins_all'])&&$_GET['refresh_plugins_all']==1)
	{
		refresh_plugins_now();
		refresh_plugins_themes_now();
		refresh_plugins_core_now();
	}
?>
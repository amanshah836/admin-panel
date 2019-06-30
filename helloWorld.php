<?php
/*
Plugin Name: hello plugin
Plugin URI: https://w3schools.com/
Description: first time
Version: 4.1.2
Author: unknown
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: hello
*/
$GLOBALS['abs_path_plugs'] = dirname(dirname(__FILE__)).'/';
add_action('admin_menu', 'submitted_forms_menu');
function submitted_forms_menu()
{
    add_menu_page( 'Page Title', 'Fetch_data', 'edit_posts', 'Fetch_data', 'null', 'dashicons-media-spreadsheet' );
    add_submenu_page( 'Fetch_data','Page Title1', 'Active Plugins', 'edit_posts', 'submenu1_slug', 'get_active_plugins', 'dashicons-media-spreadsheet' );
    add_submenu_page( 'Fetch_data', 'Page Title 2', 'Inactive Plugins' ,'edit_posts', 'submenu2_slug', 'get_inactive_plugins' );
    add_submenu_page( 'Fetch_data', 'Page Title 3', 'All Plugins', 'edit_posts', 'submenu3_slug', 'get_all_plugins' );
    add_submenu_page( 'Fetch_data', 'Page Title 4', 'Recent Plugins', 'edit_posts', 'submenu4_slug', 'get_recently_active_plugins' );
    remove_submenu_page('Fetch_data' , 'Fetch_data');
}
function get_active_plugins() 
{
    echo 'Active Plugins<br>';
    $active_plugins = get_plugins();
    echo '<ul>';
    foreach ($active_plugins as $key => $value)
    {
        $string = explode('/',$key);
        if(is_plugin_active( $key ))
        {
            description_version( $key );
        }
    }
    echo '</ul>';
}
function get_inactive_plugins() 
{
    echo 'Inactive Plugins<br>';  
    $inactive_plugins = get_plugins();
    echo '<ul>';
    foreach($inactive_plugins as $key => $value) 
    {
        if(is_plugin_inactive( $key )) 
        {
            description_version( $key );
        }
    }
    echo '</ul>';
}
function get_all_plugins() 
{
  echo 'All Plugins<br>';
  $all_plugins = get_plugins();
  echo '<ul>';
    foreach($all_plugins as $key => $value) 
    {
        description_version( $key );
    }
    echo '</ul>';
}
function get_recently_active_plugins()
{
    echo "Recent Plugins<br>";
    $recent_plugins = get_option('recently_activated');    
    echo '<ul>';
    foreach($recent_plugins as $key => $value) 
    {
        description_version( $key );
    }
    echo '</ul>';
}
function description_version( $plugin ) 
{
    $string = explode('/',$plugin); 
    echo '<li>'.$string[0];
    $data = get_plugin_data($GLOBALS['abs_path_plugs'].$plugin);
    echo '<br>Description: '.$data['Description'];
    echo '<br>Version: '.$data['Version'].'</li><br>';
}


?>



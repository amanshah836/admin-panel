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
?>

<?php
add_action('admin_menu', 'my_admin_menu');

function my_admin_menu () {
  add_menu_page('Footer Text title', 'Hello world', 'manage_options',
 'footer_setting_page', 'footer_text_admin_page');
}

function footer_text_admin_page () {
  ?>

  <table border="1">
  <tr>
    <th>Id</th>
   <th>Username</th>
   <th>Name</th>
   <th>Email</th>
   <th>Role</th> 
   <th>Posts</th>
   <th>register</th>
   <th>activation</th>
   <th>status</th>
   


    </tr>
    <?php

    global $wpdb;
    $result = $wpdb->get_results ( "SELECT * FROM {$wpdb->prefix}users");
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
    if (count($result) > 0) 
    {
      foreach ($result as $row) {
      //   # code...
      
          echo '<tr>';
          echo '<td>' . $row->user_login .'</td>';
          echo'<td>' .  $row->display_name  .'</td>';
          echo '<td>' . $row->user_email   .'</td>';
          echo '<td>' . $row->user_nicename . '</td>';
          echo '<td>' . $row->user_url . '</td>';
          echo '<td>' . $row->user_registered . '</td>';
          echo '<td>' . $row->user_activation_key   .'</td>';
          echo '<td>' . $row->user_status   .'</td>';
          

           echo '</tr>';
         } 
      echo "</table>";       
    } 
    else 
    { 
      echo "0 results";
    }
} 
    
  ?> 
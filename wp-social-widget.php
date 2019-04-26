<?php

/*
    Plugin Name: WP Social Widget
    Plugin URI: https://github.com/EmgrtE/wp-social-widget
    Description: A plugin that adds a widget with social links.
    Version: 0.1
    Author: EmgrtE
    Author URI: https://github.com/EmgrtE
*/

$wpsw_path = plugin_dir_path(__FILE__);
//$wpsw_url = plugin_dir_url(__FILE__);

// include WPSocialWidget class
include_once($wpsw_path . 'classes/classes-wp-social-widget.php');

// WP Social Widget init
function wpsw_init() {
    register_widget('WPSocialWidget');
}

add_action('widgets_init', 'wpsw_init');

/*
    ___________________________
    | q w e r t y u i o p [ ] |
    |  a s d f g h j k l ; '  |
    |   z x c v b n m , . /   |
    |=========================|
*/
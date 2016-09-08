<?php
/*
Plugin Name: CloudFlare
Plugin URI: http://www.cloudflare.com/wiki/CloudFlareWordPressPlugin
Description: CloudFlare integrates your blog with the CloudFlare platform.
Version: 2.1.0-beta
Author: Ian Pye, Jerome Chen, James Greene, Simon Moore, David Fritsch, John Wineman (CloudFlare Team)
License: GPLv2
*/

require_once 'vendor/autoload.php';

const CF_MIN_PHP_VERSION = '5.3';
const CF_MIN_WP_VERSION = '3.4';

if (!defined('ABSPATH')) { // Exit if accessed directly
    exit;
}

// Load Init Script
add_action('init', array('\CF\Hooks\Init', 'init'), 1);

// Load Activation Script
register_activation_hook(__FILE__, array('\CF\Hooks\Activation', 'init'));

// Load Deactivation Script
register_deactivation_hook(__FILE__, array('\CF\Hooks\Deactivation', 'init'));

// Load Uninstall Script
register_uninstall_hook(__FILE__, array('\CF\Hooks\Uninstall', 'init'));

// Load AutomaticCache
add_action('init', array('\CF\Hooks\AutomaticCache', 'init'));

// Enable HTTP2 Server Push
add_action('init', array('\CF\Hooks\HTTP2ServerPush', 'init'));

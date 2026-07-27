<?php
/**
 * Plugin Name: Odawara Sewing Studio
 * Plugin URI: https://www.odawaramishin.sling.name/
 * Description: 小田原ミシン Sewing Studio（生地計算・副資材計算・型紙・ミシン診断）
 * Version: 0.1.0
 * Author: 小田原ミシン
 * License: GPL v2 or later
 * Text Domain: odawara-sewing-studio
 */

if (!defined('ABSPATH')) {
    exit;
}

define('OSS_VERSION', '0.1.0');
define('OSS_PLUGIN_FILE', __FILE__);
define('OSS_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('OSS_PLUGIN_URL', plugin_dir_url(__FILE__));

require_once OSS_PLUGIN_PATH . 'includes/class-plugin.php';

function oss_boot()
{
    return Odawara_Sewing_Studio::instance();
}

oss_boot();
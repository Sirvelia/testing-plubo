<?php

/**
 * @wordpress-plugin
 * Plugin Name:       TestingPlubo
 * Plugin URI:        https://sirvelia.com/
 * Description:       A WordPress plugin made with PLUBO.
 * Version:           1.0.0
 * Author:            Sirvelia
 * Author URI:        https://sirvelia.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       testing-plubo
 * Domain Path:       /languages
 */

if (!defined('WPINC')) {
    die('YOU SHALL NOT PASS!');
}

// PLUGIN CONSTANTS
define('TESTINGPLUBO_NAME', 'testing-plubo');
define('TESTINGPLUBO_VERSION', '1.0.0');
define('TESTINGPLUBO_PATH', plugin_dir_path(__FILE__));
define('TESTINGPLUBO_BASENAME', plugin_basename(__FILE__));
define('TESTINGPLUBO_URL', plugin_dir_url(__FILE__));
define('TESTINGPLUBO_ASSETS_PATH', TESTINGPLUBO_PATH . 'dist/' );
define('TESTINGPLUBO_ASSETS_URL', TESTINGPLUBO_URL . 'dist/' );

// AUTOLOAD
if (file_exists(TESTINGPLUBO_PATH . 'vendor/autoload.php')) {
    require_once TESTINGPLUBO_PATH . 'vendor/autoload.php';
}

// LYFECYCLE
register_activation_hook(__FILE__, [TestingPlubo\Includes\Lyfecycle::class, 'activate']);
register_deactivation_hook(__FILE__, [TestingPlubo\Includes\Lyfecycle::class, 'deactivate']);
register_uninstall_hook(__FILE__, [TestingPlubo\Includes\Lyfecycle::class, 'uninstall']);

// LOAD ALL FILES
$loader = new TestingPlubo\Includes\Loader();

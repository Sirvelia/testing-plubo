<?php

namespace TestingPlubo\Includes;

class Loader
{
    public function __construct()
    {
        $this->loadDependencies();

        add_action('plugins_loaded', [$this, 'loadPluginTextdomain']);
    }

    private function loadDependencies()
    {
        //FUNCTIONALITY CLASSES
        foreach (glob(TESTINGPLUBO_PATH . 'Functionality/*.php') as $filename) {
            $class_name = '\\TestingPlubo\Functionality\\' . basename($filename, '.php');
            if (class_exists($class_name)) {
                try {
                    new $class_name(TESTINGPLUBO_NAME, TESTINGPLUBO_VERSION);
                } catch (\Throwable $e) {
                    pb_log($e);
                    continue;
                }
            }
        }

        //ADMIN FUNCTIONALITY
        if( is_admin() ) {
            foreach (glob(TESTINGPLUBO_PATH . 'Functionality/Admin/*.php') as $filename) {
                $class_name = '\\TestingPlubo\Functionality\Admin\\' . basename($filename, '.php');
                if (class_exists($class_name)) {
                    try {
                        new $class_name(TESTINGPLUBO_NAME, TESTINGPLUBO_VERSION);
                    } catch (\Throwable $e) {
                        pb_log($e);
                        continue;
                    }
                }
            }
        }
    }

    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('testing-plubo', false, dirname(TESTINGPLUBO_BASENAME) . '/languages/');
    }
}

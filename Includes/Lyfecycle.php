<?php

namespace TestingPlubo\Includes;

class Lyfecycle
{
    public static function activate($network_wide)
    {
        do_action('TestingPlubo/setup', $network_wide);
    }

    public static function deactivate($network_wide)
    {
        do_action('TestingPlubo/deactivation', $network_wide);
    }

    public static function uninstall()
    {
        do_action('TestingPlubo/cleanup');
    }
}

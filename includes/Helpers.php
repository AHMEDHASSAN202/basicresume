<?php

namespace Resume\includes;


class Helpers
{
    public static function viewRequire($view, $args=null)
    {
        self::requireFile('views' . DIRECTORY_SEPARATOR . $view . '.php', $args);
    }

    public static function requireFile($file, $args=null)
    {
        require dirname(ROOT_FILE) . DIRECTORY_SEPARATOR . $file;
    }

    public static function controllerRequire($controller, $args=null)
    {
        self::requireFile('controllers' . DIRECTORY_SEPARATOR . $controller . '.php', $args);
    }

    public static function pre($var, $die = false)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if ($die) die;
    }
}
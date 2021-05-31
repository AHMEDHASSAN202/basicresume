<?php
namespace Resume;

spl_autoload_register(function ($class) {
    if (strpos($class, __NAMESPACE__) === false) {
        return;
    }
    $classPath = str_replace(__NAMESPACE__, '', dirname(ROOT_FILE) . DIRECTORY_SEPARATOR . $class . '.php');
    $classPath = str_replace(['/', '\\', '\\\\'], DIRECTORY_SEPARATOR, $classPath);
    require_once $classPath;
});
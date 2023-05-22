<?php

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    private static function autoload($className)
    {
        $filePath = str_replace('\\', '/', $className) . ".php";

        if (file_exists($filePath)) {
            require $filePath;
        }
    }
}

Autoloader::register();

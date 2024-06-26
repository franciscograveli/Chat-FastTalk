<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbfaf2d7d99ab1dacbf01f36104df6484
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'A' => 
        array (
            'App\\Core\\' => 9,
            'App\\Controllers\\' => 16,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'App\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbfaf2d7d99ab1dacbf01f36104df6484::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbfaf2d7d99ab1dacbf01f36104df6484::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbfaf2d7d99ab1dacbf01f36104df6484::$classMap;

        }, null, ClassLoader::class);
    }
}

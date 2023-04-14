<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit86ec95a9b25a95a95583ebaa4b966558
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SpotifyWebAPI\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SpotifyWebAPI\\' => 
        array (
            0 => __DIR__ . '/..' . '/jwilsson/spotify-web-api-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit86ec95a9b25a95a95583ebaa4b966558::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit86ec95a9b25a95a95583ebaa4b966558::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit86ec95a9b25a95a95583ebaa4b966558::$classMap;

        }, null, ClassLoader::class);
    }
}

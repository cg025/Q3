<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit835cc2712a1a8acd053d2e8a12583b3e
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        8 => 
        array (
            '86130\\Q3\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        '86130\\Q3\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit835cc2712a1a8acd053d2e8a12583b3e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit835cc2712a1a8acd053d2e8a12583b3e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit835cc2712a1a8acd053d2e8a12583b3e::$classMap;

        }, null, ClassLoader::class);
    }
}

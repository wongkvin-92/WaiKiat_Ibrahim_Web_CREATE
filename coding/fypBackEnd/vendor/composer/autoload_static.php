<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16ab9159d19a100bbe7a97409064fead
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Klein\\' => 6,
        ),
        'H' => 
        array (
            'HemiFrame\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Klein\\' => 
        array (
            0 => __DIR__ . '/..' . '/klein/klein/src/Klein',
        ),
        'HemiFrame\\' => 
        array (
            0 => __DIR__ . '/..' . '/hemiframe/php-websocket/src/HemiFrame',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit16ab9159d19a100bbe7a97409064fead::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16ab9159d19a100bbe7a97409064fead::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}

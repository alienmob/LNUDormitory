<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit92e196cce0f028a9d1cbbcb2ccdc6c31
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit92e196cce0f028a9d1cbbcb2ccdc6c31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit92e196cce0f028a9d1cbbcb2ccdc6c31::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
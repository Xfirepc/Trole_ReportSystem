<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite63756a721c2fabc1f256949c1958b10
{
    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static $classMap = array (
        'Format' => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/application/libraries/Format.php',
        'Restserver\\Libraries\\REST_Controller' => __DIR__ . '/..' . '/chriskacerguis/codeigniter-restserver/application/libraries/REST_Controller.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInite63756a721c2fabc1f256949c1958b10::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite63756a721c2fabc1f256949c1958b10::$classMap;

        }, null, ClassLoader::class);
    }
}

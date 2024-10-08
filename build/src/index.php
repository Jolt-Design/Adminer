<?php

function adminer_object() {
    require __DIR__ . '/plugins/plugin.php';

    foreach (glob(__DIR__ . '/plugins/*.php') as $filename) {
        if (strtolower(basename($filename)) !== 'plugin.php') {
            require $filename;
        }
    }

    $plugins = [
        new AdminerPrettyJsonColumn(null),
    ];

    return new AdminerPlugin($plugins);
}

require __DIR__ . '/adminer.php';

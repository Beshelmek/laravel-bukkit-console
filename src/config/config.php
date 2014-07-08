<?php

return array(
    'auto_boot' => true,
    'routes' => array(
        'view' => array('bukkit-console', 'Radic\BukkitConsole\Controllers\ConsoleController@index'),
        'cmd' => array('bukkit-console', 'Radic\BukkitConsole\Controllers\ConsoleController@cmd')
    )
);
## Laravel Bukkit Console
[![Build Status](https://travis-ci.org/RobinRadic/bukkit-console.svg?branch=master)](https://travis-ci.org/RobinRadic/bukkit-console)
[![Latest Stable Version](https://poser.pugx.org/radic/bukkit-console/v/stable.svg)](https://packagist.org/packages/radic/bukkit-console)
[![License](https://poser.pugx.org/radic/bukkit-console/license.svg)](https://packagist.org/packages/radic/bukkit-console)
Laravel package providing remote access to a Bukkit server console using JS/PHP/Laravel and the SwiftAPI Bukkit plugin.


##### Preview screenshots
[![Screen 1](http://i.imgur.com/uEkDzmgs.jpg)](https://github.com/RobinRadic/laravel-bukkit-console/raw/master/ss1.jpg)
[![Screen 2](http://i.imgur.com/D4nUPY3s.jpg)](https://github.com/RobinRadic/laravel-bukkit-console/raw/master/ss2.jpg)
[![Screen 3](http://i.imgur.com/SMLPHf5s.jpg)](https://github.com/RobinRadic/laravel-bukkit-console/raw/master/ss3.jpg)


### Version 1.0.1
[View changelog and todo](https://github.com/RobinRadic/laravel-bukkit-console/blob/master/changelog.md)

##### Requirements
- PHP > 5.3 
- Laravel > 4.0
- [Laravel Bukkit SwiftApi](https://github.com/RobinRadic/laravel-bukkit-swiftapi)


##### Installation
Add to composer.json requirements:
```JSON
"requires": {
    "radic/bukkit-swift-api": "dev-master",
    "radic/bukkit-console": "dev-master",
}
```

Register Laravel service providers:
```php
'providers' => array(
    'Radic\BukkitSwiftApi\BukkitSwiftApiServiceProvider',
    'Radic\BukkitConsole\BukkitConsoleServiceProvider',
)
```

Publish all zeh stuff:
```Batchfile
php artisan config:publish radic/bukkit-console
php artisan asset:publish radic/bukkit-console
php artisan view:publish radic/bukkit-console
```

##### Using
The standard route is (http://yoursite/bukkit-console')

##### Configuration
There's hardly any config, accept for the JS terminal. Will write something here later on

###### Routing
```php
// config.php
array(
    'view' => array('bukkit-console', 'Radic\BukkitConsole\Controllers\ConsoleController@index'),
    'cmd' => array('bukkit-console', 'Radic\BukkitConsole\Controllers\ConsoleController@cmd')
)
// BukkitConsoleServiceProvider.php
$routes = Config::get('radic/bukkit-console::routes');
Route::get($routes['view'][0], $routes['view'][1]);
Route::post($routes['cmd'][0], $routes['cmd'][1]);
```


##### Further reading
- [Laravel Bukkit SwiftApi](https://github.com/RobinRadic/laravel-bukkit-swiftapi). The SwiftAPI laravel wrapper
- [Bukkit SwiftAPI](http://dev.bukkit.org/bukkit-plugins/swiftapi). The SwiftAPI Website.
- [SwiftAPI Thrift Documentation](http://willwarren.com/docs/swiftapi/latest/). The docs for SwiftAPI generated Thrift code.
- [Bukkit SwiftAPI Reposiotry](https://bitbucket.org/phybros/swiftapi). Repository for the SwiftApi Bukkit Java plugin.

### Credits
- [Robin Radic](https://github.com/RobinRadic) created [Laravel Bukkit SwiftApi](https://github.com/RobinRadic/laravel-bukkit-swiftapi)
- [Phybros](http://dev.bukkit.org/profiles/phybros) created [Bukkit SwiftAPI](http://dev.bukkit.org/bukkit-plugins/swiftapi)
- [Jakub Jankiewicz](http://jcubic.pl) created [jQuery Terminal](http://terminal.jcubic.pl)

### License
Laravel Bukkit Console licensed [Do What the Fuck You Want to Public License](http://www.wtfpl.net/)
<?php namespace Radic\BukkitConsole;

use Illuminate\Support\ServiceProvider;
use Route;
use Config;

class BukkitConsoleServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// include routes
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

    public function boot()
    {
        $this->package('radic/bukkit-console', 'radic/bukkit-console');

        if($this->app['config']['radic/bukkit-console::auto_boot'] === false) return;
        Route::group(array(), function(){
            $routes = Config::get('radic/bukkit-console::routes');
            Route::get($routes['view'][0], $routes['view'][1]);
            Route::post($routes['cmd'][0], $routes['cmd'][1]);
        });
    }

}

<?php namespace H34\LaravelVenezuela;

use Illuminate\Support\ServiceProvider;

class LaravelVenezuelaServiceProvider extends ServiceProvider {

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
		$this->registerLaravelVenezuelaInstall();
		$this->registerLaravelVenezuelaSeed();
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}


	public function boot()
	{
	    $this->publishes([
			__DIR__ . '/database/migrations/' => base_path('/database/migrations'),
		], 'migrations');

		$this->publishes([
			__DIR__ . '/database/seeds/' => base_path('/database/seeds'),
		], 'seeds');

	}


	public function registerLaravelVenezuelaInstall(){
		$this->app->singleton('command.h34.LaravelVenezuela.install', function($app){
			return $app['H34\LaravelVenezuela\Console\Commands\LaravelVenezuelaInstall'];
		});

		$this->commands('command.h34.LaravelVenezuela.install');
	}

	public function registerLaravelVenezuelaSeed(){
		$this->app->singleton('command.h34.LaravelVenezuela.seed', function($app){
			return $app['H34\LaravelVenezuela\Console\Commands\LaravelVenezuelaSeed'];
		});

		$this->commands('command.h34.LaravelVenezuela.seed');
	}

}

<?php namespace Sorora\Empower\Providers;

use Illuminate\Support\ServiceProvider;

class EmpowerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('sorora/empower');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app['empower'] = $this->app->share(function($app)
		{
			return new \Sorora\Empower\Empower;
		});
		$this->app['config']->package('sorora/empower', __DIR__.'/../../../config');
   		$this->app['view']->addNamespace('empower', __DIR__.'/../../../views');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('empower');
	}

}
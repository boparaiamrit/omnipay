<?php namespace Boparaiamrit\Omnipay;


use Illuminate\Support\ServiceProvider;

class OmnipayServiceProvider extends ServiceProvider
{
	
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	public function boot()
	{
		// Publish config
		$configPath = __DIR__ . '/../../config/omnipay.php';
		$this->publishes([$configPath => config_path('omnipay.php')], 'config');
	}
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->registerManager();
	}
	
	/**
	 * Register the Omnipay manager
	 */
	public function registerManager()
	{
		$this->app->singleton('omnipay', function ($app) {
			return new OmnipayManager($app);
		});
	}
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['omnipay'];
	}
	
}
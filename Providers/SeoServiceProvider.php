<?php
namespace App\Modules\Seo\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class SeoServiceProvider extends ServiceProvider
{
	/**
	 * Register the Seo module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Modules\Seo\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the Seo module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('seo', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('seo', realpath(__DIR__.'/../Resources/Views'));
	}
}

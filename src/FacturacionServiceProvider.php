<?php

namespace DigitalsiteSaaS\Facturacion;

use Illuminate\Support\ServiceProvider;

/**
* 
*/
class FacturacionServiceProvider extends ServiceProvider
{
	
	 public function register()
	{
		$this->app->bind('facturacion', function($app) {
			return new Facturacion;

		});
	}

	public function boot()
	{
		require __DIR__ . '/Http/routes.php';


		$this->loadViewsFrom(__DIR__ . '/../views', 'facturacion');

		$this->publishes([

			__DIR__ . '/migrations/2015_07_25_000000_create_usuario_table.php' => base_path('database/migrations/2015_07_25_000000_create_usuario_table.php'),

			]);


	}

}

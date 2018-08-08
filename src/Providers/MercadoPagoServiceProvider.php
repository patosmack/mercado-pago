<?php namespace Patosmack\MercadoPago\Providers;

use Illuminate\Support\ServiceProvider;
use Patosmack\MercadoPago\MP;

class MercadoPagoServiceProvider extends ServiceProvider 
{

	protected $mp_app_id;
	protected $mp_app_secret;

	public function boot()
	{
        $this->mp_app_id     = env('MP_APP_ID', '');
        $this->mp_app_secret = env('MP_APP_SECRET', '');
	}

	public function register()
	{
		$this->app->singleton('MP', function(){
			return new MP($this->mp_app_id, $this->mp_app_secret);
		});
	}
}
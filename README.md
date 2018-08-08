# Mercado Pago SDK for Laravel

* [Instalar](#install)
* [Configuración](#config)
* [Como usar](#how-to)
* [Más Información](#info)

<a name="install"></a>
### Instalar

`composer require Patosmack/mercado-pago`

`"require": {
        "patosmack/mercado-pago": "dev-master",
    }`

Editar archivo `config/app.php` y agregar las siguientes lineas de código:

Agregar Provider

```php
'providers' => [

    /*
     * Laravel Framework Service Providers...
     */

    'Patosmack\MercadoPago\Providers\MercadoPagoServiceProvider',
],
``` 

Agregar alias

```php
'aliases' => [
	// Otros alias

    'MP' => 'Patosmack\MercadoPago\Facades\MP',
]
```

<a name="config"></a>
### Configuracion

Antes de comenzar publicar archivos de configuración ejecutando desde terminal el comando artisan:

`php artisan vendor:publish`

Este comando creará un archivo `config/mercadopago.php`. donde puede configurar su App Id y su App Secret


[Sitio de MercadoPago para acceder al App ID y App Secret](https://www.mercadopago.com/mla/herramientas/aplicaciones)

```php
return [
	'app_id'     => env('MP_APP_ID', 'SU CLIENT ID'),
	'app_secret' => env('MP_APP_SECRET', 'SU CLIENT SECRET')
];
```

Se recomienda utilizar el App ID y el App Secret desde el archivo .env
Configurar las variables  `MP_APP_ID`,  `MP_APP_SECRET` y `MP_APP_SANDBOX` con los datos de tu cuenta de Mercadopago

<a name="how-to"></a>
### Como usar

Ejemplo de como crear una preferencia de pago y redireccionar al usuario al sitio de Mercadopago

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use MP;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $preference_data = array (
            "items" => array (
                array (
                    "title" => "Test2",
                    "quantity" => 1,
                    "currency_id" => "ARS",
                    "unit_price" => 10.41
                )
            )
        );

        try {
            $preference = MP::create_preference($preference_data);
            return redirect()->to($preference['response']['init_point']);
        } catch (Exception $e){
            dd($e->getMessage());
        }
    }
}
```

<a name="info"></a>
### Más Información

Para más información acceder a [Mercado Pago para desarrolladores](https://developers.mercadopago.com/)

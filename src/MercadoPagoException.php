<?php

namespace Patosmack\MercadoPago;

use Exception;

class MercadoPagoException extends Exception {
    public function __construct($message, $code = 500, Exception $previous = null) {
        // Default code 500
        parent::__construct($message, $code, $previous);
    }
}
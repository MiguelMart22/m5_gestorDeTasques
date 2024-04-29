<?php

namespace App\Models;
use Illuminate\Support\Facades\Date;
use Exception;

/**
 * 
 */
class Cuenta{
    private float $saldo;
    public function __construct(){
        $this-> saldo=0.0;
    }

    public function getSaldo():float {
        return $this-> saldo;
    }

    public function ingresar(float $quantitat):void {
        $quantitatString = strval($quantitat);
        
        if($quantitat > 0 && strpos($quantitatString, ".")+2 < strlen($quantitatString)){
            $this->saldo += $quantitat;
        }else {
        throw new Exception("Cannot ingresar a negative amount.");
        }
    }

    public function transferir(Cuenta $cuenta, float $quantitat): void {
        $this->saldo -= $quantitat;
        $cuenta->ingresar($quantitat);
    }


}

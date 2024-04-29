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
            $this->saldo = 0;
        }
    }

    public function transferir(Cuenta $cuenta, float $quantitat): void {
        if ($this->saldo > 0){
        $this->saldo -= $quantitat;
        $cuenta->ingresar($quantitat);
        }
    }


}

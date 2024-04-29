<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Cuenta;

class CuentaTest extends TestCase
{
    public function test_cuenta(): void
    {
        $cuenta = new Cuenta();
        $this->assertNotNull($cuenta);
    }

    public function test_cuenta_a_cero(): void
    {
        $cuenta = new Cuenta();
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    public function test_ingresar_dinero(): void
    {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    public function test_ingresar_3000_dinero(): void
    {
        $cuenta = new Cuenta();
        $cuenta->ingresar(3000);
        $this->assertEquals(3000, $cuenta->getSaldo());
    }

    public function test_dos_ingresos_dinero(): void
    {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->ingresar(3000);
        $this->assertEquals(3100, $cuenta->getSaldo());
    }

    public function test_ingresar_negatiu(): void
    {
        $cuenta = new Cuenta();
        $cuenta->ingresar(-100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    public function test_transferir_cuenta(): void
    {
        $cuenta = new Cuenta();
        $cuenta2 = new Cuenta();

        $cuenta->ingresar(-100);
        $cuenta->transferir($cuenta2,500);

        $this->assertEquals(0, $cuenta->getSaldo());
    }

}

<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\Vehicle;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class VehicleTest extends TestCase
{
    final public function testCodModelo (): void {
        $codModelo = $this->createMock( UnmappedStringValue::class );
        $vehicle   = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $codModelo,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codModelo, $vehicle->codModelo() );
    }

    final public function testValorVehiculo (): void {
        $valorVehiculo = $this->createMock( UnmappedStringValue::class );
        $vehicle       = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $valorVehiculo,
        );

        $this->assertSame( $valorVehiculo, $vehicle->valorVehiculo() );
    }

    final public function testCreate (): void {
        $vehicle = Vehicle::create(
            $codMarca = $this->createMock( UnmappedStringValue::class ),
            $codModelo = $this->createMock( UnmappedStringValue::class ),
            $codTiempoCompra = $this->createMock( UnmappedStringValue::class ),
            $codUso = $this->createMock( UnmappedStringValue::class ),
            $codVersion = $this->createMock( UnmappedStringValue::class ),
            $fecMatriculacion = $this->createMock( UnmappedStringValue::class ),
            $kmVehiculo = $this->createMock( UnmappedStringValue::class ),
            $parking = $this->createMock( UnmappedStringValue::class ),
            $valorVehiculo = $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codMarca, $vehicle->codMarca() );
        $this->assertSame( $codModelo, $vehicle->codModelo() );
        $this->assertSame( $codTiempoCompra, $vehicle->codTiempoCompra() );
        $this->assertSame( $codUso, $vehicle->codUso() );
        $this->assertSame( $codVersion, $vehicle->codVersion() );
        $this->assertSame( $fecMatriculacion, $vehicle->fecMatriculacion() );
        $this->assertSame( $kmVehiculo, $vehicle->kmVehiculo() );
        $this->assertSame( $parking, $vehicle->parking() );
        $this->assertSame( $valorVehiculo, $vehicle->valorVehiculo() );
    }

    final public function testCodMarca (): void {
        $codMarca = $this->createMock( UnmappedStringValue::class );
        $vehicle  = Vehicle::create(
            $codMarca,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codMarca, $vehicle->codMarca() );
    }

    final public function testCodVersion (): void {
        $codVersion = $this->createMock( UnmappedStringValue::class );
        $vehicle    = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $codVersion,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codVersion, $vehicle->codVersion() );
    }

    final public function testCodUso (): void {
        $codUso  = $this->createMock( UnmappedStringValue::class );
        $vehicle = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $codUso,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codUso, $vehicle->codUso() );
    }

    final public function testCodTiempoCompra (): void {
        $codTiempoCompra = $this->createMock( UnmappedStringValue::class );
        $vehicle         = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $codTiempoCompra,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $codTiempoCompra, $vehicle->codTiempoCompra() );
    }

    final public function testKmVehiculo (): void {
        $kmVehiculo = $this->createMock( UnmappedStringValue::class );
        $vehicle    = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $kmVehiculo,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $kmVehiculo, $vehicle->kmVehiculo() );
    }

    final public function testParking (): void {
        $parking = $this->createMock( UnmappedStringValue::class );
        $vehicle = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $parking,
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $parking, $vehicle->parking() );
    }

    final public function testFecMatriculacion (): void {
        $fecMatriculacion = $this->createMock( UnmappedStringValue::class );
        $vehicle          = Vehicle::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $fecMatriculacion,
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertSame( $fecMatriculacion, $vehicle->fecMatriculacion() );
    }
}

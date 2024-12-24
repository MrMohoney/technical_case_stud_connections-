<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\DriverData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class DriverDataTest extends TestCase
{
    final public function testCodDocumento (): void {
        $codDocumento = $this->createMock( UnmappedStringValue::class );
        $driverData   = DriverData::create(
            $codDocumento,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $codDocumento, $driverData->codDocumento() );
    }

    final public function testCodPaisNacimiento (): void {
        $codPaisNacimiento = $this->createMock( UnmappedStringValue::class );
        $driverData        = DriverData::create(
            $this->mockValue(),
            $this->mockValue(), $codPaisNacimiento,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $codPaisNacimiento, $driverData->codPaisNacimiento() );
    }

    final public function testOcupacion (): void {
        $ocupacion  = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $ocupacion,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $ocupacion, $driverData->ocupacion() );
    }

    final public function testFecCarnet (): void {
        $fecCarnet  = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $fecCarnet,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $fecCarnet, $driverData->fecCarnet() );
    }

    final public function testCodPaisExpedicion (): void {
        $codPaisExpedicion = $this->createMock( UnmappedStringValue::class );
        $driverData        = DriverData::create(
            $this->mockValue(), $codPaisExpedicion,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $codPaisExpedicion, $driverData->codPaisExpedicion() );
    }

    final public function testSubDocum (): void {
        $subDocum   = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $subDocum );

        $this->assertSame( $subDocum, $driverData->subDocum() );
    }

    final public function testCodPostal (): void {
        $codPostal  = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $codPostal,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(), $this->mockValue() );

        $this->assertSame( $codPostal, $driverData->codPostal() );
    }

    final public function testCreate (): void {
        $codDocumento      = $this->createMock( UnmappedStringValue::class );
        $codPaisExpedicion = $this->createMock( UnmappedStringValue::class );
        $codPaisNacimiento = $this->createMock( UnmappedStringValue::class );
        $codPostal         = $this->createMock( UnmappedStringValue::class );
        $estadoCivil       = $this->createMock( UnmappedStringValue::class );
        $fecCarnet         = $this->createMock( UnmappedStringValue::class );
        $fecNacimiento     = $this->createMock( UnmappedStringValue::class );
        $hijosCarnet       = $this->createMock( UnmappedStringValue::class );
        $ocupacion         = $this->createMock( UnmappedStringValue::class );
        $profesion         = $this->createMock( UnmappedStringValue::class );
        $puntosCarnet      = $this->createMock( UnmappedStringValue::class );
        $sexo              = $this->createMock( UnmappedStringValue::class );
        $subDocum          = $this->createMock( UnmappedStringValue::class );

        $driverData = DriverData::create( $codDocumento, $codPaisExpedicion, $codPaisNacimiento, $codPostal, $estadoCivil, $fecCarnet, $fecNacimiento, $hijosCarnet, $ocupacion, $profesion, $puntosCarnet, $sexo, $subDocum );

        $this->assertInstanceOf( DriverData::class, $driverData );
        $this->assertSame( $codDocumento, $driverData->codDocumento() );
        $this->assertSame( $codPaisExpedicion, $driverData->codPaisExpedicion() );
        $this->assertSame( $codPaisNacimiento, $driverData->codPaisNacimiento() );
        $this->assertSame( $codPostal, $driverData->codPostal() );
        $this->assertSame( $estadoCivil, $driverData->estadoCivil() );
        $this->assertSame( $fecCarnet, $driverData->fecCarnet() );
        $this->assertSame( $fecNacimiento, $driverData->fecNacimiento() );
        $this->assertSame( $hijosCarnet, $driverData->hijosCarnet() );
        $this->assertSame( $ocupacion, $driverData->ocupacion() );
        $this->assertSame( $profesion, $driverData->profesion() );
        $this->assertSame( $puntosCarnet, $driverData->puntosCarnet() );
        $this->assertSame( $sexo, $driverData->sexo() );
        $this->assertSame( $subDocum, $driverData->subDocum() );
    }

    final public function testHijosCarnet (): void {
        $hijosCarnet = $this->createMock( UnmappedStringValue::class );
        $driverData  = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $hijosCarnet,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
        );

        $this->assertSame( $hijosCarnet, $driverData->hijosCarnet() );
    }

    final public function testEstadoCivil (): void {
        $estadoCivil = $this->createMock( UnmappedStringValue::class );
        $driverData  = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $estadoCivil,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
        );

        $this->assertSame( $estadoCivil, $driverData->estadoCivil() );
    }

    final public function testFecNacimiento (): void {
        $fecNacimiento = $this->createMock( UnmappedStringValue::class );
        $driverData    = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $fecNacimiento,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
        );

        $this->assertSame( $fecNacimiento, $driverData->fecNacimiento() );
    }

    final public function testSexo (): void {
        $sexo       = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $sexo,
            $this->mockValue(),
        );

        $this->assertSame( $sexo, $driverData->sexo() );
    }

    final public function testProfesion (): void {
        $profesion  = $this->createMock( UnmappedStringValue::class );
        $driverData = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $profesion,
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
        );

        $this->assertSame( $profesion, $driverData->profesion() );
    }

    final public function testPuntosCarnet (): void {
        $puntosCarnet = $this->createMock( UnmappedStringValue::class );
        $driverData   = DriverData::create(
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $this->mockValue(),
            $puntosCarnet,
            $this->mockValue(),
            $this->mockValue(),
        );

        $this->assertSame( $puntosCarnet, $driverData->puntosCarnet() );
    }

    private function mockValue (): UnmappedStringValue {
        return $this->createMock( UnmappedStringValue::class );
    }


}

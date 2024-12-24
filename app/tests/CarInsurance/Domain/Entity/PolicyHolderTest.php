<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\PolicyHolder;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class PolicyHolderTest extends TestCase
{

    final public function testCreate (): void {
        $policyHolder = PolicyHolder::create(
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
            $this->createMock( UnmappedStringValue::class ),
        );

        $this->assertInstanceOf( PolicyHolder::class, $policyHolder );
    }

    final public function testFecNacimiento (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->fecNacimiento() );
    }

    final public function testDomicilio (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->domicilio() );
    }

    final public function testEmpresa (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->empresa() );
    }

    final public function testNroDocumento (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->nroDocumento() );
    }

    final public function testFecCarnet (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->fecCarnet() );
    }

    final public function testCodDocumento (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->codDocumento() );
    }

    final public function testCodPais (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->codPais() );
    }

    final public function testSubCodDocumento (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->subCodDocumento() );
    }

    final public function testCodActividad (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->codActividad() );
    }

    final public function testCodError (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->codError() );
    }

    final public function testCodPostal (): void {
        $value        = $this->createMock( UnmappedStringValue::class );
        $policyHolder = PolicyHolder::create( ...array_fill( 0, 11, $value ) );
        $this->assertSame( $value, $policyHolder->codPostal() );
    }
}

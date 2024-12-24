<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\Person;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{

    final public function testCodActividad (): void {
        $codActividad = $this->createMock( UnmappedStringValue::class );
        $person       = $this->createPersonWithMockValues( codActividad: $codActividad );

        $this->assertSame( $codActividad, $person->codActividad() );
    }

    final public function testCodDocumento (): void {
        $codDocumento = $this->createMock( UnmappedStringValue::class );
        $person       = $this->createPersonWithMockValues( codDocumento: $codDocumento );

        $this->assertSame( $codDocumento, $person->codDocumento() );
    }

    final public function testCodError (): void {
        $codError = $this->createMock( UnmappedStringValue::class );
        $person   = $this->createPersonWithMockValues( codError: $codError );

        $this->assertSame( $codError, $person->codError() );
    }

    final public function testCodPais (): void {
        $codPais = $this->createMock( UnmappedStringValue::class );
        $person  = $this->createPersonWithMockValues( codPais: $codPais );

        $this->assertSame( $codPais, $person->codPais() );
    }

    final public function testDomicilio (): void {
        $domicilio = $this->createMock( UnmappedStringValue::class );
        $person    = $this->createPersonWithMockValues( domicilio: $domicilio );

        $this->assertSame( $domicilio, $person->domicilio() );
    }

    final public function testEmpresa (): void {
        $empresa = $this->createMock( UnmappedStringValue::class );
        $person  = $this->createPersonWithMockValues( empresa: $empresa );

        $this->assertSame( $empresa, $person->empresa() );
    }

    final public function testFecCarnet (): void {
        $fecCarnet = $this->createMock( UnmappedStringValue::class );
        $person    = $this->createPersonWithMockValues( fecCarnet: $fecCarnet );

        $this->assertSame( $fecCarnet, $person->fecCarnet() );
    }

    final public function testFecNacimiento (): void {
        $fecNacimiento = $this->createMock( UnmappedStringValue::class );
        $person        = $this->createPersonWithMockValues( fecNacimiento: $fecNacimiento );

        $this->assertSame( $fecNacimiento, $person->fecNacimiento() );
    }

    final public function testNroDocumento (): void {
        $nroDocumento = $this->createMock( UnmappedStringValue::class );
        $person       = $this->createPersonWithMockValues( nroDocumento: $nroDocumento );

        $this->assertSame( $nroDocumento, $person->nroDocumento() );
    }

    final public function testSubCodDocumento (): void {
        $subCodDocumento = $this->createMock( UnmappedStringValue::class );
        $person          = $this->createPersonWithMockValues( subCodDocumento: $subCodDocumento );

        $this->assertSame( $subCodDocumento, $person->subCodDocumento() );
    }

    private function createPersonWithMockValues (
        UnmappedStringValue $codActividad = null,
        UnmappedStringValue $codDocumento = null,
        UnmappedStringValue $codError = null,
        UnmappedStringValue $codPais = null,
        UnmappedStringValue $domicilio = null,
        UnmappedStringValue $empresa = null,
        UnmappedStringValue $fecCarnet = null,
        UnmappedStringValue $fecNacimiento = null,
        UnmappedStringValue $nroDocumento = null,
        UnmappedStringValue $subCodDocumento = null,
    ): Person {
        return new class(
            $codActividad ?? $this->createMock( UnmappedStringValue::class ),
            $codDocumento ?? $this->createMock( UnmappedStringValue::class ),
            $codError ?? $this->createMock( UnmappedStringValue::class ),
            $codPais ?? $this->createMock( UnmappedStringValue::class ),
            $domicilio ?? $this->createMock( UnmappedStringValue::class ),
            $empresa ?? $this->createMock( UnmappedStringValue::class ),
            $fecCarnet ?? $this->createMock( UnmappedStringValue::class ),
            $fecNacimiento ?? $this->createMock( UnmappedStringValue::class ),
            $nroDocumento ?? $this->createMock( UnmappedStringValue::class ),
            $subCodDocumento ?? $this->createMock( UnmappedStringValue::class )
        ) extends Person {
        };
    }
}

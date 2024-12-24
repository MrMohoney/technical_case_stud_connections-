<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\DriverDataDTO;
use App\CarInsurance\Domain\Entity\DriverData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class DriverDataDTOTest extends TestCase
{
    final public function testConstructorInitializesProperties (): void {
        $driverDataDTO = new DriverDataDTO(
            'DOC123',
            'ES',
            'FR',
            '28001',
            'Single',
            '2001-01-01',
            '1980-05-15',
            'Yes',
            'Engineer',
            'Software',
            '15',
            'Male',
            'Sub Doc 456',
        );

        $this->assertSame( 'DOC123', $driverDataDTO->codDocumento );
        $this->assertSame( 'ES', $driverDataDTO->codPaisExpedicion );
        $this->assertSame( 'FR', $driverDataDTO->codPaisNacimiento );
        $this->assertSame( '28001', $driverDataDTO->codPostal );
        $this->assertSame( 'Single', $driverDataDTO->estadoCivil );
        $this->assertSame( '2001-01-01', $driverDataDTO->fecCarnet );
        $this->assertSame( '1980-05-15', $driverDataDTO->fecNacimiento );
        $this->assertSame( 'Yes', $driverDataDTO->hijosCarnet );
        $this->assertSame( 'Engineer', $driverDataDTO->ocupacion );
        $this->assertSame( 'Software', $driverDataDTO->profesion );
        $this->assertSame( '15', $driverDataDTO->puntosCarnet );
        $this->assertSame( 'Male', $driverDataDTO->sexo );
        $this->assertSame( 'Sub Doc 456', $driverDataDTO->subDocum );
    }

    final public function testFromEntity (): void {
        $driverDataMock = $this->createMock( DriverData::class );

        $driverDataMock->method( 'codDocumento' )->willReturn( new UnmappedStringValue( 'DOC123' ) );
        $driverDataMock->method( 'codPaisExpedicion' )->willReturn( new UnmappedStringValue( 'ES' ) );
        $driverDataMock->method( 'codPaisNacimiento' )->willReturn( new UnmappedStringValue( 'FR' ) );
        $driverDataMock->method( 'codPostal' )->willReturn( new UnmappedStringValue( '28001' ) );
        $driverDataMock->method( 'estadoCivil' )->willReturn( new UnmappedStringValue( 'Single' ) );
        $driverDataMock->method( 'fecCarnet' )->willReturn( new UnmappedStringValue( '2001-01-01' ) );
        $driverDataMock->method( 'fecNacimiento' )->willReturn( new UnmappedStringValue( '1980-05-15' ) );
        $driverDataMock->method( 'hijosCarnet' )->willReturn( new UnmappedStringValue( 'Yes' ) );
        $driverDataMock->method( 'ocupacion' )->willReturn( new UnmappedStringValue( 'Engineer' ) );
        $driverDataMock->method( 'profesion' )->willReturn( new UnmappedStringValue( 'Software' ) );
        $driverDataMock->method( 'puntosCarnet' )->willReturn( new UnmappedStringValue( '15' ) );
        $driverDataMock->method( 'sexo' )->willReturn( new UnmappedStringValue( 'Male' ) );
        $driverDataMock->method( 'subDocum' )->willReturn( new UnmappedStringValue( 'Sub Doc 456' ) );

        $driverDataDTO = DriverDataDTO::fromEntity( $driverDataMock );

        $this->assertSame( 'DOC123', $driverDataDTO->codDocumento );
        $this->assertSame( 'ES', $driverDataDTO->codPaisExpedicion );
        $this->assertSame( 'FR', $driverDataDTO->codPaisNacimiento );
        $this->assertSame( '28001', $driverDataDTO->codPostal );
        $this->assertSame( 'Single', $driverDataDTO->estadoCivil );
        $this->assertSame( '2001-01-01', $driverDataDTO->fecCarnet );
        $this->assertSame( '1980-05-15', $driverDataDTO->fecNacimiento );
        $this->assertSame( 'Yes', $driverDataDTO->hijosCarnet );
        $this->assertSame( 'Engineer', $driverDataDTO->ocupacion );
        $this->assertSame( 'Software', $driverDataDTO->profesion );
        $this->assertSame( '15', $driverDataDTO->puntosCarnet );
        $this->assertSame( 'Male', $driverDataDTO->sexo );
        $this->assertSame( 'Sub Doc 456', $driverDataDTO->subDocum );
    }
}

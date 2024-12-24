<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\HolderDataDTO;
use App\CarInsurance\Domain\Entity\HolderData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class HolderDataDTOTest extends TestCase
{
    final public function testConstructorInitializesPropertiesCorrectly (): void {
        $dto = new HolderDataDTO(
            codActividad   : 'A123',
            codDocumento   : 'D456',
            codError       : 'E789',
            codPais        : 'PA',
            domicilio      : '123 Main St',
            empresa        : 'ACME Inc.',
            fecCarnet      : '2023-10-01',
            fecNacimiento  : '1990-05-25',
            nroDocumento   : '987654321',
            subCodDocumento: 'SUB123',
        );

        $this->assertSame( 'A123', $dto->codActividad );
        $this->assertSame( 'D456', $dto->codDocumento );
        $this->assertSame( 'E789', $dto->codError );
        $this->assertSame( 'PA', $dto->codPais );
        $this->assertSame( '123 Main St', $dto->domicilio );
        $this->assertSame( 'ACME Inc.', $dto->empresa );
        $this->assertSame( '2023-10-01', $dto->fecCarnet );
        $this->assertSame( '1990-05-25', $dto->fecNacimiento );
        $this->assertSame( '987654321', $dto->nroDocumento );
        $this->assertSame( 'SUB123', $dto->subCodDocumento );
    }

    final public function testFromEntityCreatesDtoCorrectly (): void {
        $holderDataMock = $this->createMock( HolderData::class );

        $holderDataMock->method( 'codActividad' )
            ->willReturn( new UnmappedStringValue( 'A123' ) );

        $holderDataMock->method( 'codDocumento' )
            ->willReturn( new UnmappedStringValue( 'D456' ) );

        $holderDataMock->method( 'codError' )
            ->willReturn( new UnmappedStringValue( 'E789' ) );

        $holderDataMock->method( 'codPais' )
            ->willReturn( new UnmappedStringValue( 'PA' ) );

        $holderDataMock->method( 'domicilio' )
            ->willReturn( new UnmappedStringValue( '123 Main St' ) );

        $holderDataMock->method( 'empresa' )
            ->willReturn( new UnmappedStringValue( 'ACME Inc.' ) );

        $holderDataMock->method( 'fecCarnet' )
            ->willReturn( new UnmappedStringValue( '2023-10-01' ) );

        $holderDataMock->method( 'fecNacimiento' )
            ->willReturn( new UnmappedStringValue( '1990-05-25' ) );

        $holderDataMock->method( 'nroDocumento' )
            ->willReturn( new UnmappedStringValue( '987654321' ) );

        $holderDataMock->method( 'subCodDocumento' )
            ->willReturn( new UnmappedStringValue( 'SUB123' ) );

        $dto = HolderDataDTO::fromEntity( $holderDataMock );

        $this->assertSame( 'A123', $dto->codActividad );
        $this->assertSame( 'D456', $dto->codDocumento );
        $this->assertSame( 'E789', $dto->codError );
        $this->assertSame( 'PA', $dto->codPais );
        $this->assertSame( '123 Main St', $dto->domicilio );
        $this->assertSame( 'ACME Inc.', $dto->empresa );
        $this->assertSame( '2023-10-01', $dto->fecCarnet );
        $this->assertSame( '1990-05-25', $dto->fecNacimiento );
        $this->assertSame( '987654321', $dto->nroDocumento );
        $this->assertSame( 'SUB123', $dto->subCodDocumento );
    }
}

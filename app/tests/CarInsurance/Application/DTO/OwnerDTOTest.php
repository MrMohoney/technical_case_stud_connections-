<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\OwnerDTO;
use App\CarInsurance\Domain\Entity\OwnerData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class OwnerDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $ownerDTO = new OwnerDTO(
            codActividad    : 'CA123',
            codDocumento    : 'DOC456',
            codError        : 'ERR789',
            codPais         : 'PA001',
            domicilio       : '123 Main Street',
            empresa         : 'Some Company',
            fecCarnet       : '2023-01-01',
            fecNacimiento   : '1990-07-15',
            nroDocumento    : '987654321',
            subCodDocumento : 'SUB123',
            owner           : 'John Doe',
            isHolderTheOwner: 'Yes',
        );

        $this->assertSame( 'CA123', $ownerDTO->codActividad );
        $this->assertSame( 'DOC456', $ownerDTO->codDocumento );
        $this->assertSame( 'ERR789', $ownerDTO->codError );
        $this->assertSame( 'PA001', $ownerDTO->codPais );
        $this->assertSame( '123 Main Street', $ownerDTO->domicilio );
        $this->assertSame( 'Some Company', $ownerDTO->empresa );
        $this->assertSame( '2023-01-01', $ownerDTO->fecCarnet );
        $this->assertSame( '1990-07-15', $ownerDTO->fecNacimiento );
        $this->assertSame( '987654321', $ownerDTO->nroDocumento );
        $this->assertSame( 'SUB123', $ownerDTO->subCodDocumento );
        $this->assertSame( 'John Doe', $ownerDTO->owner );
        $this->assertSame( 'Yes', $ownerDTO->isHolderTheOwner );
    }

    final public function testFromEntity (): void {
        $mockOwnerData = $this->createMock( OwnerData::class );

        $mockOwnerData->method( 'codActividad' )->willReturn( new UnmappedStringValue( 'CA123' ) );
        $mockOwnerData->method( 'codDocumento' )->willReturn( new UnmappedStringValue( 'DOC456' ) );
        $mockOwnerData->method( 'codError' )->willReturn( new UnmappedStringValue( 'ERR789' ) );
        $mockOwnerData->method( 'codPais' )->willReturn( new UnmappedStringValue( 'PA001' ) );
        $mockOwnerData->method( 'domicilio' )->willReturn( new UnmappedStringValue( '123 Main Street' ) );
        $mockOwnerData->method( 'empresa' )->willReturn( new UnmappedStringValue( 'Some Company' ) );
        $mockOwnerData->method( 'fecCarnet' )->willReturn( new UnmappedStringValue( '2023-01-01' ) );
        $mockOwnerData->method( 'fecNacimiento' )->willReturn( new UnmappedStringValue( '1990-07-15' ) );
        $mockOwnerData->method( 'nroDocumento' )->willReturn( new UnmappedStringValue( '987654321' ) );
        $mockOwnerData->method( 'subCodDocumento' )->willReturn( new UnmappedStringValue( 'SUB123' ) );
        $mockOwnerData->method( 'owner' )->willReturn( new UnmappedStringValue( 'John Doe' ) );
        $mockOwnerData->method( 'isHolderTheOwner' )->willReturn( new UnmappedStringValue( 'Yes' ) );

        $ownerDTO = OwnerDTO::fromEntity( $mockOwnerData );

        $this->assertSame( 'CA123', $ownerDTO->codActividad );
        $this->assertSame( 'DOC456', $ownerDTO->codDocumento );
        $this->assertSame( 'ERR789', $ownerDTO->codError );
        $this->assertSame( 'PA001', $ownerDTO->codPais );
        $this->assertSame( '123 Main Street', $ownerDTO->domicilio );
        $this->assertSame( 'Some Company', $ownerDTO->empresa );
        $this->assertSame( '2023-01-01', $ownerDTO->fecCarnet );
        $this->assertSame( '1990-07-15', $ownerDTO->fecNacimiento );
        $this->assertSame( '987654321', $ownerDTO->nroDocumento );
        $this->assertSame( 'SUB123', $ownerDTO->subCodDocumento );
        $this->assertSame( 'John Doe', $ownerDTO->owner );
        $this->assertSame( 'Yes', $ownerDTO->isHolderTheOwner );
    }
}

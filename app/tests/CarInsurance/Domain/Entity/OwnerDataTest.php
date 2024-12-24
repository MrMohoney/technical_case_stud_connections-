<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\OwnerData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class OwnerDataTest extends TestCase
{

    final public function testCreateReturnsInstance (): void {
        $codActividad     = $this->createMock( UnmappedStringValue::class );
        $codDocumento     = $this->createMock( UnmappedStringValue::class );
        $codError         = $this->createMock( UnmappedStringValue::class );
        $codPais          = $this->createMock( UnmappedStringValue::class );
        $domicilio        = $this->createMock( UnmappedStringValue::class );
        $empresa          = $this->createMock( UnmappedStringValue::class );
        $fecCarnet        = $this->createMock( UnmappedStringValue::class );
        $fecNacimiento    = $this->createMock( UnmappedStringValue::class );
        $nroDocumento     = $this->createMock( UnmappedStringValue::class );
        $subCodDocumento  = $this->createMock( UnmappedStringValue::class );
        $owner            = $this->createMock( UnmappedStringValue::class );
        $isHolderTheOwner = $this->createMock( UnmappedStringValue::class );

        $ownerData = OwnerData::create(
            $codActividad,
            $codDocumento,
            $codError,
            $codPais,
            $domicilio,
            $empresa,
            $fecCarnet,
            $fecNacimiento,
            $nroDocumento,
            $subCodDocumento,
            $owner,
            $isHolderTheOwner,
        );

        $this->assertInstanceOf( OwnerData::class, $ownerData );
    }

    final public function testOwnerReturnsCorrectValue (): void {
        $owner            = $this->createMock( UnmappedStringValue::class );
        $isHolderTheOwner = $this->createMock( UnmappedStringValue::class );

        $ownerData = OwnerData::create(
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
            $owner,
            $isHolderTheOwner,
        );

        $this->assertEquals( $owner, $ownerData->owner() );
    }

    final public function testIsHolderTheOwnerReturnsCorrectValue (): void {
        $owner            = $this->createMock( UnmappedStringValue::class );
        $isHolderTheOwner = $this->createMock( UnmappedStringValue::class );

        $ownerData = OwnerData::create(
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
            $owner,
            $isHolderTheOwner,
        );

        $this->assertEquals( $isHolderTheOwner, $ownerData->isHolderTheOwner() );
    }
}

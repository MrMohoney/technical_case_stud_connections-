<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Entity;

use App\CarInsurance\Domain\Entity\OwnerData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class HolderDataTest extends TestCase
{

    final public function testCreate (): void {
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

        $holderData = OwnerData::create(
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

        $this->assertInstanceOf( OwnerData::class, $holderData );
        $this->assertSame( $owner, $holderData->owner() );
        $this->assertSame( $isHolderTheOwner, $holderData->isHolderTheOwner() );
    }

    final public function testOwner (): void {
        $owner            = $this->createMock( UnmappedStringValue::class );
        $isHolderTheOwner = $this->createMock( UnmappedStringValue::class );

        $holderData = OwnerData::create(
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

        $this->assertSame( $owner, $holderData->owner() );
    }

    final public function testIsHolderTheOwner (): void {
        $owner            = $this->createMock( UnmappedStringValue::class );
        $isHolderTheOwner = $this->createMock( UnmappedStringValue::class );

        $holderData = OwnerData::create(
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

        $this->assertSame( $isHolderTheOwner, $holderData->isHolderTheOwner() );
    }
}

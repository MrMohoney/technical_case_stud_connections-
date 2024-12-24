<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\CoverageDataDTO;
use App\CarInsurance\Domain\Entity\CoverageData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class CoverageDataDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $dto = new CoverageDataDTO( 'COVERAGE001', '100.00' );

        $this->assertSame( 'COVERAGE001', $dto->codCobertura );
        $this->assertSame( '100.00', $dto->valor );
    }

    final public function testFromEntity (): void {
        $coverageDataMock = $this->createMock( CoverageData::class );

        $coverageDataMock->method( 'codCobertura' )
            ->willReturn( new UnmappedStringValue( 'COVERAGE001' ) );

        $coverageDataMock->method( 'valor' )
            ->willReturn( new UnmappedStringValue( '100.00' ) );

        $dto = CoverageDataDTO::fromEntity( $coverageDataMock );

        $this->assertSame( 'COVERAGE001', $dto->codCobertura );
        $this->assertSame( '100.00', $dto->valor );
    }
}

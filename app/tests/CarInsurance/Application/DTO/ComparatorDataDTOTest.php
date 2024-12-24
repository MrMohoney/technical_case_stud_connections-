<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\ComparatorDataDTO;
use App\CarInsurance\Domain\Entity\ComparatorData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class ComparatorDataDTOTest extends TestCase
{
    final public function testConstructorInitializesProperties (): void {
        $dto = new ComparatorDataDTO(
            'Yes',
            '2020',
            'No',
            'Full Coverage',
        );

        $this->assertSame( 'Yes', $dto->morosidadComparador );
        $this->assertSame( '2020', $dto->anioVdaActual );
        $this->assertSame( 'No', $dto->multasUlt3anios );
        $this->assertSame( 'Full Coverage', $dto->tipoSeguro );
    }

    final public function testFromEntityCreatesDTOCorrectly (): void {
        $comparatorDataMock = $this->createMock( ComparatorData::class );

        $comparatorDataMock->method( 'morosidadComparador' )
            ->willReturn( new UnmappedStringValue( 'Yes' ) );

        $comparatorDataMock->method( 'anioVdaActual' )
            ->willReturn( new UnmappedStringValue( '2020' ) );

        $comparatorDataMock->method( 'multasUlt3anios' )
            ->willReturn( new UnmappedStringValue( 'No' ) );

        $comparatorDataMock->method( 'tipoSeguro' )
            ->willReturn( new UnmappedStringValue( 'Full Coverage' ) );

        $dto = ComparatorDataDTO::fromEntity( $comparatorDataMock );

        $this->assertSame( 'Yes', $dto->morosidadComparador );
        $this->assertSame( '2020', $dto->anioVdaActual );
        $this->assertSame( 'No', $dto->multasUlt3anios );
        $this->assertSame( 'Full Coverage', $dto->tipoSeguro );
    }
}

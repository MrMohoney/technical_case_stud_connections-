<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\CoverageDataMapper;
use App\CarInsurance\Domain\Entity\CoverageData;
use PHPUnit\Framework\TestCase;

class CoverageDataMapperTest extends TestCase
{
    final public function testMapToEntity (): void {
        $mapper = new CoverageDataMapper();
        $data   = [
            'codCobertura' => 'codCobertura',
            'valor'        => 'valor',
        ];

        $entity = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( CoverageData::class, $entity );

        $this->assertSame( 'codCobertura', $entity->codCobertura()->value() );
        $this->assertSame( 'valor', $entity->valor()->value() );
    }
}

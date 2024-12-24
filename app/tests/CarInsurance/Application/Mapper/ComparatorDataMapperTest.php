<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\ComparatorDataMapper;
use App\CarInsurance\Domain\Entity\ComparatorData;
use PHPUnit\Framework\TestCase;

class ComparatorDataMapperTest extends TestCase
{
    final public function testMapToEntity (): void {
        $data = [
            'prevInsurance_fineAlcohol' => 'prevInsurance_fineAlcohol',
            'prevInsurance_fineOther'   => 'prevInsurance_fineOther',
            'prevInsurance_fineParking' => 'prevInsurance_fineParking',
            'prevInsurance_fineSpeed'   => 'prevInsurance_fineSpeed',
            'prevInsurance_fines'       => 'prevInsurance_fines',
            'prevInsurance_modality'    => 'prevInsurance_modality',
            'morosidadComparador'       => 'morosidadComparador',
            'anioVdaActual'             => 'anioVdaActual',
            'multasUlt3anios'           => 'multasUlt3anios',
            'tipoSeguro'                => 'tipoSeguro',
        ];

        $mapper = new ComparatorDataMapper();

        $entity = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( ComparatorData::class, $entity );

        $this->assertEquals( 'morosidadComparador', $entity->morosidadComparador()->value() );
        $this->assertEquals( 'anioVdaActual', $entity->anioVdaActual()->value() );
        $this->assertEquals( 'multasUlt3anios', $entity->multasUlt3anios()->value() );
        $this->assertEquals( 'tipoSeguro', $entity->tipoSeguro()->value() );
    }
}

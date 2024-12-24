<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\AdditionalDataMapper;
use App\CarInsurance\Domain\Entity\AdditionalData;
use PHPUnit\Framework\TestCase;

class AdditionalDataMapperTest extends TestCase
{
    final public function testMapToEntity (): void {
        $data = [
            'reference_code'    => 'reference_code',
            'empresa'           => 'TestEmpresa',
            'faseTarificacion'  => 'TestFase',
            'identificador'     => 'TestID',
            'plataforma'        => 'TestPlataforma',
            'tipoTarificacion'  => 'TestTipo',
            'versionCotizacion' => 'TestVersion',
        ];

        $mapper = new AdditionalDataMapper();
        $result = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( AdditionalData::class, $result );

        $this->assertEquals( 'TestEmpresa', $result->empresa()->value() );
        $this->assertEquals( 'TestFase', $result->faseTarificacion()->value() );
        $this->assertEquals( 'TestID', $result->identificador()->value() );
        $this->assertEquals( 'TestPlataforma', $result->plataforma()->value() );
        $this->assertEquals( 'TestTipo', $result->tipoTarificacion()->value() );
        $this->assertEquals( 'TestVersion', $result->versionCotizacion()->value() );
    }
}

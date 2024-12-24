<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\PolicyHolderMapper;
use App\CarInsurance\Domain\Entity\PolicyHolder;
use PHPUnit\Framework\TestCase;

class PolicyHolderMapperTest extends TestCase
{

    final public function testMapToEntityWithoutGetMethods (): void {
        $data = [
            'codActividad'    => 'codActividad',
            'codDocumento'    => 'codDocumento',
            'codError'        => 'codError',
            'codPais'         => 'codPais',
            'domicilio'       => 'domicilio',
            'codPostal'       => 'codPostal',
            'empresa'         => 'empresa',
            'fecCarnet'       => 'fecCarnet',
            'fecNacimiento'   => 'fecNacimiento',
            'nroDocumento'    => 'nroDocumento',
            'subCodDocumento' => 'subCodDocumento',
        ];

        $mapper = new PolicyHolderMapper();

        $result = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( PolicyHolder::class, $result );
        $this->assertEquals( 'codActividad', $result->codActividad()->value() );
        $this->assertEquals( 'codDocumento', $result->codDocumento()->value() );
        $this->assertEquals( 'codError', $result->codError()->value() );
        $this->assertEquals( 'codPais', $result->codPais()->value() );
        $this->assertEquals( 'domicilio', $result->domicilio()->value() );
        $this->assertEquals( 'codPostal', $result->codPostal()->value() );
        $this->assertEquals( 'empresa', $result->empresa()->value() );
        $this->assertEquals( 'fecCarnet', $result->fecCarnet()->value() );
        $this->assertEquals( 'fecNacimiento', $result->fecNacimiento()->value() );
        $this->assertEquals( 'nroDocumento', $result->nroDocumento()->value() );
        $this->assertEquals( 'subCodDocumento', $result->subCodDocumento()->value() );
    }
}

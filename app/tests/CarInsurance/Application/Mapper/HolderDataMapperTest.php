<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\HolderDataMapper;
use App\CarInsurance\Domain\Entity\HolderData;
use PHPUnit\Framework\TestCase;

class HolderDataMapperTest extends TestCase
{

    final public function testMapToEntity (): void {
        $data = [
            'holder'             => 'John Doe',
            'holder_birthDate'   => '1990-01-01',
            'holder_civilStatus' => 'Single',
            'holder_id'          => '12345',
            'holder_idType'      => 'Passport',
            'holder_licenseDate' => '2010-06-15',
            'holder_profession'  => 'Software Engineer',
            'holder_sex'         => 'M',
            'codActividad'       => 'Tech',
            'codDocumento'       => 'DOC123',
            'codError'           => null,
            'codPais'            => 'US',
            'domicilio'          => '123 Main St',
            'empresa'            => 'TechCorp',
            'fecCarnet'          => '2010-06-15',
            'nroDocumento'       => '987654',
            'subCodDocumento'    => 'SUB001',
        ];

        $mapper = new HolderDataMapper();

        $entity = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( HolderData::class, $entity );
        $this->assertSame( 'Tech', $entity->codActividad()->value() );
        $this->assertSame( 'DOC123', $entity->codDocumento()->value() );
        $this->assertNull( $entity->codError()->value() );
        $this->assertSame( 'US', $entity->codPais()->value() );
        $this->assertSame( '123 Main St', $entity->domicilio()->value() );
        $this->assertSame( 'TechCorp', $entity->empresa()->value() );
        $this->assertSame( '2010-06-15', $entity->fecCarnet()->value() );
        $this->assertSame( '1990-01-01', $entity->fecNacimiento()->value() );
        $this->assertSame( '987654', $entity->nroDocumento()->value() );
        $this->assertSame( 'SUB001', $entity->subCodDocumento()->value() );
    }
}

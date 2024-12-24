<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\OwnerDataMapper;
use PHPUnit\Framework\TestCase;

class OwnerDataMapperTest extends TestCase
{

    final public function testMapToEntity (): void {
        $data = [
            'driver_birthDate'        => 'driver_birthDate',
            'driver_birthPlace'       => 'driver_birthPlace',
            'driver_birthPlaceMain'   => 'driver_birthPlaceMain',
            'driver_children'         => 'driver_children',
            'driver_civilStatus'      => 'driver_civilStatus',
            'driver_id'               => 'driver_id',
            'driver_idType'           => 'driver_idType',
            'driver_licenseDate'      => 'driver_licenseDate',
            'driver_licensePlace'     => 'driver_licensePlace',
            'driver_licensePlaceMain' => 'driver_licensePlaceMain',
            'driver_profession'       => 'driver_profession',
            'driver_sex'              => 'driver_sex',
            'codActividad'            => 'codActividad',
            'codDocumento'            => 'codDocumento',
            'codError'                => 'codError',
            'codPais'                 => 'codPais',
            'domicilio'               => 'domicilio',
            'empresa'                 => 'empresa',
            'fecCarnet'               => 'fecCarnet',
            'nroDocumento'            => 'nroDocumento',
            'subCodDocumento'         => 'subCodDocumento',
            'QuienEsPropietario'      => 'QuienEsPropietario',
            'TomadorEsPropietario'    => 'TomadorEsPropietario',
        ];

        $mapper = new OwnerDataMapper();

        $result = $mapper->mapToEntity( $data );

        $this->assertSame( 'codActividad', $result->codActividad()->value() );
        $this->assertSame( 'codDocumento', $result->codDocumento()->value() );
        $this->assertSame( 'codError', $result->codError()->value() );
        $this->assertSame( 'codPais', $result->codPais()->value() );
        $this->assertSame( 'domicilio', $result->domicilio()->value() );
        $this->assertSame( 'empresa', $result->empresa()->value() );
        $this->assertSame( 'fecCarnet', $result->fecCarnet()->value() );
        $this->assertSame( 'driver_birthDate', $result->fecNacimiento()->value() );
        $this->assertSame( 'nroDocumento', $result->nroDocumento()->value() );
        $this->assertSame( 'subCodDocumento', $result->subCodDocumento()->value() );
        $this->assertSame( 'QuienEsPropietario', $result->owner()->value() );
        $this->assertSame( 'TomadorEsPropietario', $result->isHolderTheOwner()->value() );
    }
}

<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\DriverDataMapper;
use App\CarInsurance\Domain\Entity\DriverData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class DriverDataMapperTest extends TestCase
{

    final public function testMapToEntity (): void {
        $data = [
            'driver_birthDate'        => 'driver_idType',
            'driver_birthPlace'       => 'driver_licensePlaceMain',
            'driver_birthPlaceMain'   => 'driver_birthPlace',
            'driver_children'         => 'driver_children',
            'driver_civilStatus'      => 'driver_civilStatus',
            'driver_id'               => 'driver_licenseDate',
            'driver_idType'           => 'driver_birthDate',
            'driver_licenseDate'      => 'driver_licenseDate',
            'driver_licensePlace'     => 'driver_licensePlace',
            'driver_licensePlaceMain' => 'driver_profession',
            'driver_profession'       => 'driver_profession',
            'driver_sex'              => 'driver_sex',
            'driver_subDocum'         => null,
            'codPostal'               => 'codPostal',
            'hijosCarnet'             => 'hijosCarnet',
            'ocupacion'               => 'ocupacion',
            'puntosCarnet'            => 'puntosCarnet',
        ];

        $expectedDriverData = DriverData::create(
            new UnmappedStringValue( $data[ 'driver_idType' ] ),
            new UnmappedStringValue( $data[ 'driver_licensePlaceMain' ] ),
            new UnmappedStringValue( $data[ 'driver_birthPlace' ] ),
            new UnmappedStringValue( $data[ 'codPostal' ] ),
            new UnmappedStringValue( $data[ 'driver_civilStatus' ] ),
            new UnmappedStringValue( $data[ 'driver_licenseDate' ] ),
            new UnmappedStringValue( $data[ 'driver_birthDate' ] ),
            new UnmappedStringValue( $data[ 'hijosCarnet' ] ),
            new UnmappedStringValue( $data[ 'ocupacion' ] ),
            new UnmappedStringValue( $data[ 'driver_profession' ] ),
            new UnmappedStringValue( $data[ 'puntosCarnet' ] ),
            new UnmappedStringValue( $data[ 'driver_sex' ] ),
            new UnmappedStringValue( $data[ 'driver_subDocum' ] ),
        );

        $mapper = new DriverDataMapper();

        $result = $mapper->mapToEntity( $data );

        $this->assertEquals( $data[ 'driver_idType' ], $result->codDocumento()->value() );
        $this->assertEquals( $data[ 'driver_licensePlaceMain' ], $result->codPaisExpedicion()->value() );
        $this->assertEquals( $data[ 'driver_birthPlace' ], $result->codPaisNacimiento()->value() );
        $this->assertEquals( $data[ 'codPostal' ], $result->codPostal()->value() );
        $this->assertEquals( $data[ 'driver_civilStatus' ], $result->estadoCivil()->value() );
        $this->assertEquals( $data[ 'driver_licenseDate' ], $result->fecCarnet()->value() );
        $this->assertEquals( $data[ 'driver_birthDate' ], $result->fecNacimiento()->value() );
        $this->assertEquals( $data[ 'hijosCarnet' ], $result->hijosCarnet()->value() );
        $this->assertEquals( $data[ 'ocupacion' ], $result->ocupacion()->value() );
        $this->assertEquals( $data[ 'driver_profession' ], $result->profesion()->value() );
        $this->assertEquals( $data[ 'puntosCarnet' ], $result->puntosCarnet()->value() );
        $this->assertEquals( $data[ 'driver_sex' ], $result->sexo()->value() );
        $this->assertEquals( $data[ 'driver_subDocum' ], $result->subDocum()->value() );
    }
}

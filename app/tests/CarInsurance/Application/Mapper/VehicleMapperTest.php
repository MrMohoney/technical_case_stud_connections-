<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\VehicleMapper;
use App\CarInsurance\Domain\Entity\Vehicle;
use PHPUnit\Framework\TestCase;

class VehicleMapperTest extends TestCase
{

    public function testMapToEntity (): void {
        $data = [
            'car_brand'        => 'car_brand',
            'car_model'        => 'car_model',
            'codTiempoCompra'  => 'codTiempoCompra',
            'codUso'           => 'codUso',
            'codVersion'       => 'codVersion',
            'fecMatriculacion' => 'fecMatriculacion',
            'kmVehiculo'       => 'kmVehiculo',
            'parking'          => 'parking',
            'valorVehiculo'    => 'valorVehiculo',
        ];

        $mapper = new VehicleMapper();

        $vehicle = $mapper->mapToEntity( $data );

        $this->assertInstanceOf( Vehicle::class, $vehicle );
        $this->assertEquals( 'car_brand', $vehicle->codMarca()->value() );
        $this->assertEquals( 'car_model', $vehicle->codModelo()->value() );
        $this->assertEquals( 'codTiempoCompra', $vehicle->codTiempoCompra()->value() );
        $this->assertEquals( 'codUso', $vehicle->codUso()->value() );
        $this->assertEquals( 'codVersion', $vehicle->codVersion()->value() );
        $this->assertEquals( 'fecMatriculacion', $vehicle->fecMatriculacion()->value() );
        $this->assertEquals( 'kmVehiculo', $vehicle->kmVehiculo()->value() );
        $this->assertEquals( 'parking', $vehicle->parking()->value() );
        $this->assertEquals( 'valorVehiculo', $vehicle->valorVehiculo()->value() );
    }
}

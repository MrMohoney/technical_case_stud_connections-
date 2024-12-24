<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\VehicleDTO;
use App\CarInsurance\Domain\Entity\Vehicle;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class VehicleDTOTest extends TestCase
{
    final public function testConstructorAssignsProperties (): void {
        $vehicleDTO = new VehicleDTO(
            codMarca        : 'ABC123',
            codModelo       : 'ModelX',
            codTiempoCompra : '1 year',
            codUso          : 'Personal',
            codVersion      : 'v1.0',
            fecMatriculacion: '2023-01-01',
            kmVehiculo      : '15000',
            parking         : 'Garage',
            valorVehiculo   : '20000',
        );

        $this->assertSame( 'ABC123', $vehicleDTO->codMarca );
        $this->assertSame( 'ModelX', $vehicleDTO->codModelo );
        $this->assertSame( '1 year', $vehicleDTO->codTiempoCompra );
        $this->assertSame( 'Personal', $vehicleDTO->codUso );
        $this->assertSame( 'v1.0', $vehicleDTO->codVersion );
        $this->assertSame( '2023-01-01', $vehicleDTO->fecMatriculacion );
        $this->assertSame( '15000', $vehicleDTO->kmVehiculo );
        $this->assertSame( 'Garage', $vehicleDTO->parking );
        $this->assertSame( '20000', $vehicleDTO->valorVehiculo );
    }

    final public function testFromEntityCreatesVehicleDTO (): void {
        $vehicleMock = $this->createMock( Vehicle::class );

        $vehicleMock->method( 'codMarca' )
            ->willReturn( new UnmappedStringValue( 'ABC123' ) );
        $vehicleMock->method( 'codModelo' )
            ->willReturn( new UnmappedStringValue( 'ModelX' ) );
        $vehicleMock->method( 'codTiempoCompra' )
            ->willReturn( new UnmappedStringValue( '1 year' ) );
        $vehicleMock->method( 'codUso' )
            ->willReturn( new UnmappedStringValue( 'Personal' ) );
        $vehicleMock->method( 'codVersion' )
            ->willReturn( new UnmappedStringValue( 'v1.0' ) );
        $vehicleMock->method( 'fecMatriculacion' )
            ->willReturn( new UnmappedStringValue( '2023-01-01' ) );
        $vehicleMock->method( 'kmVehiculo' )
            ->willReturn( new UnmappedStringValue( '15000' ) );
        $vehicleMock->method( 'parking' )
            ->willReturn( new UnmappedStringValue( 'Garage' ) );
        $vehicleMock->method( 'valorVehiculo' )
            ->willReturn( new UnmappedStringValue( '20000' ) );

        $vehicleDTO = VehicleDTO::fromEntity( $vehicleMock );

        $this->assertSame( 'ABC123', $vehicleDTO->codMarca );
        $this->assertSame( 'ModelX', $vehicleDTO->codModelo );
        $this->assertSame( '1 year', $vehicleDTO->codTiempoCompra );
        $this->assertSame( 'Personal', $vehicleDTO->codUso );
        $this->assertSame( 'v1.0', $vehicleDTO->codVersion );
        $this->assertSame( '2023-01-01', $vehicleDTO->fecMatriculacion );
        $this->assertSame( '15000', $vehicleDTO->kmVehiculo );
        $this->assertSame( 'Garage', $vehicleDTO->parking );
        $this->assertSame( '20000', $vehicleDTO->valorVehiculo );
    }
}

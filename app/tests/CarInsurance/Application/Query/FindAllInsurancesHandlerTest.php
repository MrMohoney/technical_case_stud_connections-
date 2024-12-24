<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Query;

use App\CarInsurance\Application\DTO\AdditionalDataDTO;
use App\CarInsurance\Application\DTO\CoverageDataDTO;
use App\CarInsurance\Application\DTO\DriverDataDTO;
use App\CarInsurance\Application\DTO\GeneralDataDTO;
use App\CarInsurance\Application\DTO\HolderDataDTO;
use App\CarInsurance\Application\DTO\InsurerDataDTO;
use App\CarInsurance\Application\DTO\OwnerDTO;
use App\CarInsurance\Application\DTO\PolicyHolderDTO;
use App\CarInsurance\Application\DTO\VehicleDTO;
use App\CarInsurance\Application\Query\FindAllInsurancesHandler;
use App\CarInsurance\Domain\Repository\InsuranceDataRepository;
use Iterator;
use PHPUnit\Framework\TestCase;

class FindAllInsurancesHandlerTest extends TestCase
{
    /**
     * @dataProvider dataProviderForHandle
     */
    final public function testHandle ( array $mockData ): void {
        $mockRepository = $this->createMock( InsuranceDataRepository::class );

        $mockRepository->method( 'findAllInsurances' )->willReturn( $mockData );

        $handler = new FindAllInsurancesHandler( $mockRepository );

        $result = $handler->handle();

        $this->assertIsArray( $result );
        $this->assertCount( count( $mockData ), $result );
        $this->assertNotEmpty( $result );
        $this->assertIsInt( $result[ 0 ][ 0 ] );
        $this->assertInstanceOf( InsurerDataDTO::class, $result[ 0 ][ 1 ] );
        $this->assertInstanceOf( CoverageDataDTO::class, $result[ 0 ][ 2 ] );
        $this->assertInstanceOf( DriverDataDTO::class, $result[ 0 ][ 3 ] );
        $this->assertInstanceOf( GeneralDataDTO::class, $result[ 0 ][ 4 ] );
        $this->assertInstanceOf( OwnerDTO::class, $result[ 0 ][ 5 ] );
        $this->assertInstanceOf( HolderDataDTO::class, $result[ 0 ][ 6 ] );
        $this->assertInstanceOf( PolicyHolderDTO::class, $result[ 0 ][ 7 ] );
        $this->assertInstanceOf( VehicleDTO::class, $result[ 0 ][ 8 ] );
        $this->assertInstanceOf( AdditionalDataDTO::class, $result[ 0 ][ 9 ] );
    }

    final public function dataProviderForHandle (): Iterator {
        yield 'case_1' => [
            [
                [
                    'car_brand'                    => 'SEAT',
                    'car_fuel'                     => 'Gasolina',
                    'car_model'                    => 'IBIZA',
                    'car_power'                    => 'No estoy seguro',
                    'car_purchaseDate'             => 'NUEVO',
                    'car_purchaseSituation'        => 'customer_journey_ok',
                    'car_registrationDate'         => '00540140903',
                    'car_version'                  => '1',
                    'driver_birthDate'             => '2002-06-05',
                    'driver_birthPlace'            => 'ESP',
                    'driver_birthPlaceMain'        => 'ESP',
                    'driver_children'              => 'NO',
                    'driver_civilStatus'           => 'SOLTERO',
                    'driver_id'                    => '36714791Y',
                    'driver_idType'                => 'dni',
                    'driver_licenseDate'           => '2020-12-15',
                    'driver_licensePlace'          => 'ESP',
                    'driver_licensePlaceMain'      => 'ESP',
                    'driver_profession'            => 'Estudiante',
                    'driver_sex'                   => 'MUJER',
                    'holder'                       => 'CONDUCTOR_PRINCIPAL',
                    'holder_birthDate'             => null,
                    'holder_civilStatus'           => null,
                    'holder_id'                    => null,
                    'holder_idType'                => null,
                    'holder_licenseDate'           => null,
                    'holder_profession'            => null,
                    'holder_sex'                   => null,
                    'occasionalDriver'             => 'NO',
                    'occasionalDriver_birthDate'   => null,
                    'occasionalDriver_civilStatus' => null,
                    'occasionalDriver_id'          => null,
                    'occasionalDriver_idType'      => null,
                    'occasionalDriver_licenseDate' => null,
                    'occasionalDriver_profession'  => null,
                    'occasionalDriver_sex'         => null,
                    'occasionalDriver_youngest'    => null,
                    'prevInsurance_claims'         => 0,
                    'prevInsurance_claimsCount'    => null,
                    'prevInsurance_company'        => 'NO',
                    'prevInsurance_companyYear'    => 'NO',
                    'prevInsurance_contractDate'   => null,
                    'prevInsurance_email'          => null,
                    'prevInsurance_emailRequest'   => null,
                    'prevInsurance_exists'         => 'NO',
                    'prevInsurance_expirationDate' => null,
                    'prevInsurance_fineAlcohol'    => null,
                    'prevInsurance_fineOther'      => null,
                    'prevInsurance_fineParking'    => null,
                    'prevInsurance_fineSpeed'      => null,
                    'prevInsurance_fines'          => null,
                    'prevInsurance_modality'       => null,
                    'prevInsurance_years'          => null,
                    'reference_code'               => '1',
                    'use_carUse'                   => '1TT02TT11',
                    'use_kmsYear'                  => 6000,
                    'use_nightParking'             => 'CALLE',
                    'use_postalCode'               => '28001',
                ],
            ],
        ];

        yield 'case_2' => [
            [
                [
                    'car_brand'                    => 'RENAULT',
                    'car_fuel'                     => 'Diesel',
                    'car_model'                    => 'CLIO',
                    'car_power'                    => 'No estoy seguro',
                    'car_purchaseDate'             => null,
                    'car_purchaseSituation'        => 'NUEVO',
                    'car_registrationDate'         => null,
                    'car_version'                  => '00490150754',
                    'customer_journey_ok'          => 1,
                    'driver_birthDate'             => '1948-03-02',
                    'driver_birthPlace'            => 'ESP',
                    'driver_birthPlaceMain'        => 'ESP',
                    'driver_children'              => 'NO',
                    'driver_civilStatus'           => 'CASADO',
                    'driver_id'                    => '53990338T',
                    'driver_idType'                => 'dni',
                    'driver_licenseDate'           => '1968-03-02',
                    'driver_licensePlace'          => 'ESP',
                    'driver_licensePlaceMain'      => 'ESP',
                    'driver_profession'            => 'Administrativo',
                    'driver_sex'                   => 'HOMBRE',
                    'holder'                       => 'CONDUCTOR_PRINCIPAL',
                    'holder_birthDate'             => null,
                    'holder_civilStatus'           => null,
                    'holder_id'                    => null,
                    'holder_idType'                => null,
                    'holder_licenseDate'           => null,
                    'holder_profession'            => null,
                    'holder_sex'                   => null,
                    'occasionalDriver'             => 'SI',
                    'occasionalDriver_birthDate'   => '1993-03-02',
                    'occasionalDriver_civilStatus' => 'SOLTERO',
                    'occasionalDriver_id'          => '01234567L',
                    'occasionalDriver_idType'      => 'dni',
                    'occasionalDriver_licenseDate' => '2012-07-27',
                    'occasionalDriver_profession'  => 'Administrativo',
                    'occasionalDriver_sex'         => 'MUJER',
                    'occasionalDriver_youngest'    => 'HIJO',
                    'prevInsurance_claims'         => 'NO',
                    'prevInsurance_claimsCount'    => 0,
                    'prevInsurance_company'        => 'ALLIANZ',
                    'prevInsurance_companyYear'    => 8,
                    'prevInsurance_contractDate'   => '2013-03-03',
                    'prevInsurance_email'          => null,
                    'prevInsurance_emailRequest'   => 'NO',
                    'prevInsurance_exists'         => 'SI',
                    'prevInsurance_expirationDate' => '2021-03-02',
                    'prevInsurance_fineAlcohol'    => null,
                    'prevInsurance_fineOther'      => null,
                    'prevInsurance_fineParking'    => null,
                    'prevInsurance_fineSpeed'      => null,
                    'prevInsurance_fines'          => 'NO',
                    'prevInsurance_modality'       => 'NO_ESTOY_SEGURO',
                    'prevInsurance_years'          => 8,
                    'reference_code'               => '1TT17TT11',
                    'use_carUse'                   => 'DIARIO',
                    'use_kmsYear'                  => 10000,
                    'use_nightParking'             => 'GARAJE_INDIVIDUAL',
                    'use_postalCode'               => null,
                ],
            ],
        ];
    }
}

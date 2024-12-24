<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Query;

use App\CarInsurance\Application\DTO\AdditionalDataDTO;
use App\CarInsurance\Application\DTO\ComparatorDataDTO;
use App\CarInsurance\Application\DTO\CoverageDataDTO;
use App\CarInsurance\Application\DTO\DriverDataDTO;
use App\CarInsurance\Application\DTO\GeneralDataDTO;
use App\CarInsurance\Application\DTO\HolderDataDTO;
use App\CarInsurance\Application\DTO\InsurerDataDTO;
use App\CarInsurance\Application\DTO\OwnerDTO;
use App\CarInsurance\Application\DTO\PolicyHolderDTO;
use App\CarInsurance\Application\DTO\VehicleDTO;
use App\CarInsurance\Application\Mapper\AdditionalDataMapper;
use App\CarInsurance\Application\Mapper\ComparatorDataMapper;
use App\CarInsurance\Application\Mapper\CoverageDataMapper;
use App\CarInsurance\Application\Mapper\DriverDataMapper;
use App\CarInsurance\Application\Mapper\GeneralDataMapper;
use App\CarInsurance\Application\Mapper\HolderDataMapper;
use App\CarInsurance\Application\Mapper\InsurerDataMapper;
use App\CarInsurance\Application\Mapper\OwnerDataMapper;
use App\CarInsurance\Application\Mapper\PolicyHolderMapper;
use App\CarInsurance\Application\Mapper\VehicleMapper;
use App\CarInsurance\Domain\Repository\InsuranceDataRepository;

class FindAllInsurancesHandler
{
    public function __construct (
        private InsuranceDataRepository $repository,
    ) {}

    final public function handle (): array {
        $rawData = $this->repository->findAllInsurances();

        return array_map( static fn( $insurerData, $quotation ) => [
            $quotation,
            InsurerDataDTO::fromEntity( ( new InsurerDataMapper() )->mapToEntity( $insurerData ) ),
            CoverageDataDTO::fromEntity( ( new CoverageDataMapper() )->mapToEntity( $insurerData ) ),
            DriverDataDTO::fromEntity( ( new DriverDataMapper() )->mapToEntity( $insurerData ) ),
            GeneralDataDTO::fromEntity( ( new GeneralDataMapper() )->mapToEntity( $insurerData ) ),
            OwnerDTO::fromEntity( ( new OwnerDataMapper() )->mapToEntity( $insurerData ) ),
            HolderDataDTO::fromEntity( ( new HolderDataMapper() )->mapToEntity( $insurerData ) ),
            PolicyHolderDTO::fromEntity( ( new PolicyHolderMapper() )->mapToEntity( $insurerData ) ),
            VehicleDTO::fromEntity( ( new VehicleMapper() )->mapToEntity( $insurerData ) ),
            AdditionalDataDTO::fromEntity( ( new AdditionalDataMapper() )->mapToEntity( $insurerData ) ),
            ComparatorDataDTO::fromEntity( ( new ComparatorDataMapper() )->mapToEntity( $insurerData ) ),
        ], $rawData, array_keys( $rawData ) );
    }
}

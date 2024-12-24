<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Repository;

interface InsuranceDataRepository
{
    public function findAllInsurances (): array;
}

<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;

interface CarInsuranceMapperInterface
{
    public function ensureDataIsValid ( array $data, array $requiredFields ): void;

    public function mapToEntity ( array $data ): CarInsuranceEntityInterface;
}

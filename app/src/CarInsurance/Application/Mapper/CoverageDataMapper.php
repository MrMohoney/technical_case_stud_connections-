<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\CoverageData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class CoverageDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): CoverageData {
        $this->ensureDataIsValid( $data, [] );

        return CoverageData::create(
            new UnmappedStringValue( $data[ 'codCobertura' ] ?? null ),
            new UnmappedStringValue( $data[ 'valor' ] ?? null ),
        );
    }
}

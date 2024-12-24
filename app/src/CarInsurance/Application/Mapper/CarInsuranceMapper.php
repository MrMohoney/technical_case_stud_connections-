<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Mapper;

use App\Shared\Application\Exception\MissingRequiredFieldsException;

abstract class CarInsuranceMapper implements CarInsuranceMapperInterface
{
    final public function ensureDataIsValid ( array $data, array $requiredFields ): void {
        $this->hasAllRequiredFields( $data, $requiredFields );
    }

    private function hasAllRequiredFields ( array $data, array $requiredFields ): void {
        $missingFields = array_diff( $requiredFields, array_keys( $data ) );

        if ( !empty( $missingFields ) ) {
            throw new MissingRequiredFieldsException( sprintf( 'The required fields "%s" are missing.', implode( ', ', $missingFields ) ) );
        }
    }
}

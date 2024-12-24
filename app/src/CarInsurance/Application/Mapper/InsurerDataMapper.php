<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\InsurerData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class InsurerDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): InsurerData {
        $this->ensureDataIsValid( $data, [
            'prevInsurance_companyYear',
            'prevInsurance_years',
            'prevInsurance_company',
            'prevInsurance_claimsCount',
            'prevInsurance_exists',
        ] );

        return InsurerData::create(
            new UnmappedStringValue( (string)( $data[ 'prevInsurance_companyYear' ] ?? null ) ),
            new UnmappedStringValue( (string)( $data[ 'prevInsurance_years' ] ?? null ) ),
            new UnmappedStringValue( $data[ 'prevInsurance_company' ] ?? null ),
            new UnmappedStringValue( $data[ 'cincoDigPolAnterior' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecUltimoSiniestro' ] ?? null ),
            new UnmappedStringValue( (string)( $data[ 'prevInsurance_claimsCount' ] ?? null ) ),
            new ActiveInsurance( $data[ 'prevInsurance_exists' ] === 'NO' ? 'NO' : $data[ 'prevInsurance_expirationDate' ] ),
            new UnmappedStringValue( $data[ 'tiempoSinSeguro' ] ?? null ),
        );
    }
}

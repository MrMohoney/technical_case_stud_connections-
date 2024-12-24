<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\AdditionalData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class AdditionalDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): AdditionalData {
        $this->ensureDataIsValid( $data, [
            'reference_code',
        ] );

        return AdditionalData::create(
            new UnmappedStringValue( $data[ 'empresa' ] ?? null ),
            new UnmappedStringValue( $data[ 'faseTarificacion' ] ?? null ),
            new UnmappedStringValue( $data[ 'identificador' ] ?? null ),
            new UnmappedStringValue( $data[ 'plataforma' ] ?? null ),
            new UnmappedStringValue( $data[ 'tipoTarificacion' ] ?? null ),
            new UnmappedStringValue( $data[ 'versionCotizacion' ] ?? null ),
        );
    }
}

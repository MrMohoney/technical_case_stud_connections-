<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\ComparatorData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class ComparatorDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): ComparatorData {
        $this->ensureDataIsValid( $data, [
            'prevInsurance_fineAlcohol',
            'prevInsurance_fineOther',
            'prevInsurance_fineParking',
            'prevInsurance_fineSpeed',
            'prevInsurance_fines',
            'prevInsurance_modality',
        ] );

        return ComparatorData::create(
            new UnmappedStringValue( $data[ 'morosidadComparador' ] ?? null ),
            new UnmappedStringValue( $data[ 'anioVdaActual' ] ?? null ),
            new UnmappedStringValue( $data[ 'multasUlt3anios' ] ?? null ),
            new UnmappedStringValue( $data[ 'tipoSeguro' ] ?? null ),
        );
    }
}

<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\HolderData;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class HolderDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): HolderData {
        $this->ensureDataIsValid( $data, [
            'holder',
            'holder_birthDate',
            'holder_civilStatus',
            'holder_id',
            'holder_idType',
            'holder_licenseDate',
            'holder_profession',
            'holder_sex',
        ] );

        return HolderData::create(
            new UnmappedStringValue( $data[ 'codActividad' ] ?? null ),
            new UnmappedStringValue( $data[ 'codDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'codError' ] ?? null ),
            new UnmappedStringValue( $data[ 'codPais' ] ?? null ),
            new UnmappedStringValue( $data[ 'domicilio' ] ?? null ),
            new UnmappedStringValue( $data[ 'empresa' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecCarnet' ] ?? null ),
            new UnmappedStringValue( $data[ 'holder_birthDate' ] ?? null ),
            new UnmappedStringValue( $data[ 'nroDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'subCodDocumento' ] ?? null ),
        );
    }
}

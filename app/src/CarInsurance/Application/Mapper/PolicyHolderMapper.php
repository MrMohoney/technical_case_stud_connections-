<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\PolicyHolder;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;

class PolicyHolderMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): PolicyHolder {
        $this->ensureDataIsValid( $data, [] );

        return PolicyHolder::create(
            new UnmappedStringValue( $data[ 'codActividad' ] ?? null ),
            new UnmappedStringValue( $data[ 'codDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'codError' ] ?? null ),
            new UnmappedStringValue( $data[ 'codPais' ] ?? null ),
            new UnmappedStringValue( $data[ 'domicilio' ] ?? null ),
            new UnmappedStringValue( $data[ 'codPostal' ] ?? null ),
            new UnmappedStringValue( $data[ 'empresa' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecCarnet' ] ?? null ),
            new UnmappedStringValue( $data[ 'fecNacimiento' ] ?? null ),
            new UnmappedStringValue( $data[ 'nroDocumento' ] ?? null ),
            new UnmappedStringValue( $data[ 'subCodDocumento' ] ?? null ),
        );
    }
}

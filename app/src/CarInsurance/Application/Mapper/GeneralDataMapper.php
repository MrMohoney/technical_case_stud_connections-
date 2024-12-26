<?php

namespace App\CarInsurance\Application\Mapper;

use App\CarInsurance\Domain\Entity\GeneralData;
use App\CarInsurance\Domain\ValueObject\ActiveInsurance;
use App\CarInsurance\Domain\ValueObject\AdditionalDriversValue;
use App\CarInsurance\Domain\ValueObject\InsuranceYearsValue;
use App\CarInsurance\Domain\ValueObject\QuoteDateValue;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use App\CarInsurance\Domain\ValueObject\YesNoValue;
use DateTimeImmutable;

class GeneralDataMapper extends CarInsuranceMapper
{
    final public function mapToEntity ( array $data ): GeneralData {
        $this->ensureDataIsValid( $data, [
            'holder',
            'occasionalDriver',
            'prevInsurance_contractDate',
            'occasionalDriver_id',
            'prevInsurance_expirationDate',
        ] );

        return GeneralData::create(
            new UnmappedStringValue( $data[ 'codMedAncl' ] ?? null ),
            YesNoValue::fromBool( $data[ 'holder' ] === 'CONDUCTOR_PRINCIPAL' ),
            new YesNoValue( $data[ 'occasionalDriver' ] ),
            new UnmappedStringValue( $data[ 'contrataAlgunPack' ] ?? null ),
            new UnmappedStringValue( $data[ 'cotizacion' ] ?? null ),
            new UnmappedStringValue( $data[ 'entornoOrigen' ] ?? null ),
            new QuoteDateValue( new DateTimeImmutable() ),
            new UnmappedStringValue( $data[ 'fecCotAncl' ] ?? null ),
            new InsuranceYearsValue( [ $data[ 'prevInsurance_contractDate' ], $data[ 'prevInsurance_expirationDate' ] ] ),
            new UnmappedStringValue( $data[ 'prevInsurance_contractDate' ] ?? null ),
            new UnmappedStringValue( $data[ 'franquicia' ] ?? null ),
            new UnmappedStringValue( $data[ 'idioma' ] ?? null ),
            new UnmappedStringValue( $data[ 'importeFranquicia' ] ?? null ),
            new UnmappedStringValue( $data[ 'masVehiculos' ] ?? null ),
            new UnmappedStringValue( $data[ 'mcaPagoTarjeta' ] ?? null ),
            new UnmappedStringValue( $data[ 'mediador' ] ?? null ),
            new UnmappedStringValue( $data[ 'modalidad' ] ?? null ),
            new UnmappedStringValue( $data[ 'motivoBonus' ] ?? null ),
            new UnmappedStringValue( $data[ 'motivoEstado' ] ?? null ),
            new UnmappedStringValue( $data[ 'nivelDp' ] ?? null ),
            new UnmappedStringValue( $data[ 'nivelLu' ] ?? null ),
            new UnmappedStringValue( $data[ 'nivelRc' ] ?? null ),
            new UnmappedStringValue( $data[ 'nroCochesFamilia' ] ?? null ),
            new AdditionalDriversValue( $this->AdditionalDriversValueFromArray( $data ) ),
            new UnmappedStringValue( $data[ 'nroOpera' ] ?? null ),
            new UnmappedStringValue( $data[ 'nroRiesgo' ] ?? null ),
            new UnmappedStringValue( $data[ 'pctOpera' ] ?? null ),
            new UnmappedStringValue( $data[ 'poliza' ] ?? null ),
            new UnmappedStringValue( $data[ 'polizaorigen' ] ?? null ),
            new UnmappedStringValue( $data[ 'polizatarificada' ] ?? null ),
            new UnmappedStringValue( $data[ 'ramo' ] ?? null ),
            new UnmappedStringValue( $data[ 'scoreA' ] ?? null ),
            new UnmappedStringValue( $data[ 'scoreB' ] ?? null ),
            new ActiveInsurance( $data[ 'prevInsurance_expirationDate' ] ),
            new UnmappedStringValue( $data[ 'subMediador' ] ?? null ),
            new UnmappedStringValue( $data[ 'subramo' ] ?? null ),
            new UnmappedStringValue( $data[ 'suplemento' ] ?? null ),
            new UnmappedStringValue( $data[ 'tallerConcertado' ] ?? null ),
            new UnmappedStringValue( $data[ 'usuarioCot' ] ?? null ),
            new UnmappedStringValue( $data[ 'versionCot' ] ?? null ),
        );
    }

    private function AdditionalDriversValueFromArray ( array $data ): int {
        if ( $data[ 'occasionalDriver' ] === 'SI' ) {
            return 1;
        }

        return is_array( $data[ 'occasionalDriver' ] ) ? count( $data[ 'occasionalDriver' ] ) : 0;
    }
}

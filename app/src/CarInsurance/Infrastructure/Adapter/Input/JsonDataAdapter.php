<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Adapter\Input;

use App\CarInsurance\Application\Port\input\DataInputPort;

final class JsonDataAdapter implements DataInputPort
{

    private array $data;

    public function __construct ( array $data ) {
        $this->data = $data;
    }

    public function map (): array {
        return array_map( static fn( $dtos ) => [
            'TarificacionThirdPartyRequest' => [
                'Cotizacion'        => $dtos[ 0 ],
                'Datos'             => [
                    'DatosAseguradora' => [
                        'AniosCiaAnterior'    => $dtos[ 1 ]->aniosCiaAnterior,
                        'AniosTitularSeguro'  => $dtos[ 1 ]->aniosTitularSeguro,
                        'CiaAnterior'         => $dtos[ 1 ]->ciaAnterior,
                        'CincoDigPolAnterior' => $dtos[ 1 ]->cincoDigPolAnterior,
                        'FecUltimoSiniestro'  => $dtos[ 1 ]->fecUltimoSiniestro,
                        'NroSiniestroCulpa'   => $dtos[ 1 ]->nroSiniestroCulpa,
                        'SeguroEnVigor'       => $dtos[ 1 ]->seguroEnVigor,
                        'TiempoSinSeguro'     => $dtos[ 1 ]->tiempoSinSeguro,
                    ],
                    'DatosCoberturas'  => [
                        'DatosCoberturas' => [
                            'CodCobertura' => $dtos[ 2 ]->codCobertura,
                            'Valor'        => $dtos[ 2 ]->valor,
                        ],
                    ],
                    'DatosConductor'   => [
                        'CodDocumento'      => $dtos[ 3 ]->codDocumento,
                        'CodPaisExpedicion' => $dtos[ 3 ]->codPaisExpedicion,
                        'CodPaisNacimiento' => $dtos[ 3 ]->codPaisNacimiento,
                        'CodPostal'         => $dtos[ 3 ]->codPostal,
                        'EstadoCivil'       => $dtos[ 3 ]->estadoCivil,
                        'FecCarnet'         => $dtos[ 3 ]->fecCarnet,
                        'FecNacimiento'     => $dtos[ 3 ]->fecNacimiento,
                        'HijosCarnet'       => $dtos[ 3 ]->hijosCarnet,
                        'Ocupacion'         => $dtos[ 3 ]->ocupacion,
                        'Profesion'         => $dtos[ 3 ]->profesion,
                        'PuntosCarnet'      => $dtos[ 3 ]->puntosCarnet,
                        'Sexo'              => $dtos[ 3 ]->sexo,
                        'SubDocum'          => $dtos[ 3 ]->subDocum,
                    ],
                    'DatosGenerales'   => [
                        'CodMedAncl'        => $dtos[ 4 ]->codMedAncl,
                        'CondPpalEsTomador' => $dtos[ 4 ]->condPpalEsTomador,
                        'ConductorUnico'    => $dtos[ 4 ]->conductorUnico,
                        'ContrataAlgunPack' => $dtos[ 4 ]->contrataAlgunPack,
                        'Cotizacion'        => $dtos[ 4 ]->cotizacion,
                        'EntornoOrigen'     => $dtos[ 4 ]->entornoOrigen,
                        'FecCot'            => $dtos[ 4 ]->fecCot,
                        'FecCotAncl'        => $dtos[ 4 ]->fecCotAncl,
                        'AnosSegAnte'       => $dtos[ 4 ]->anosSegAnte,
                        'FecUltimoSeguro'   => $dtos[ 4 ]->fecUltimoSeguro,
                        'Franquicia'        => $dtos[ 4 ]->franquicia,
                        'Idioma'            => $dtos[ 4 ]->idioma,
                        'ImporteFranquicia' => $dtos[ 4 ]->importeFranquicia,
                        'MasVehiculos'      => $dtos[ 4 ]->masVehiculos,
                        'McaPagoTarjeta'    => $dtos[ 4 ]->mcaPagoTarjeta,
                        'Mediador'          => $dtos[ 4 ]->mediador,
                        'Modalidad'         => $dtos[ 4 ]->modalidad,
                        'MotivoBonus'       => $dtos[ 4 ]->motivoBonus,
                        'MotivoEstado'      => $dtos[ 4 ]->motivoEstado,
                        'NivelDp'           => $dtos[ 4 ]->nivelDp,
                        'NivelLu'           => $dtos[ 4 ]->nivelLu,
                        'NivelRc'           => $dtos[ 4 ]->nivelRc,
                        'NroCochesFamilia'  => $dtos[ 4 ]->nroCochesFamilia,
                        'NroCondOca'        => $dtos[ 4 ]->nroCondOca,
                        'NroOpera'          => $dtos[ 4 ]->nroOpera,
                        'NroRiesgo'         => $dtos[ 4 ]->nroRiesgo,
                        'PctOpera'          => $dtos[ 4 ]->pctOpera,
                        'Poliza'            => $dtos[ 4 ]->poliza,
                        'Polizaorigen'      => $dtos[ 4 ]->polizaorigen,
                        'Polizatarificada'  => $dtos[ 4 ]->polizatarificada,
                        'Ramo'              => $dtos[ 4 ]->ramo,
                        'ScoreA'            => $dtos[ 4 ]->scoreA,
                        'ScoreB'            => $dtos[ 4 ]->scoreB,
                        'SeguroEnVigor'     => $dtos[ 4 ]->seguroEnVigor,
                        'SubMediador'       => $dtos[ 4 ]->subMediador,
                        'Subramo'           => $dtos[ 4 ]->subramo,
                        'Suplemento'        => $dtos[ 4 ]->suplemento,
                        'TallerConcertado'  => $dtos[ 4 ]->tallerConcertado,
                        'UsuarioCot'        => $dtos[ 4 ]->usuarioCot,
                        'VersionCot'        => $dtos[ 4 ]->versionCot,
                    ],
                    'DatosPropietario' => [
                        'Propietario'          => [
                            'CodActividad'    => $dtos[ 5 ]->codActividad,
                            'CodDocumento'    => $dtos[ 5 ]->codDocumento,
                            'CodError'        => $dtos[ 5 ]->codError,
                            'CodPais'         => $dtos[ 5 ]->codPais,
                            'Domicilio'       => [
                                'CodPostal' => $dtos[ 5 ]->domicilio,
                            ],
                            'Empresa'         => $dtos[ 5 ]->empresa,
                            'FecCarnet'       => $dtos[ 5 ]->fecCarnet,
                            'FecNacimiento'   => $dtos[ 5 ]->fecNacimiento,
                            'NroDocumento'    => $dtos[ 5 ]->nroDocumento,
                            'SubCodDocumento' => $dtos[ 5 ]->subCodDocumento,
                        ],
                        'QuienEsPropietario'   => $dtos[ 5 ]->owner,
                        'TomadorEsPropietario' => $dtos[ 5 ]->isHolderTheOwner,
                    ],
                    'DatosTomador'     => [
                        'CodActividad'    => $dtos[ 6 ]->codActividad,
                        'CodDocumento'    => $dtos[ 6 ]->codDocumento,
                        'CodError'        => $dtos[ 6 ]->codError,
                        'CodPais'         => $dtos[ 6 ]->codPais,
                        'Domicilio'       => [
                            'CodPostal' => $dtos[ 6 ]->domicilio,
                        ],
                        'Empresa'         => $dtos[ 6 ]->empresa,
                        'FecCarnet'       => $dtos[ 6 ]->fecCarnet,
                        'FecNacimiento'   => $dtos[ 6 ]->fecNacimiento,
                        'NroDocumento'    => $dtos[ 6 ]->nroDocumento,
                        'SubCodDocumento' => $dtos[ 6 ]->subCodDocumento,
                    ],
                    'DatosVehiculo'    => [
                        'CodMarca'         => $dtos[ 8 ]->codMarca,
                        'CodModelo'        => $dtos[ 8 ]->codModelo,
                        'CodTiempoCompra'  => $dtos[ 8 ]->codTiempoCompra,
                        'CodUso'           => $dtos[ 8 ]->codUso,
                        'CodVersion'       => $dtos[ 8 ]->codVersion,
                        'FecMatriculacion' => $dtos[ 8 ]->fecMatriculacion,
                        'KmVehiculo'       => $dtos[ 8 ]->kmVehiculo,
                        'Parking'          => $dtos[ 8 ]->parking,
                        'ValorVehiculo'    => $dtos[ 8 ]->valorVehiculo,
                    ],
                ],
                'Empresa'           => $dtos[ 9 ]->empresa,
                'FaseTarificacion'  => $dtos[ 9 ]->faseTarificacion,
                'Identificador'     => $dtos[ 9 ]->identificador,
                'Plataforma'        => $dtos[ 9 ]->plataforma,
                'TipoTarificacion'  => $dtos[ 9 ]->tipoTarificacion,
                'VersionCotizacion' => $dtos[ 9 ]->versionCotizacion,
                'DatosComparadores' => [
                    'MorosidadComparador' => $dtos[ 10 ]->morosidadComparador,
                    'AnioVdaActual'       => $dtos[ 10 ]->anioVdaActual,
                    'MultasUlt3anios'     => $dtos[ 10 ]->multasUlt3anios,
                    'TipoSeguro'          => $dtos[ 10 ]->tipoSeguro,
                ],
            ],
        ], $this->data );
    }
}

<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Infrastructure\Adapter\Input;

use App\CarInsurance\Application\DTO\{AdditionalDataDTO, ComparatorDataDTO, CoverageDataDTO, DriverDataDTO, GeneralDataDTO, HolderDataDTO, InsurerDataDTO, OwnerDTO, PolicyHolderDTO, VehicleDTO};
use App\CarInsurance\Infrastructure\Adapter\Input\JsonDataAdapter;
use Iterator;
use PHPUnit\Framework\TestCase;

class JsonDataAdapterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    final public function testMap ( array $inputData ): void {
        $adapter    = new JsonDataAdapter( $inputData );
        $mappedData = $adapter->map();

        $this->assertIsArray( $mappedData );
        $this->assertCount( 1, $mappedData );
        $this->assertArrayHasKey( 'TarificacionThirdPartyRequest', $mappedData[ 0 ] );
        $this->assertEquals( 'NO', $mappedData[ 0 ][ 'TarificacionThirdPartyRequest' ][ 'Datos' ][ 'DatosAseguradora' ][ 'AniosCiaAnterior' ] );
        $this->assertEquals( 'SEAT', $mappedData[ 0 ][ 'TarificacionThirdPartyRequest' ][ 'Datos' ][ 'DatosVehiculo' ][ 'CodMarca' ] );
    }

    final public function dataProvider (): Iterator {
        yield [
            [
                [
                    0,
                    new InsurerDataDTO(
                        aniosCiaAnterior   : 'NO',
                        aniosTitularSeguro : '',
                        ciaAnterior        : 'NO',
                        cincoDigPolAnterior: null,
                        fecUltimoSiniestro : null,
                        nroSiniestroCulpa  : '',
                        seguroEnVigor      : 'N',
                        tiempoSinSeguro    : null,
                    ),
                    new CoverageDataDTO(
                        codCobertura: null,
                        valor       : null,
                    ),
                    new DriverDataDTO(
                        codDocumento     : 'dni',
                        codPaisExpedicion: 'ESP',
                        codPaisNacimiento: 'ESP',
                        codPostal        : null,
                        estadoCivil      : 'SOLTERO',
                        fecCarnet        : '2020-12-15',
                        fecNacimiento    : '2002-06-05',
                        hijosCarnet      : null,
                        ocupacion        : null,
                        profesion        : 'Estudiante',
                        puntosCarnet     : null,
                        sexo             : 'MUJER',
                        subDocum         : null,
                    ),
                    new GeneralDataDTO(
                        codMedAncl       : null,
                        condPpalEsTomador: 'S',
                        conductorUnico   : 'N',
                        contrataAlgunPack: null,
                        cotizacion       : null,
                        entornoOrigen    : null,
                        fecCot           : '2024-12-24T16:59:21',
                        fecCotAncl       : null,
                        anosSegAnte      : null,
                        fecUltimoSeguro  : null,
                        franquicia       : null,
                        idioma           : null,
                        importeFranquicia: null,
                        masVehiculos     : null,
                        mcaPagoTarjeta   : null,
                        mediador         : null,
                        modalidad        : null,
                        motivoBonus      : null,
                        motivoEstado     : null,
                        nivelDp          : null,
                        nivelLu          : null,
                        nivelRc          : null,
                        nroCochesFamilia : null,
                        nroCondOca       : '0',
                        nroOpera         : null,
                        nroRiesgo        : null,
                        pctOpera         : null,
                        poliza           : null,
                        polizaorigen     : null,
                        polizatarificada : null,
                        ramo             : null,
                        scoreA           : null,
                        scoreB           : null,
                        seguroEnVigor    : 'N',
                        subMediador      : null,
                        subramo          : null,
                        suplemento       : null,
                        tallerConcertado : null,
                        usuarioCot       : null,
                        versionCot       : null,
                    ),
                    new OwnerDTO(
                        codActividad    : null,
                        codDocumento    : null,
                        codError        : null,
                        codPais         : null,
                        domicilio       : null,
                        empresa         : null,
                        fecCarnet       : null,
                        fecNacimiento   : '2002-06-05',
                        nroDocumento    : null,
                        subCodDocumento : null,
                        owner           : null,
                        isHolderTheOwner: null,
                    ),
                    new HolderDataDTO(
                        codActividad   : null,
                        codDocumento   : null,
                        codError       : null,
                        codPais        : null,
                        domicilio      : null,
                        empresa        : null,
                        fecCarnet      : null,
                        fecNacimiento  : null,
                        nroDocumento   : null,
                        subCodDocumento: null,
                    ),
                    new PolicyHolderDTO(
                        empresa     : null,
                        codPostal   : null,
                        nroDocumento: null,
                    ),
                    new VehicleDTO(
                        codMarca        : 'SEAT',
                        codModelo       : 'IBIZA',
                        codTiempoCompra : null,
                        codUso          : null,
                        codVersion      : null,
                        fecMatriculacion: null,
                        kmVehiculo      : null,
                        parking         : null,
                        valorVehiculo   : null,
                    ),
                    new AdditionalDataDTO(
                        empresa          : null,
                        faseTarificacion : null,
                        identificador    : null,
                        plataforma       : null,
                        tipoTarificacion : null,
                        versionCotizacion: null,
                    ),
                    new ComparatorDataDTO(
                        morosidadComparador: null,
                        anioVdaActual      : null,
                        multasUlt3anios    : null,
                        tipoSeguro         : null,
                    ),
                ],
            ],
        ];
    }
}

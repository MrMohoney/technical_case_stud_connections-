# Technical Case Study: Connections

## **Background**
In Car Insurance, the prices for the tariffs are very variable and depend on a lot of parameters. We cannot calculate prices ourselves, so we need to connect to each insurance to ask for prices.

Your task is to take the data provided by our user and then prepare an API call to the FOO insurance to receive prices for car insurance tariffs.

---

## **Challenges**
- **Mapping**:
    - We have our own format for the input parameters, and each of the insurances have their own. Sometimes, a mapping is not just mapping the key, but also mapping the value or even combining values.

- **Creating the XML**:
    -  Should you use SimpleXML to build the request, or another XML framework, or is there an alternative? Find a good solution and have arguments for and against your choice.

---

## **Task**
### **Data Gathering**
- Create a command that will read the input parameters and echo the XML. You could read the input from a file and output to the console or do it in another way – whatever is easiest for you.
- There is no exact specification of how to create, try to infer from the example XML and the parameters what should be mapped where.
- The goal is not to have every value mapped; we expect at least the mappings given in the chapter “Mappings”.
- The format for the input can be defined by you - p.ex. JSON.
- You have free choice of frameworks/libraries.

### **Acceptance Criteria**
1. You are prepared to explain your architectural decisions, in key decisions having more than one possible solution and explaining the pros and cons of your choice.
2. The command works and converts the parameters to an XML.
3. **The mapping is implemented in a way that the product manager can double check it.**
4. You assure through automated test that the mapping is correct in all edge cases.
5. There is error handling for missing / wrong input.
6. You can create a request for both sets of input parameters and receive sensible output (Not everything mapped, but what is mapped should make sense)

---

## **Mappings**
| **Tag**             | **Mapping**                                                                                     |
|---------------------|-------------------------------------------------------------------------------------------------|
| `CondPpalEsTomador` | YES/NO whether the holder is the main driver.                                                   |
| `ConductorUnico`    | YES/NO whether there is more than one driver.                                                   |
| `FecCot`            | Current date as ISO                                                                             |
| `AnosSegAnte`       | Number of years in previous insurance as *full years* (see Glossary).                           |
| `NroCondOca`        | Number of additional drivers.                                                                   |
| `SeguroEnVigor`     | If there is a previous insurance, and the previous insurance is still valid, YES. NO otherwise. |

---

## **Glossary**
**Full years:**
- Years calculated only looking at the year part – from 01.01.2015 to 31.12.2016 is one year, as is from 31.12.2015 to 01.10.2016.

---

## **Appendix**
### **A1. First Set of Input Parameters - Young Driver**
| **Parámetro**                  | **Valor**               |
|--------------------------------|-------------------------|
| car_brand                      | SEAT                   |
| car_fuel                       | Gasolina               |
| car_model                      | IBIZA                  |
| car_power                      | No estoy seguro        |
| car_purchaseDate               | NUEVO                  |
| car_purchaseSituation          | customer_journey_ok    |
| car_registrationDate           | 00540140903            |
| car_version                    | 1                      |
| driver_birthDate               | 2002-06-05             |
| driver_birthPlace              | ESP                    |
| driver_birthPlaceMain          | ESP                    |
| driver_children                | NO                     |
| driver_civilStatus             | SOLTERO                |
| driver_id                      | 36714791Y              |
| driver_idType                  | dni                    |
| driver_licenseDate             | 2020-12-15             |
| driver_licensePlace            | ESP                    |
| driver_licensePlaceMain        | ESP                    |
| driver_profession              | Estudiante             |
| driver_sex                     | MUJER                  |
| holder                         | CONDUCTOR_PRINCIPAL    |
| holder_birthDate               |                         |
| holder_civilStatus             |                         |
| holder_id                      |                         |
| holder_idType                  |                         |
| holder_licenseDate             |                         |
| holder_profession              |                         |
| holder_sex                     |                         |
| occasionalDriver               | NO                     |
| occasionalDriver_birthDate     |                         |
| occasionalDriver_civilStatus   |                         |
| occasionalDriver_id            |                         |
| occasionalDriver_idType        |                         |
| occasionalDriver_licenseDate   |                         |
| occasionalDriver_profession    |                         |
| occasionalDriver_sex           |                         |
| occasionalDriver_youngest      |                         |
| prevInsurance_claims           | 0                      |
| prevInsurance_claimsCount      |                         |
| prevInsurance_company          | NO                     |
| prevInsurance_companyYear      | NO                     |
| prevInsurance_contractDate     |                         |
| prevInsurance_email            |                         |
| prevInsurance_emailRequest     |                         |
| prevInsurance_exists           | NO                     |
| prevInsurance_expirationDate   |                         |
| prevInsurance_fineAlcohol      |                         |
| prevInsurance_fineOther        |                         |
| prevInsurance_fineParking      |                         |
| prevInsurance_fineSpeed        |                         |
| prevInsurance_fines            |                         |
| prevInsurance_modality         |                         |
| prevInsurance_years            |                         |
| reference_code                 | 1                      |
| use_carUse                     | 1TT02TT11              |
| use_kmsYear                    | 6000                   |
| use_nightParking               | CALLE                  |
| use_postalCode                 | 28001                  |

### **A2. Second Set of Input Parameters - Old Holder with Second Young Driver**
| **Parámetro**                  | **Valor**               |
|--------------------------------|-------------------------|
| car_brand                      | RENAULT                |
| car_fuel                       | Diesel                 |
| car_model                      | CLIO                   |
| car_power                      | No estoy seguro        |
| car_purchaseDate               |                         |
| car_purchaseSituation          | NUEVO                  |
| car_registrationDate           |                         |
| car_version                    | 00490150754            |
| customer_journey_ok            | 1                      |
| driver_birthDate               | 1948-03-02             |
| driver_birthPlace              | ESP                    |
| driver_birthPlaceMain          | ESP                    |
| driver_children                | NO                     |
| driver_civilStatus             | CASADO                 |
| driver_id                      | 53990338T              |
| driver_idType                  | dni                    |
| driver_licenseDate             | 1968-03-02             |
| driver_licensePlace            | ESP                    |
| driver_licensePlaceMain        | ESP                    |
| driver_profession              | Administrativo          |
| driver_sex                     | HOMBRE                 |
| holder                         | CONDUCTOR_PRINCIPAL    |
| holder_birthDate               |                         |
| holder_civilStatus             |                         |
| holder_id                      |                         |
| holder_idType                  |                         |
| holder_licenseDate             |                         |
| holder_profession              |                         |
| holder_sex                     |                         |
| occasionalDriver               | SI                     |
| occasionalDriver_birthDate     | 1993-03-02             |
| occasionalDriver_civilStatus   | SOLTERO                |
| occasionalDriver_id            | 01234567L              |
| occasionalDriver_idType        | dni                    |
| occasionalDriver_licenseDate   | 2012-07-27             |
| occasionalDriver_profession    | Administrativo          |
| occasionalDriver_sex           | MUJER                  |
| occasionalDriver_youngest      | HIJO                   |
| prevInsurance_claims           | NO                     |
| prevInsurance_claimsCount      | 0                      |
| prevInsurance_company          | ALLIANZ                |
| prevInsurance_companyYear      | 8                      |
| prevInsurance_contractDate     | 2013-03-03             |
| prevInsurance_email            |                         |
| prevInsurance_emailRequest     | NO                     |
| prevInsurance_exists           | SI                     |
| prevInsurance_expirationDate   | 2021-03-02             |
| prevInsurance_fineAlcohol      |                         |
| prevInsurance_fineOther        |                         |
| prevInsurance_fineParking      |                         |
| prevInsurance_fineSpeed        |                         |
| prevInsurance_fines            | NO                     |
| prevInsurance_modality         | NO_ESTOY_SEGURO        |
| prevInsurance_years            | 8                      |
| reference_code                 | 1TT17TT11              |
| use_carUse                     | DIARIO                 |
| use_kmsYear                    | 10000                  |
| use_nightParking               | GARAJE_INDIVIDUAL      |
| use_postalCode                 |                         |

### **A3. Sample Request for Foo Insurance**
```xml
<TarificacionThirdPartyRequest>
    <Cotizacion>0</Cotizacion>
    <Datos>
          <DatosAseguradora>
            <AniosCiaAnterior>1</AniosCiaAnterior>
            <AniosTitularSeguro>1</AniosTitularSeguro>
            <CiaAnterior>C0723</CiaAnterior>
            <CincoDigPolAnterior xsi:nil="true" />
            <FecUltimoSiniestro>2018-06-13T00:00:00</FecUltimoSiniestro>
            <NroSiniestroCulpa>1</NroSiniestroCulpa>
            <SeguroEnVigor>S</SeguroEnVigor>
            <TiempoSinSeguro xsi:nil="true" />
        </DatosAseguradora>
        <DatosCoberturas>
            <DatosCoberturas>
                <CodCobertura>315</CodCobertura>
                <Valor>6000</Valor>
            </DatosCoberturas>
        </DatosCoberturas>
        <DatosConductor>
            <CodDocumento>NIF</CodDocumento>
            <CodPaisExpedicion>053</CodPaisExpedicion>
            <CodPaisNacimiento>053</CodPaisNacimiento>
            <CodPostal>28055</CodPostal>
            <EstadoCivil>S</EstadoCivil>
            <FecCarnet>2017-10-31T00:00:00</FecCarnet>
            <FecNacimiento>1990-11-12T00:00:00</FecNacimiento>
            <HijosCarnet>N</HijosCarnet>
            <Ocupacion>03</Ocupacion>
            <Profesion>0301</Profesion>
            <PuntosCarnet>15</PuntosCarnet>
            <Sexo>H</Sexo>
            <SubDocum xsi:nil="true" />
        </DatosConductor>
        <DatosGenerales>
            <CodMedAncl>36187</CodMedAncl>
            <CondPpalEsTomador>S</CondPpalEsTomador>
            <ConductorUnico>S</ConductorUnico>
            <ContrataAlgunPack>N</ContrataAlgunPack>
            <Cotizacion>0</Cotizacion>
            <EntornoOrigen>O_WSO</EntornoOrigen>
            <FecCot>2020-06-14T00:00:00</FecCot>
            <FecCotAncl xsi:nil="true" />
            <AnosSegAnte>3</AnosSegAnte>
            <FecUltimoSeguro xsi:nil="true" />
            <Franquicia xsi:nil="true" />
            <Idioma xsi:nil="true" />
            <ImporteFranquicia xsi:nil="true" />
            <MasVehiculos>MOT</MasVehiculos>
            <McaPagoTarjeta>N</McaPagoTarjeta>
            <Mediador>36187</Mediador>
            <Modalidad />
            <MotivoBonus xsi:nil="true" />
            <MotivoEstado xsi:nil="true" />
            <NivelDP xsi:nil="true" />
            <NivelLU xsi:nil="true" />
            <NivelRC xsi:nil="true" />
            <NroCochesFamilia>2</NroCochesFamilia>
            <NroCondOca>0</NroCondOca>
            <NroOpera xsi:nil="true" />
            <NroRiesgo>0</NroRiesgo>
            <PctOpera xsi:nil="true" />
            <Poliza>0</Poliza>
            <Polizaorigen>0</Polizaorigen>
            <Polizatarificada>0</Polizatarificada>
            <Ramo>315</Ramo>
            <ScoreA />
            <ScoreB />
            <SeguroEnVigor>S</SeguroEnVigor>
            <SubMediador xsi:nil="true" />
            <Subramo>01</Subramo>
            <Suplemento>1</Suplemento>
            <TallerConcertado>S</TallerConcertado>
            <UsuarioCot>ag36187w</UsuarioCot>
            <VersionCot>0</VersionCot>
        </DatosGenerales>
        <DatosPropietario>
            <Propietario>
                <CodActividad xsi:nil="true" />
                <CodDocumento>NIF</CodDocumento>
                <CodError xsi:nil="true" />
                <CodPais xsi:nil="true" />
                <Domicilio>
                    <CodPostal>28055</CodPostal>
                </Domicilio>
                <Empresa>4</Empresa>
                <FecCarnet>2017-10-31T00:00:00</FecCarnet>
                <FecNacimiento>1990-11-12T00:00:00</FecNacimiento>
                <NroDocumento />
                <SubCodDocumento xsi:nil="true" />
            </Propietario>
            <QuienEsPropietario>2</QuienEsPropietario>
            <TomadorEsPropietario>S</TomadorEsPropietario>
        </DatosPropietario>
        <DatosTomador>
            <CodActividad xsi:nil="true" />
            <CodDocumento>NIF</CodDocumento>
            <CodError xsi:nil="true" />
            <CodPais xsi:nil="true" />
            <Domicilio>
                <CodPostal>28055</CodPostal>
            </Domicilio>
            <Empresa>4</Empresa>
            <FecCarnet>2017-10-31T00:00:00</FecCarnet>
            <FecNacimiento>1990-11-12T00:00:00</FecNacimiento>
            <NroDocumento />
            <SubCodDocumento xsi:nil="true" />
        </DatosTomador>
        <DatosVehiculo>
            <CodMarca>0013</CodMarca>
            <CodModelo>094</CodModelo>
            <CodTiempoCompra>1</CodTiempoCompra>
            <CodUso>10</CodUso>
            <CodVersion>0144</CodVersion>
            <FecMatriculacion>2020-06-12T15:17:07</FecMatriculacion>
            <KmVehiculo>5000</KmVehiculo>
            <Parking>X</Parking>
            <ValorVehiculo>0</ValorVehiculo>
        </DatosVehiculo>
    </Datos>
    <Empresa>4</Empresa>
    <FaseTarificacion />
    <Identificador>ag36187w@SW11PX44</Identificador>
    <Plataforma>00023</Plataforma>
    <TipoTarificacion>T</TipoTarificacion>
    <VersionCotizacion>0</VersionCotizacion>
    <DatosComparadores>
        <MorosidadComparador>N</MorosidadComparador>
        <AnioVdaActual>1</AnioVdaActual>
        <MultasUlt3anios>1</MultasUlt3anios>
        <TipoSeguro>1</TipoSeguro>
    </DatosComparadores>
</TarificacionThirdPartyRequest>
```

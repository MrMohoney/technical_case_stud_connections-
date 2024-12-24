<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Command;

use App\CarInsurance\Application\Query\FindAllInsurancesHandler;
use App\CarInsurance\Application\Service\XmlServiceManager;
use App\CarInsurance\Application\UseCase\SendXmlUseCase;
use App\CarInsurance\Infrastructure\Adapter\Input\JsonDataAdapter;
use App\CarInsurance\Infrastructure\Exception\ExternalApiException;
use App\CarInsurance\Infrastructure\Repository\InFileInsuranceRepository;
use App\Shared\Infrastructure\Reader\JsonFileReader;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand( name: 'app:challenge', description: 'Challenge resolution by Alberto Posada 👍' )]
class ChallengeCommand extends Command
{
    public function __construct (
        private XmlServiceManager $xmlServiceManager,
        private SendXmlUseCase $sendXmlUseCase,
    ) {
        parent::__construct();
    }

    final public function execute ( InputInterface $input, OutputInterface $output ): int {

        $io = new SymfonyStyle( $input, $output );
        $this->welcomeMessage( $io );

        $io->title( "Iniciando comando" );
        $inputData = $this->readInputData();
        $data      = $this->dataMapper( $inputData );

        $xmlContent1 = $this->generateXml( $data[ 0 ] );
        $this->prettyPrintXml( $io, $xmlContent1, 'First Dataset' );
        $response1 = $this->sendXml( $xmlContent1 );

        $xmlContent2 = $this->generateXml( $data[ 1 ] );
        $this->prettyPrintXml( $io, $xmlContent2, 'Second Dataset' );
        $response2 = $this->sendXml( $xmlContent2 );

        return Command::SUCCESS;
    }

    private function readInputData (): array {
        $filename = './db/data/InsuranceData.json';

        $fileReader = new JsonFileReader();
        $repository = new InFileInsuranceRepository( $fileReader, $filename );

        $handler = new FindAllInsurancesHandler( $repository );
        return $handler->handle();
    }

    private function dataMapper ( array $inputData ): array {
        $adapter = new JsonDataAdapter( $inputData );
        return $adapter->map();
    }

    private function generateXml ( array $data ): string {
        return $this->xmlServiceManager->convert( 'foo', $data );
    }

    private function sendXml ( string $xmlContent ): array {
        try {
            $url = 'https://__api.foo.com/send-xml';
            return $this->sendXmlUseCase->execute( $url, $xmlContent );
        } catch ( ExternalApiException $e ) {
            echo $e->getMessage() . "\n\n"; // In non simulated enviroment, throw Exception instaed
            return [];
        }
    }

    private function prettyPrintXml ( SymfonyStyle $io, string $xmlContent, string $title = '' ): void {
        $dom               = new \DOMDocument();
        $dom->formatOutput = true;

        $dom->loadXML( $xmlContent );
        $formattedXml = $dom->saveXML();

        $io->section( $title );
        $io->text( $formattedXml );
    }

    private function welcomeMessage ( SymfonyStyle $io ): void {
        $io->title( 'Welcome Alberto Posada Check24 Challenge' );
        $io->text( 'This is a simple command to send XML files to a third party API' );

        $io->newLine();
        $io->text( 'Mapped fields are:' );
        $io->listing( [ 'CondPpalEsTomador', 'ConductorUnico', 'FecCot', 'AnosSegAnte', 'NroCondOca', 'SeguroEnVigor', ] );

        $io->newLine();
        $io->text( 'Also, there are some fields that are not mapped but are part of the XML file:' );
        $io->listing( [ 'AniosCiaAnterior', 'AniosTitularSeguro', 'CiaAnterior', 'FecCarnet', 'FecNacimiento', '[...]' ] );

        $io->newLine();
        $io->text( 'API URL not exists, so an error will be thrown' );
        $io->text( 'It was implemented only as an real example use case' );

        $io->newLine();
        $io->ask( 'Press Enter to continue', null );
    }
}

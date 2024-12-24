<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Infrastructure\Repository;

use App\CarInsurance\Infrastructure\Repository\InFileInsuranceRepository;
use App\Shared\Infrastructure\Reader\JsonFileReader;
use PHPUnit\Framework\TestCase;

class InFileInsuranceRepositoryTest extends TestCase
{
    final public function testFindAllInsurancesReturnsEmptyArray (): void {
        $filename = './db/data/InsuranceData.json';

        $fileReader = new JsonFileReader();
        $repository = new InFileInsuranceRepository( $fileReader, $filename );

        $result = $repository->findAllInsurances();

        $this->assertIsArray( $result );
        $this->assertCount( 2, $result );
    }
}

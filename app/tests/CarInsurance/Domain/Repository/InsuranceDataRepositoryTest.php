<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Repository;

use App\CarInsurance\Domain\Entity\InsurerData;
use App\CarInsurance\Domain\Repository\InsuranceDataRepository;
use PHPUnit\Framework\TestCase;

class InsuranceDataRepositoryTest extends TestCase
{

    final public function testFindAllInsurances (): void {
        $mockRepository = $this->createMock( InsuranceDataRepository::class );

        $expectedInsurances = [
            $this->createMock( InsurerData::class ),
            $this->createMock( InsurerData::class ),
        ];

        $mockRepository->expects( $this->once() )
            ->method( 'findAllInsurances' )
            ->willReturn( $expectedInsurances );

        $result = $mockRepository->findAllInsurances();

        $this->assertIsArray( $result );
        $this->assertCount( 2, $result );
        $this->assertContainsOnlyInstancesOf( InsurerData::class, $result );
    }
}

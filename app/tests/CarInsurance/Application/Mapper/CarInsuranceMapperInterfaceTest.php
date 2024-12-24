<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\CarInsuranceMapperInterface;
use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use PHPUnit\Framework\TestCase;

class CarInsuranceMapperInterfaceTest extends TestCase
{
    final public function testEnsureDataIsValid (): void {
        $mockMapper = $this->getMockBuilder( CarInsuranceMapperInterface::class )
            ->getMock();

        $requiredFields = [ 'field1', 'field2', 'field3' ];
        $data           = [ 'field1' => 'value1', 'field2' => 'value2', 'field3' => 'value3' ];

        $mockMapper->expects( $this->once() )
            ->method( 'ensureDataIsValid' )
            ->with( $data, $requiredFields );

        $mockMapper->ensureDataIsValid( $data, $requiredFields );
    }

    final public function testMapToEntity (): void {
        $mockEntity = $this->createMock( CarInsuranceEntityInterface::class );

        $mockMapper = $this->getMockBuilder( CarInsuranceMapperInterface::class )
            ->getMock();

        $data = [ 'field1' => 'value1', 'field2' => 'value2' ];

        $mockMapper->expects( $this->once() )
            ->method( 'mapToEntity' )
            ->with( $data )
            ->willReturn( $mockEntity );

        $result = $mockMapper->mapToEntity( $data );

        $this->assertSame( $mockEntity, $result );
    }
}

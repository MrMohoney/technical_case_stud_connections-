<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Port\input;

use App\CarInsurance\Application\Port\input\DataInputPort;
use PHPUnit\Framework\TestCase;

class DataInputPortTest extends TestCase
{

    final public function testMapMethodReturnsArray (): void {
        $mockDataInputPort = $this->createMock( DataInputPort::class );

        $mockDataInputPort->expects( $this->once() )
            ->method( 'map' )
            ->willReturn( [] );

        $result = $mockDataInputPort->map();

        $this->assertIsArray( $result );
    }
}

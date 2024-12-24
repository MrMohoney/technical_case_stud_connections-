<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Port;

use App\CarInsurance\Domain\Port\RequestSenderInterface;
use PHPUnit\Framework\TestCase;

class RequestSenderInterfaceTest extends TestCase
{

    final public function testSendRequest (): void {
        $mockUrl      = 'https://example.com/api';
        $mockHeaders  = [ 'Content-Type' => 'application/json' ];
        $mockBody     = '{"key": "value"}';
        $mockResponse = [ 'status' => 200, 'body' => 'Success' ];

        $mockRequestSender = $this->createMock( RequestSenderInterface::class );
        $mockRequestSender->expects( $this->once() )
            ->method( 'sendRequest' )
            ->with( $mockUrl, $mockHeaders, $mockBody )
            ->willReturn( $mockResponse );

        $this->assertEquals(
            $mockResponse,
            $mockRequestSender->sendRequest( $mockUrl, $mockHeaders, $mockBody ),
        );
    }
}

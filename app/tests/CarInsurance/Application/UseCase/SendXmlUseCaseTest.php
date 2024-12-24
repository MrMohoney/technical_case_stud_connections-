<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\UseCase;

use App\CarInsurance\Application\UseCase\SendXmlUseCase;
use App\CarInsurance\Domain\Port\RequestSenderInterface;
use PHPUnit\Framework\TestCase;

class SendXmlUseCaseTest extends TestCase
{
    final public function testExecute (): void {
        $mockRequestSender = $this->createMock( RequestSenderInterface::class );
        $mockRequestSender
            ->expects( $this->once() )
            ->method( 'sendRequest' )
            ->with(
                $this->equalTo( 'https://api_mok' ),
                $this->equalTo( [ 'Content-Type' => 'application/xml' ] ),
                $this->equalTo( '<xml>content</xml>' ),
            )
            ->willReturn( [ 'status' => 'success' ] );

        $sendXmlUseCase = new SendXmlUseCase( $mockRequestSender );

        $result = $sendXmlUseCase->execute( 'https://api_mok', '<xml>content</xml>' );

        $this->assertEquals( [ 'status' => 'success' ], $result );
    }
}

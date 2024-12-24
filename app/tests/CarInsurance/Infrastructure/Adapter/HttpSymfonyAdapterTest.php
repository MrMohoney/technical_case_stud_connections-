<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Infrastructure\Adapter;

use App\CarInsurance\Infrastructure\Adapter\HttpSymfonyAdapter;
use App\CarInsurance\Infrastructure\Exception\ExternalApiException;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpSymfonyAdapterTest extends TestCase
{
    final public function testSendRequestSuccess (): void {
        $mockHttpClient = $this->createMock( HttpClientInterface::class );
        $mockResponse   = $this->createMock( ResponseInterface::class );

        $mockHttpClient->expects( $this->once() )
            ->method( 'request' )
            ->with( 'POST', 'http://api.mok', [
                'headers' => [ 'Content-Type' => 'application/json' ],
                'body'    => '{"key":"value"}',
            ] )
            ->willReturn( $mockResponse );

        $mockResponse->expects( $this->once() )
            ->method( 'getStatusCode' )
            ->willReturn( 200 );

        $mockResponse->expects( $this->once() )
            ->method( 'toArray' )
            ->willReturn( [ 'data' => 'success' ] );

        $adapter = new HttpSymfonyAdapter( $mockHttpClient );
        $result  = $adapter->sendRequest( 'http://api.mok', [ 'Content-Type' => 'application/json' ], '{"key":"value"}' );

        $this->assertSame( [ 'data' => 'success' ], $result );
    }

    final public function testSendRequestThrowsExternalApiExceptionOnTransportError (): void {
        $mockHttpClient = $this->createMock( HttpClientInterface::class );

        $mockHttpClient->expects( $this->once() )
            ->method( 'request' )
            ->willThrowException( $this->createMock( TransportExceptionInterface::class ) );

        $this->expectException( ExternalApiException::class );
        $this->expectExceptionMessage( 'Failed to request:' );

        $adapter = new HttpSymfonyAdapter( $mockHttpClient );
        $adapter->sendRequest( 'http://api.mok' );
    }

    final public function testSendRequestThrowsExternalApiExceptionOnNon200StatusCode (): void {
        $mockHttpClient = $this->createMock( HttpClientInterface::class );
        $mockResponse   = $this->createMock( ResponseInterface::class );

        $mockHttpClient->expects( $this->once() )
            ->method( 'request' )
            ->willReturn( $mockResponse );

        $mockResponse->expects( $this->once() )
            ->method( 'getStatusCode' )
            ->willReturn( 500 );

        $this->expectException( ExternalApiException::class );
        $this->expectExceptionMessage( 'Request failed with status code: 500' );

        $adapter = new HttpSymfonyAdapter( $mockHttpClient );
        $adapter->sendRequest( 'http://api.mok' );
    }

    final public function testSendRequestThrowsExternalApiExceptionOnResponseDecodingError (): void {
        $mockHttpClient = $this->createMock( HttpClientInterface::class );
        $mockResponse   = $this->createMock( ResponseInterface::class );

        $mockHttpClient->expects( $this->once() )
            ->method( 'request' )
            ->willReturn( $mockResponse );

        $mockResponse->expects( $this->once() )
            ->method( 'getStatusCode' )
            ->willReturn( 200 );

        $mockResponse->expects( $this->once() )
            ->method( 'toArray' )
            ->willThrowException( new Exception( 'Decoding error' ) );

        $this->expectException( ExternalApiException::class );
        $this->expectExceptionMessage( 'Failed to decode response: Decoding error' );

        $adapter = new HttpSymfonyAdapter( $mockHttpClient );
        $adapter->sendRequest( 'http://api.mok' );
    }
}

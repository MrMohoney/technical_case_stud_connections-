<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Adapter;

use App\CarInsurance\Domain\Port\RequestSenderInterface;
use App\CarInsurance\Infrastructure\Exception\ExternalApiException;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Throwable;

class HttpSymfonyAdapter implements RequestSenderInterface
{
    public function __construct ( private HttpClientInterface $httpClient ) {}

    final public function sendRequest ( string $url, array $headers = [], ?string $body = null ): array {
        try {
            $response = $this->httpClient->request( 'POST', $url, [
                'headers' => $headers,
                'body'    => $body,
            ] );
        } catch ( TransportExceptionInterface $e ) {
            throw new ExternalApiException( 'Failed to request: ' . $e->getMessage() );
        }

        try {
            $statusCode = $response->getStatusCode();
        } catch ( TransportExceptionInterface $e ) {
            throw new ExternalApiException( 'Failed to get status code: ' . $e->getMessage() );
        }

        if ( $statusCode < 200 || $statusCode >= 300 ) {
            throw new ExternalApiException( "Request failed with status code: $statusCode" );
        }

        try {
            return $response->toArray( false );
        } catch ( Throwable $e ) {
            throw new ExternalApiException( 'Failed to decode response: ' . $e->getMessage() );
        }
    }
}

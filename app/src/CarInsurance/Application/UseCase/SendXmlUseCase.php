<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\UseCase;

use App\CarInsurance\Domain\Port\RequestSenderInterface;

class SendXmlUseCase
{
    public function __construct ( private RequestSenderInterface $requestSender ) {}

    final public function execute ( string $url, ?string $xmlContent = null, array $headers = [] ): array {
        $headers = array_merge( $headers, [ 'Content-Type' => 'application/xml' ] );
        return $this->requestSender->sendRequest( $url, $headers, $xmlContent );
    }
}

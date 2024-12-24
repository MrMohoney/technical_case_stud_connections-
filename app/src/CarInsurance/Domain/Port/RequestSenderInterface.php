<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Port;

interface RequestSenderInterface
{
    public function sendRequest(string $url, array $headers = [], ?string $body = null): array;
}

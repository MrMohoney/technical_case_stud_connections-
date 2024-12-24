<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Port;

interface XmlFormatConverterInterface
{
    public function supports ( string $provider ): bool;

    public function convert ( array $data ): string;
}

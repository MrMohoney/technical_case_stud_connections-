<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Domain\Port;

interface XmlMapperInterface
{
    public function mapToXml ( array $data ): string;
}

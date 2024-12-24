<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Application\Port\input;

interface DataInputPort
{
    public function map (): array;
}

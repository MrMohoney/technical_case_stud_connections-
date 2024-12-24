<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Repository;

use App\CarInsurance\Domain\Repository\InsuranceDataRepository;
use App\Shared\Infrastructure\Reader\JsonFileReader;

class InFileInsuranceRepository implements InsuranceDataRepository
{
    private JsonFileReader $fileReader;
    private string         $filePath;

    final public function __construct ( JsonFileReader $fileReader, string $filePath ) {
        $this->fileReader = $fileReader;
        $this->filePath   = $filePath;
    }

    final public function findAllInsurances (): array {
        return $this->fileReader->read( $this->filePath );
    }
}

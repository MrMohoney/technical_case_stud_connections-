<?php

declare( strict_types = 1 );

namespace App\Shared\Infrastructure\Reader;

use App\CarInsurance\Infrastructure\Exception\FileNotFoundException;
use App\CarInsurance\Infrastructure\Exception\InvalidJsonProvidedException;
use App\CarInsurance\Infrastructure\Exception\UnableReadFileException;
use JsonException;

class JsonFileReader
{
    final public function read ( string $filePath ): array {
        if ( !file_exists( $filePath ) ) {
            throw new FileNotFoundException( $filePath );
        }

        $content = file_get_contents( $filePath );

        if ( $content === false ) {
            throw new UnableReadFileException( $filePath );
        }

        return $this->parseContent( $content );
    }

    private function parseContent ( string $content ): array {
        try {
            return json_decode( $content, true, 512, JSON_THROW_ON_ERROR );
        } catch ( JsonException ) {
            throw new InvalidJsonProvidedException();
        }
    }
}

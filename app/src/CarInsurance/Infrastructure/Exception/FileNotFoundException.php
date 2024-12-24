<?php

declare( strict_types = 1 );

namespace App\CarInsurance\Infrastructure\Exception;

use Symfony\Component\Filesystem\Exception\FileNotFoundException as FrameworkFileNotFoundException;

class FileNotFoundException extends FrameworkFileNotFoundException
{
    public function __construct ( string $file ) {
        parent::__construct( "File not found: $file" );
    }
}

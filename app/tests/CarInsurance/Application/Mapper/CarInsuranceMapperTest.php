<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\Mapper;

use App\CarInsurance\Application\Mapper\CarInsuranceMapper;
use App\Shared\Application\Exception\MissingRequiredFieldsException;
use PHPUnit\Framework\TestCase;

class CarInsuranceMapperTest extends TestCase
{
    final public function testEnsureDataIsValidThrowsExceptionForMissingFields (): void {
        $mapper = $this->getMockForAbstractClass( CarInsuranceMapper::class );

        $data = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $requiredFields = [ 'field1', 'field2', 'field3' ];

        $this->expectException( MissingRequiredFieldsException::class );
        $this->expectExceptionMessage( 'The required fields "field3" are missing.' );

        $mapper->ensureDataIsValid( $data, $requiredFields );
    }

    final public function testEnsureDataIsValidDoesNotThrowExceptionWhenAllFieldsArePresent (): void {
        $mapper = $this->getMockForAbstractClass( CarInsuranceMapper::class );

        $data = [
            'field1' => 'value1',
            'field2' => 'value2',
        ];

        $requiredFields = [ 'field1', 'field2' ];

        $this->expectNotToPerformAssertions();

        $mapper->ensureDataIsValid( $data, $requiredFields );
    }
}

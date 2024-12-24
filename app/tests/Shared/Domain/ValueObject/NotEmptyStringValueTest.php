<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\ValueObject\NotEmptyStringValue;
use PHPUnit\Framework\TestCase;

class NotEmptyStringValueTest extends TestCase
{

    final public function testItShouldThrowExceptionForEmptyString (): void {
        $this->expectException( \App\Shared\Domain\Exception\DomainException::class );
        $this->expectExceptionMessage( 'String value cannot be empty' );

        new NotEmptyStringValue( '' );
    }

    final public function testItShouldReturnTheGivenStringValue (): void {
        $stringValue         = 'Valid String';
        $notEmptyStringValue = new NotEmptyStringValue( $stringValue );

        $this->assertSame( $stringValue, $notEmptyStringValue->value() );
    }

    final public function testItShouldBeConvertibleToString (): void {
        $stringValue         = 'Valid String';
        $notEmptyStringValue = new NotEmptyStringValue( $stringValue );

        $this->assertSame( $stringValue, (string)$notEmptyStringValue );
    }

    final public function testItShouldBeEqualWhenValuesAreTheSame (): void {
        $stringValue    = 'Valid String';
        $firstInstance  = new NotEmptyStringValue( $stringValue );
        $secondInstance = new NotEmptyStringValue( $stringValue );

        $this->assertTrue( $firstInstance->equals( $secondInstance ) );
        $this->assertTrue( $secondInstance->equals( $firstInstance ) );
    }

    final public function testItShouldNotBeEqualWhenValuesAreDifferent (): void {
        $firstInstance  = new NotEmptyStringValue( 'First String' );
        $secondInstance = new NotEmptyStringValue( 'Second String' );

        $this->assertFalse( $firstInstance->equals( $secondInstance ) );
        $this->assertFalse( $secondInstance->equals( $firstInstance ) );
    }
}

<?php

declare( strict_types = 1 );

namespace Tests\Shared\Domain\ValueObject;

use App\Shared\Domain\Exception\DomainException;
use App\Shared\Domain\ValueObject\MoneyValue;
use PHPUnit\Framework\TestCase;

class MoneyValueTest extends TestCase
{

    final public function testCanCreateMoneyValueWithValidAmountAndCurrency (): void {
        $money = new MoneyValue( 100.50, 'USD' );

        $this->assertSame( 100.50, $money->amount() );
        $this->assertSame( 'USD', $money->currency() );
        $this->assertSame( '100.50 USD', $money->formatted() );
    }

    final public function testCanCreateMoneyValueWithDefaultCurrency (): void {
        $money = new MoneyValue( 200.75 );

        $this->assertSame( 200.75, $money->amount() );
        $this->assertSame( 'EUR', $money->currency() );
        $this->assertSame( '200.75 EUR', $money->formatted() );
    }

    final public function testThrowsExceptionForNegativeAmount (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Amount must be greater than or equal to 0' );

        new MoneyValue( -50.00, 'USD' );
    }

    final public function testThrowsExceptionForInvalidCurrencyCode (): void {
        $this->expectException( DomainException::class );
        $this->expectExceptionMessage( 'Invalid currency code provided: "US". Examples: EUR, USD...' );

        new MoneyValue( 100.00, 'US' );
    }

    final public function testMoneyValueCanBeCastToString (): void {
        $money = new MoneyValue( 99.99, 'GBP' );

        $this->assertSame( '99.99 GBP', (string)$money );
    }
}

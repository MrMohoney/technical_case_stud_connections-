<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Domain\Contract;

use App\CarInsurance\Domain\Contract\CarInsuranceEntityInterface;
use PHPUnit\Framework\TestCase;

class CarInsuranceEntityInterfaceTest extends TestCase
{
    final public function testCarInsuranceEntityInterfaceExists (): void {
        $this->assertTrue( interface_exists( CarInsuranceEntityInterface::class ) );
    }

}

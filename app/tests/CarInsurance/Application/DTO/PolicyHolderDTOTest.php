<?php

declare( strict_types = 1 );

namespace Tests\CarInsurance\Application\DTO;

use App\CarInsurance\Application\DTO\PolicyHolderDTO;
use App\CarInsurance\Domain\Entity\PolicyHolder;
use App\CarInsurance\Domain\ValueObject\UnmappedStringValue;
use PHPUnit\Framework\TestCase;

class PolicyHolderDTOTest extends TestCase
{
    final public function testConstructor (): void {
        $empresa      = "Test Company";
        $codPostal    = "12345";
        $nroDocumento = "67890";

        $dto = new PolicyHolderDTO( $empresa, $codPostal, $nroDocumento );

        $this->assertSame( $empresa, $dto->empresa );
        $this->assertSame( $codPostal, $dto->codPostal );
        $this->assertSame( $nroDocumento, $dto->nroDocumento );
    }

    final public function testFromEntity (): void {
        $empresa      = "Test Company";
        $codPostal    = "12345";
        $nroDocumento = "67890";

        $mockPolicyHolder = $this->createMock( PolicyHolder::class );
        $mockPolicyHolder->method( 'empresa' )->willReturn( new UnmappedStringValue( $empresa ) );

        $mockPolicyHolder->method( 'codPostal' )->willReturn( new UnmappedStringValue( $codPostal ) );

        $mockPolicyHolder->method( 'nroDocumento' )->willReturn( new UnmappedStringValue( $nroDocumento ) );

        $dto = PolicyHolderDTO::fromEntity( $mockPolicyHolder );

        $this->assertSame( $empresa, $dto->empresa );
        $this->assertSame( $codPostal, $dto->codPostal );
        $this->assertSame( $nroDocumento, $dto->nroDocumento );
    }
}

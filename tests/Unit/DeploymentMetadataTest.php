<?php

namespace Tests\Unit;

use App\Support\DeploymentMetadata;
use PHPUnit\Framework\TestCase;

class DeploymentMetadataTest extends TestCase
{
    public function test_missing_values_fall_back_to_unavailable(): void
    {
        $this->assertSame('No disponible', DeploymentMetadata::value(null));
        $this->assertSame('No disponible', DeploymentMetadata::value(''));
        $this->assertSame('No disponible', DeploymentMetadata::value('   '));
        $this->assertSame('main', DeploymentMetadata::value('main'));
        $this->assertSame('v0.1.0', DeploymentMetadata::value('', 'v0.1.0'));
    }
}

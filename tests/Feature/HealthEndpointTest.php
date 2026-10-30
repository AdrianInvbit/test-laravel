<?php

namespace Tests\Feature;

use Tests\TestCase;

class HealthEndpointTest extends TestCase
{
    public function test_health_endpoint_returns_json_without_authentication(): void
    {
        $response = $this->getJson('/api/health');

        $response->assertOk();
        $response->assertExactJson([
            'status' => 'ok',
            'name' => 'test-laravel',
            'version' => 'v0.1.0',
        ]);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_displays_application_info_and_metadata(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('test-laravel');
        $response->assertSee('v0.1.0');
        $response->assertSee('Laravel');
        $response->assertSee('test-branch');
        $response->assertSee('abc123def456');
        $response->assertSee('2026-10-30T12:00:00Z');
        $response->assertSee('Metadatos del despliegue');
    }
}

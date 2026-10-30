<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class NoDatabaseDependencyTest extends TestCase
{
    public function test_application_pages_do_not_require_database_queries(): void
    {
        DB::listen(function (): void {
            $this->fail('Se ejecutó una consulta a base de datos; la aplicación no debe depender de ella.');
        });

        $this->get('/')->assertOk();
        $this->get('/productos')->assertOk();
        $this->get('/productos/2')->assertOk();
        $this->getJson('/api/health')->assertOk();
    }
}

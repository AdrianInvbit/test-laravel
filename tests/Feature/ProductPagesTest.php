<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductPagesTest extends TestCase
{
    public function test_products_index_lists_five_products(): void
    {
        $response = $this->get('/productos');

        $response->assertOk();
        $response->assertSee('Notebook Aurora Pro');
        $response->assertSee('Teclado Mecánico Nebula');
        $response->assertSee('Monitor Ultrawide Horizon');
        $response->assertSee('Auriculares Pulse Max');
        $response->assertSee('Hub USB-C Orbit');
    }

    public function test_product_detail_page_shows_product_information(): void
    {
        $response = $this->get('/productos/1');

        $response->assertOk();
        $response->assertSee('Notebook Aurora Pro');
        $response->assertSee('Informática');
        $response->assertSee('1.299,00');
    }

    public function test_missing_product_returns_not_found(): void
    {
        $response = $this->get('/productos/999');

        $response->assertNotFound();
        $response->assertSee('Producto no encontrado');
    }
}

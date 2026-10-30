<?php

namespace Tests\Unit;

use App\Support\ProductCatalog;
use PHPUnit\Framework\TestCase;

class ProductCatalogTest extends TestCase
{
    public function test_catalog_contains_exactly_five_products(): void
    {
        $this->assertCount(5, ProductCatalog::all());
    }

    public function test_find_returns_product_or_null(): void
    {
        $this->assertSame('Hub USB-C Orbit', ProductCatalog::find(5)['name']);
        $this->assertNull(ProductCatalog::find(42));
    }
}

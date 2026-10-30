<?php

namespace App\Support;

class ProductCatalog
{
    /**
     * @return array<int, array{id: int, name: string, description: string, price: float, category: string}>
     */
    public static function all(): array
    {
        return [
            [
                'id' => 1,
                'name' => 'Notebook Aurora Pro',
                'description' => 'Portátil ligero con pantalla 14" y autonomía de jornada completa.',
                'price' => 1299.00,
                'category' => 'Informática',
            ],
            [
                'id' => 2,
                'name' => 'Teclado Mecánico Nebula',
                'description' => 'Switches táctiles, iluminación configurable y diseño compacto 75%.',
                'price' => 119.90,
                'category' => 'Periféricos',
            ],
            [
                'id' => 3,
                'name' => 'Monitor Ultrawide Horizon',
                'description' => 'Pantalla 34" UWQHD ideal para productividad y edición.',
                'price' => 549.00,
                'category' => 'Pantallas',
            ],
            [
                'id' => 4,
                'name' => 'Auriculares Pulse Max',
                'description' => 'Cancelación activa de ruido y micrófono desmontable.',
                'price' => 189.50,
                'category' => 'Audio',
            ],
            [
                'id' => 5,
                'name' => 'Hub USB-C Orbit',
                'description' => 'Multipuerto con HDMI 2.0, Ethernet y carga PD 100W.',
                'price' => 79.99,
                'category' => 'Accesorios',
            ],
        ];
    }

    /**
     * @return array{id: int, name: string, description: string, price: float, category: string}|null
     */
    public static function find(int $id): ?array
    {
        foreach (self::all() as $product) {
            if ($product['id'] === $id) {
                return $product;
            }
        }

        return null;
    }
}

<?php

namespace App\Http\Controllers;

use App\Support\ProductCatalog;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('products.index', [
            'products' => ProductCatalog::all(),
        ]);
    }

    public function show(int $id): View
    {
        $product = ProductCatalog::find($id);

        if ($product === null) {
            abort(404, 'Producto no encontrado');
        }

        return view('products.show', [
            'product' => $product,
        ]);
    }
}

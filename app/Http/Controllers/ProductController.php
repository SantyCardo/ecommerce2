<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    function index()
    {
        return view('products.index');
    }

    function create()
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        return view('admin.products.create', compact('categories', 'brands'));
    }

    function show($id, $category = null)
    {
        return view('products.show');
            return "Deatlle de cada producto: " . $id;
        if ($category === null) {
            return "Deatlle de cada producto: " . $id . " de la categoria: " . $category;
        }
    }

    public function table(Request $request)
    {
        $q = $request->get('q');
        $brandId = $request->get('brand_id');
        $categoryId = $request->get('category_id');
        $perPage = $request->get('per_page', 10);

        $products = Product::with(['brand', 'category'])
            ->when($q, fn($query) => $query->where('name', 'like', "%$q%"))
            ->when($brandId, fn($query) => $query->where('brand_id', $brandId))
            ->when($categoryId, fn($query) => $query->where('category_id', $categoryId))
            ->orderByDesc('id')
            ->paginate($perPage)
            ->appends($request->query());

        $brands = Brand::orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact('products', 'brands', 'categories', 'q', 'brandId', 'categoryId'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0|max:9999999999.99',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'url_image' => 'nullable|string'
        ]);

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Producto creado');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0|max:9999999999.99',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'url_image' => 'nullable|string'
        ]);

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado');
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Получает все продукты
//        foreach ($products as $product) {
//            dump($product->name);
//        }
//        die();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        return view('products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric',
            'brand_id' => 'required|exists:brands,id|integer', // Проверка существования brand_id
            'qty'      => 'nullable|numeric',
        ]);

        // Создаёт продукт, учитывая разрешенные поля
        $product = Product::create($request->only(['name', 'price', 'brand_id', 'qty']));

        return redirect()->route('products.index')->with('success', 'Продукт успешно создан.'); // Редирект на index с сообщением об успехе
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        // Возвращает форму для редактирования продукта (обычно в виде вьюхи)
        return view('products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'price'    => 'required|numeric',
            'brand_id' => 'required|exists:brands,id', // Проверка существования бренда
            'qty'      => 'nullable|numeric',
        ]);

        // Обновление продукта, включая id бренда
        $product->update([
            'name'     => $request->name,
            'price'    => $request->price,
            'brand_id' => $request->brand_id, // Используйте brand_id для связи
            'qty'      => $request->qty,
        ]);

        return redirect()->route('products.index')->with('success', 'Продукт успешно обновлен.'); // Измените сообщение на соответствующее
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();                 // Удаляет продукт
        return redirect()->route('products.index')->with('success', 'Продукт успешно обновлен.'); // Измените сообщение на соответствующее
    }
}

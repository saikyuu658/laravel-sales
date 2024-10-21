<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller {
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('pages.products', ['products' => $products]);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return response()->json($product);
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'category' => 'required',
            'stock_quantity' => 'required|integer',
            'image' => 'required|image',
        ]);

        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            $imageName = now()->timestamp . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('products', $imageName, 'public');
        }

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'purchase_price' => $request->input('purchase_price'),
            'sale_price' => $request->input('sale_price'),
            'category' => $request->input('category'),
            'stock_quantity' => $request->input('stock_quantity'),
            'image_path' => $imagePath
        ]);

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
            'category' => 'required',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:1000',
        ]);

        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $image = $request->file('image');
            $imageName = now()->timestamp . '.' . $image->getClientOriginalExtension();
            $image->storeAs('products', $imageName, 'public');
            $product->image_path = $imagePath;
        }
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->purchase_price = $request->input('purchase_price');
        $product->sale_price = $request->input('sale_price');
        $product->category = $request->input('category');
        $product->stock_quantity = $request->input('stock_quantity');

        $product->save();

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }
}

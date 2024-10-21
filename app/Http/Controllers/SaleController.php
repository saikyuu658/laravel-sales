<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(){
        $sales = Sale::with('customer', 'products')->get();

        $product = Product::All();
        return view('pages.sale', ['sales' => $sales, 'products' => $product]);
    }

    public function show($id){
        $sale = Sale::with('customer', 'products')->findOrFail($id);
        return response()->json($sale);
        
    }


    public function store(Request $request){
        DB::transaction(function () use ($request) {
            $customer = Customer::firstOrCreate(
                ['email' => $request->input('email')],
                ['name' => $request->input('name'), 'phone' => $request->input('phone'),'cpf' =>$request->input('cpf')]
            );
    
            $sale = Sale::create([
                'customer_id' => $customer->id,  
                'total' => 0, 
                'discount' => $request->input('discount') ?? 0,
            ]);
    
            $totalSale = 0;
    
            foreach ($request->input('products') as $productData) {
                $product = Product::findOrFail($productData['product_id']);
                $quantity = $productData['quantity'];
    
                if ($product->stock_quantity < $quantity) {
                    throw new \Exception('Estoque insuficiente para o produto: ' . $product->name);
                }
    
                $totalProduct = $quantity * $product->sale_price;
    
                $product->stock_quantity -= $quantity;
                $product->save();
    
                $sale->products()->attach($product->id, [
                    'quantity' => $quantity,
                    'total' => $totalProduct,
                ]);
    
                $totalSale += $totalProduct;
            }
    
            $discount = $request->input('discount') ?? 0;
            $totalSaleAfterDiscount = $totalSale - ($totalSale * $discount / 100);
    
            $sale->total = $totalSaleAfterDiscount;
            $sale->save();
        });

        return redirect()->route('sales.index')->with('success', 'Venda realizada com sucesso!');
    }
}

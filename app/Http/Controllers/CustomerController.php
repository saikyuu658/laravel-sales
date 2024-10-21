<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::orderBy('name')->get();
        return view('pages.customers', ['customers' => $customers]);
    }

    
    public function show($id) {
        $customers = Customer::findOrFail($id);

        return response()->json($customers);
    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $id,
            'phone' => 'required|string|max:20',
            'cpf' => 'required|string|max:14|unique:customers,cpf,' . $id,
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update($validatedData);

        return redirect()->route('customer.index')->with('success', 'Cliente atualizado com sucesso!');
    }
}

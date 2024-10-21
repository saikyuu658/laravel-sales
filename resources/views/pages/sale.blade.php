@extends('layouts.main')

@section('title', 'Vendas')

@section('content-main')
<div class="flex justify-between items-center">
    <h1 class="font-bold text-[25px] my-4">Vendas</h1>
    <div class="w-[150px]">
        <x-button text="Nova venda" id="btnModalNewSale"/>
    </div>
</div>
<div class="bg-white shadow-md rounded mt-2">
    <div class="overflow-y-auto" style="height: 79vh;">
        @if($sales->isEmpty())
            <div class="justify-center items-center text-center font-bold text-gray-600 text-[30px]">
                <p class="text-center font-bold text-gray-600 text-[30px] mt-[20%]">Nenhum registro encontrado</p>
            </div>
        @else 
            <table class="min-w-full table-auto rounded-md">
                <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                    <tr>
                        <th class="px-4 py-2 text-left" style="border-top-left-radius: 6px">Valor</th>
                        <th class="px-4 py-2 text-left">Cliente</th>
                        <th class="px-4 py-2 text-left">qtd itens</th>
                        <th class="px-4 py-2 text-left">data e hora</th>
                        <th class="px-4 py-2 text-left" style="border-top-right-radius: 6px">Ações</th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($sales as $sale)
                        <tr>
                            <td class="px-4 py-2"> {{ number_format($sale->total, 2, ',', '.') }}</td>
                            <td class="px-4 py-2"> {{ $sale->customer->name }}</td>
                            <td class="px-4 py-2">{{ $sale->products->sum('pivot.quantity') }} </td>
                            <td class="px-4 py-2">{{ $sale->created_at->format('d/m/Y H:i') }} </td>
                            <td class="px-4 py-2">
                                <x-link link="#" id="detalharSale" class="linkSelector" text="detalhar" dataId="{{$sale->id}}" />
                            </td>
                        </tr>
                    @endforeach
                
                </tbody>
            </table>
        @endif
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert($error)
            </script>
        @endforeach
    @endif

</div>


<x-myModal title="Novo venda" type="lg" id="modalNewSale" > 
    
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <fieldset>
            <legend>Cadastrar Cliente</legend>
            <div class="p-2">
                <div class="flex gap-2 ">
                    <div class="flex-1">
                        <x-input type="text" label="Nome" id="nome" name='name' placeholder="Nome do cliente"/>
                    </div>  
                    <div class="flex-1">
                        <x-input type="text" label="CPF" id="cpf" name='cpf' placeholder="CPF do cliente"/>    
                    </div> 
                    <div class="flex-1">
                        <x-input type="email" label="Email" id="email" name='email' placeholder="Email do cliente"/>    
                    </div> 
                    <div class="flex-1">
                        <x-input type="tel" label="Telefone" id="telefone" name='phone' placeholder="Telefone do cliente"/>    
                    </div>   
                    
                    
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>Cadastrar Produto</legend>
            <div  class="p-2">
                <div class="flex gap-3">
                    <div class="flex-1">
                        <label for="listPruduct" class="block text-gray-700 font-semibold mb-2">Produtos</label>
                        <select id="listPruduct" class="w-full px-4 py-2 text-gray-600 border rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-500">
                            @foreach($products as $product)
                                <option value="{{$product->id}}" data-price="{{$product->sale_price}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                    </div>  
                    <x-input type="number" label="Quantidade" id="qtdporProduct" name='qtd' placeholder="00"/>    
                    <div class="flex-2 w-[100px] h-[90px] flex items-end pb-5">
                        <p id="addInListProducts" class="text-gray-800 font-semibold shadow-md cursor-pointer p-2 rounded-lg bg-gray-100 hover:bg-white focus:outline-none w-fit">adicionar</p> 
                    </div>
                </div>
                <div class="bg-white shadow-md rounded my-2">
                    <div class="overflow-y-auto" style="height: 300px;">
                        <table id="tableproducts" class="min-w-full table-auto rounded-md" >
                            <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                                <tr>
                                    <th class="px-4 py-2 text-left w-[30%]" style="border-top-left-radius: 6px" >Produto</th>
                                    <th class="px-4 py-2 text-left">Valor uni.</th>
                                    <th class="px-4 py-2 text-left" >Qtd.</th>
                                    <th class="px-4 py-2 text-left">Valor Total</th>
                                    <th class="px-4 py-2 text-left" style="border-top-right-radius: 6px">Ações</th>
                                </tr>
                            </thead>
                
                            <tbody class="bg-white divide-y divide-gray-200" id="bodyTable">
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                <p id="totalSale" class="font-bold text-lg text-end leading-8"></p>
                <div class="w-[200px]">
                    <x-input type="number" label="Cupom de desconto(%)" id="desconto" name='discount' placeholder="00"/>    
                </div>
            </div>
        </fieldset>
        
        <div class="w-[150px] mt-6">
            <x-button id="saveSales" text="Finalizar venda" />
        </div>        
    </form>
</x-myModal>

<x-myModal title="Detalhe da venda" id="modalDetalsSale" > 
    
    <div class="flex justify-between mb-4">
        <div >
            <label class="block text-gray-700 font-semibold mb-1">Nome</label>
            <p class="w-full py-2 text-gray-600" id="saleCustomerName"></p>
        </div>
        <div class="mb-2">
            <label class="block text-gray-700 font-semibold mb-1">CPF</label>
            <p class="w-full  text-gray-600 " id="saleCustomerCpf"></p>
        </div>
        <div >
            <label class="block text-gray-700 font-semibold mb-1">Telefone</label>
            <p class="w-full py-2 text-gray-600 " id="saleCustomerPhone"></p>
        </div>
    </div>
    <div class="flex gap-2 mb-4">
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Email</label>
            <p class="w-full  text-gray-600 "  id="saleCustomerEmail"></p>
        </div>
    </div>
    <div class="bg-white shadow-md rounded mt-2">
        <div class="overflow-y-auto" style="max-height: 300px;">
            <table class="min-w-full table-auto rounded-md" id="tableShowDetails">
                <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                    <tr>
                        <th class="px-1 py-2 text-left" style="border-top-left-radius: 6px">Qtd.</th>
                        <th class="px-4 py-2 text-left w-[40%]" >Produto</th>
                        <th class="px-4 py-2 text-left">Valor uni.</th>
                        <th class="px-4 py-2 text-left" style="border-top-right-radius: 6px">Valor Total</th>
                    </tr>
                </thead>
    
                <tbody class="bg-white divide-y divide-gray-200 ">
                </tbody>
            </table>
        </div>
    </div>

    <p class="text-gray-700 font-semibold mb-1">Cupom de desconto: <span class="text-gray-900" id="discount"></span></p>

    <p class="py-3 font-bold text-xl text-end" id="totalValueDetails"></p>
    <div class="w-[150px] mt-6">
    </div>        
</x-myModal>


<script>
    const modal = document.getElementById("modalNewSale");
    const modalDetals = document.getElementById("modalDetalsSale");
    const btn = document.getElementById("btnModalNewSale");

    
    btn.onclick = function() {
        modal.style.display = "block";
    }
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var totalValor = 0
    var addInListProducts = document.querySelector('#addInListProducts')
    
    
    addInListProducts.addEventListener('click', function (){
        const tableBody = document.getElementById('tableproducts').querySelector('tbody')
        const productSelect = document.querySelector('#listPruduct')
        const qtdporProduct = parseFloat(document.querySelector('#qtdporProduct').value);
        const selectedProductId = productSelect.value;
        const selectedProductName = productSelect.options[productSelect.selectedIndex].text;
        const selectedProductPrice = parseFloat(productSelect.options[productSelect.selectedIndex].getAttribute('data-price'));
        const totalProduct = qtdporProduct * selectedProductPrice;

        if (qtdporProduct < 1 || isNaN(qtdporProduct)) {
            alert('Por favor, insira uma quantidade válida.');
            return;
        }
        const itemTableProduct = document.createElement('tr');
        itemTableProduct.innerHTML = `
            <td class="px-4 py-2">  ${selectedProductName} </td>
            <td class="px-4 py-2"> ${selectedProductPrice} </td>
            <td class="px-1 "> ${qtdporProduct}X </td>
            <td class="px-4 py-2"> ${totalProduct} </td>
            <td class="px-4 py-2">
                <x-link link="#" id="detalharSale" class="removeTableproducts" style="color: #EF4444" text="Remover" dataId="${productSelect.value}" />
            </td>
            <input type="hidden" name="products[${tableBody.children.length}][product_id]" value="${selectedProductId}">
            <input type="hidden" name="products[${tableBody.children.length}][quantity]" value="${qtdporProduct}">
            <input type="hidden" name="products[${tableBody.children.length}][total]" value="${totalProduct.toFixed(2)}">`

        tableBody.appendChild(itemTableProduct);
    })


    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('removeTableproducts')) {
            event.target.closest('tr').remove();
            
        }
    });

    var openModalButtons = document.querySelectorAll('.linkSelector');
        openModalButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var customID = this.getAttribute('data-id');

                fetch('/sale/' + customID)
                    .then(response => response.json())
                    .then(sale => {
                        document.getElementById('saleCustomerName').innerHTML = sale.customer.name;
                        document.getElementById('saleCustomerCpf').innerHTML = sale.customer.cpf;
                        document.getElementById('saleCustomerEmail').innerHTML = sale.customer.email;
                        document.getElementById('saleCustomerPhone').innerHTML = sale.customer.phone;
                        document.getElementById('totalValueDetails').innerHTML = `R$ ${sale.total}`
                        document.getElementById('discount').innerHTML = `${sale.discount}%`

                        
                        
                        const tableBodyDetals = document.getElementById('tableShowDetails').querySelector('tbody')
                        tableBodyDetals.innerHTML = '';

                        sale.products.forEach(e =>{
                            const itemTableProduct = document.createElement('tr');
                            itemTableProduct.innerHTML = `
                                <td class="px-1 py-2"> ${e.pivot.quantity} </td>
                                <td class="px-4 py-2"> ${e.name} </td>
                                <td class="px-4 py-2"> R$ ${e.sale_price} </td>
                                <td class="px-4 py-2"> R$ ${e.pivot.total} </td>
                            `
                            tableBodyDetals.appendChild(itemTableProduct);
                        })

                        modalDetals.style.display='block'
                    })
                    .catch(error => console.error('Erro ao carregar os dados do produto:', error));
            });
        });

        
</script>
@endsection
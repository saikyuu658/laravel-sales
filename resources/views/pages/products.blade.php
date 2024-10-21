@extends('layouts.main')

@section('title', 'Produtos')

@section('content-main')
    <div class="flex justify-between items-center">
        <h1 class="font-bold text-[25px] my-4">Produtos</h1>
        <div class="w-[150px]">
            <x-button text="Novo produto" id="btnNewProdut" />
        </div>
    </div>

    <div class="bg-white shadow-md rounded mt-2">
        <div class="overflow-y-auto" style="height: 79vh;">
            @if($products->isEmpty())
                <div class="justify-center items-center text-center font-bold text-gray-600 text-[30px]">
                    <p class="text-center font-bold text-gray-600 text-[30px] mt-[20%]">Nenhum registro encontrado</p>
                </div>
            @else 
                <table class="min-w-full table-auto rounded-md">
                    <thead class="bg-gray-100 text-gray-800 sticky top-0" style="border-top-right-radius: 10px">
                        <tr>
                            <th class="px-4 py-2 text-left" style="border-top-left-radius: 6px"></th>
                            <th class="px-4 py-2 text-left" >Nome</th>
                            <th class="px-4 py-2 text-left">Valor venda</th>
                            <th class="px-4 py-2 text-left">Valor compra</th>
                            <th class="px-4 py-2 text-left">Qtd</th>
                            <th class="px-4 py-2 text-left"  style="border-top-right-radius: 6px">Ações</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($products as $product)
                            <tr >
                                <td class="px-2 py-2"> <div class="w-[35px] bg-gray-400 rounded-full h-[35px]">
                                        <img src="{{asset('storage/' . $product->image_path)}}" width="100%" alt="">    
                                </div> </td>
                                <td class="px-4 py-2"> {{$product->name}} </td>
                                <td class="px-4 py-2"> {{$product->purchase_price}} </td>
                                <td class="px-4 py-2"> {{$product->sale_price}} </td>
                                <td class="px-4 py-2"> {{$product->stock_quantity}} </td>
                                <td class="px-4 py-2">
                                    <x-link link="#" id="detalsProduts" class="linkSelector" text="Editar" dataId="{{$product->id}}"  />
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    
    <x-myModal title="Novo produto" id="modalNewProdut" > 
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="flex  justify-between">
                <div class="flex-2">
                    <x-input type="text" label="Nome" id="nome" name='name' placeholder="Nome do produto"/>         
                </div>
                <x-input type="number" label="Quantidade" id="qtd" name='stock_quantity' placeholder="00"/>         
            </div>        
            <x-input type="text" label="Descrição" id="descrition" name='description' placeholder="Digite a descrição"/>  
            
            <div class="flex  justify-between">
                <x-input type="number" label="Valor de comp." id="valorC" name='purchase_price' placeholder="Digite o valor"/>  
                <x-input type="number" label="Valor de vend." id="valorV" name='sale_price' placeholder="Digite o valor"/>  
            </div>
            <x-input type="text" label="Categoria" id="categoria" name='category' placeholder="Digite a categoria"/> 
            
            <label for="loadFile">
                <div class="border-dashed border-2 border-red-400  w-[100%] ">
                    <p class="align-middle text-center"> Click para carregar sua imagem</p>
                    <p class="align-middle text-xs text-center"> Imagem com máximo 5mb </p>
                </div>
                <input type="file" id="loadFile" name="image" accept="image/png, image/jpeg" style="display: none">
            </label>
            <div class="w-[150px] mt-6">
                <x-button id="saveProdutBtn" text="Cadastrar Produto" />
            </div>        
        </form>
    </x-myModal>

    <x-myModal title="Detalhes do produto" id="modalDetailsProdut" >  
        <form class="py-3" id="formEditaction" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="flex  justify-between">
                <div class="flex-2">
                    <x-input type="text" label="Nome" id="productName" name='name' placeholder="Nome do produto"/>         
                </div>
                <x-input type="number" label="Quantidade" id="productStockQuantity" name='stock_quantity' placeholder="00"/>         
            </div>        
            <x-input type="text" label="Descrição" id="productDescription" name='description' placeholder="Digite a descrição"/>  
            
            <div class="flex  justify-between">
                <x-input type="text" label="Valor de comp." id="productPurchasePrice" name='purchase_price' placeholder="Digite o valor"/>  
                <x-input type="text" label="Valor de vend." id="productSalePrice" name='sale_price' placeholder="Digite o valor"/>  
            </div>
            <x-input type="text" label="Categoria" id="productCategory" name='category' placeholder="Digite a categoria"/> 
            
            <label for="loadFile">
                <div class="border-dashed border-2 border-red-400  w-[100%] ">
                    <p class="align-middle text-center"> Click para carregar sua imagem</p>
                    <p class="align-middle text-xs text-center"> Imagem com máximo 5mb </p>
                </div>
                <input type="file" name="image" accept="image/png, image/jpeg" style="display: none">
            </label>
            <div class="mt-6">
                <x-button id="editProdutBtn" text="Salvar Alterações" />
            </div> 
        </form>

        <div class="flex gap-5 mt-3">
            <x-link  id="deleteProdut" text="Deletar produto" style="color: #EF4444" dataId="" />
        </div>
    </x-myModal>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert($error)
            </script>
        @endforeach
    @endif

<script> 
    const modal = document.getElementById("modalNewProdut");
    const modalDetals = document.getElementById("modalDetailsProdut");
    const btn = document.getElementById("btnNewProdut");

    
    btn.onclick = function() {
        modal.style.display = "block";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



    var openModalButtons = document.querySelectorAll('.linkSelector');
    openModalButtons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            const customId = this.getAttribute('data-id');
            const baseUpdateRoute = "{{ route('products.update', ':id') }}";
            const updateRoute = baseUpdateRoute.replace(':id', customId);
            document.getElementById('formEditaction').action = updateRoute


            fetch('/products/' + customId)
            .then(response => response.json())
            .then(product => {
                document.getElementById('productName').value = product.name;
                document.getElementById('productDescription').value = product.description;
                document.getElementById('productPurchasePrice').value = product.purchase_price;
                document.getElementById('productSalePrice').value = product.sale_price;
                document.getElementById('productCategory').value = product.category;
                document.getElementById('productStockQuantity').value = product.stock_quantity;

                modalDetals.style.display='block'

            })
            .catch(error => console.error('Erro ao carregar os dados do produto:', error));
        });
    });


</script>
@endsection
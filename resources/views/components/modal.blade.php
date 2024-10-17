@props(['title', 'id',])

<div id="{{ $id }}" class="fixed z-50 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 backdrop-blur-sm bg-gray-50 bg-opacity-75 transition-opacity" onclick="document.getElementById('{{ $id }}').style.display='none'"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class=" p-5">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900" id="modal-title">{{ $title }}</h2>
                    <span class="text-gray-500 cursor-pointer" onclick="document.getElementById('{{ $id }}').style.display='none'">&times;</span>
                </div>
                <div class="mt-4">
                    {{ $slot }} 
                </div>
            </div>
        </div>
    </div>
</div>



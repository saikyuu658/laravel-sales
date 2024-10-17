
@props(['name','type', 'placeholder', 'id', 'label'])

<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-2" for="{{$id}}">{{$label}}</label>
    <input type="{{$type}}" name="{{$name}}" id="{{$id}}" placeholder="{{$placeholder}}" class="w-full px-4 py-2 text-gray-600 border rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-500">
</div>

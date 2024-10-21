@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full px-4 py-2 text-gray-600 border rounded-lg focus:outline-none focus:ring-1 focus:ring-gray-500']) !!}>

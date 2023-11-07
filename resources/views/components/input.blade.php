@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => "border-2 border-gray-300 bg-white h-10 px-5 rounded-lg text-sm focus:outline-none w-full"]) !!}>

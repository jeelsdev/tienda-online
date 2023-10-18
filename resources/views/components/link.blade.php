@props(['href'=>'#'])

<a href="{{ $href }}" {{ $attributes->merge(["class"=>"text-blue-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none mr-2  cursor-pointer"]) }}>
    {{ $slot }}
</a>
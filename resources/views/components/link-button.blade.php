@props(['href'=>"#"])

<a href="{{ $href }}" {{ $attributes->merge(["class"=>"bg-green-600 text-white active:bg-green-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md hover:bg-green-800 outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"]) }}>
    {{ $slot }}
</a>

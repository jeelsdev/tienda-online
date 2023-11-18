@props(['rows'=>'4'])

<textarea rows="{{ $rows }}" {{ $attributes->merge(["class"=>"resize-none rounded-md w-full"]) }}>
    {{ $slot}}
</textarea>

@props(['value'])

<label {{ $attributes->merge(['class' => 'block lowercase  text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>

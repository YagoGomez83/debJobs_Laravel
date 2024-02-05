@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-500 dark:text-gray-300 uppercase mb-2']) }}>
    {{ $value ?? $slot }}
</label>

@props(['value'])

<<<<<<< HEAD
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
=======
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
>>>>>>> 2db7420674c06347d9511964dad536c1e23f3747
    {{ $value ?? $slot }}
</label>

<span
    {{ $attributes->merge(['class' => 'myds-pill ' . ($type ?? 'default')]) }}
    role="status"
    aria-live="polite"
>
    {{ $slot }}
</span>

<div {{ $attributes->merge(['class' => 'myds-modal']) }} role="dialog" aria-modal="true">
    <div class="myds-modal-content">
        {{ $slot }}
    </div>
</div>

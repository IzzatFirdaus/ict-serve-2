<table {{ $attributes->merge(['class' => 'myds-table']) }}>
    <thead>
        {{ $header }}
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>

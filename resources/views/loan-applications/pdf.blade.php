@php
// PDF template for Loan Application - uses translation keys and MYDS tokens
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('messages.pdf.loan_application.title') }} - {{ $application->id }}</title>
    <style>
        /* Minimal printable styles using MYDS tokens (assumes tokens in CSS) */
        body { font-family: Inter, sans-serif; color: var(--txt-default); }
        .header { display:flex; justify-content:space-between; align-items:center; }
        .summary { margin-top:1rem; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:8px; border:1px solid #ddd; }
    </style>
</head>
<body>
    <header class="header">
        <div>
            <h1>{{ __('messages.pdf.loan_application.title') }}</h1>
            <div>{{ __('messages.loan_application.id') }}: {{ $application->id }}</div>
            <div>{{ __('messages.loan_application.date') }}: {{ $application->created_at->format('Y-m-d') }}</div>
        </div>
        <div>
            <span class="myds-pill">{{ __('messages.status.' . $application->status) }}</span>
        </div>
    </header>

    <section class="summary">
        <h2>{{ __('messages.pdf.loan_application.applicant') }}</h2>
        <p>{{ $application->user->name }} ({{ $application->user->email }})</p>
    </section>

    <section class="items">
        <h2>{{ __('messages.loan_application.items') }}</h2>
        <table>
            <thead>
                <tr>
                    <th>{{ __('messages.equipment.name') }}</th>
                    <th>{{ __('messages.loan_application.quantity') }}</th>
                    <th>{{ __('messages.loan_application.notes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($application->items as $item)
                    <tr>
                        <td>{{ $item->equipment->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->notes }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <footer>
        <p>{{ __('messages.pdf.generated_by', ['app' => config('app.name')]) }}</p>
    </footer>
</body>
</html>

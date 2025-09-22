@php
// PDF template for Loan Transaction - uses translation keys and MYDS tokens
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ __('messages.pdf.loan_transaction.title') }} - {{ $transaction->id }}</title>
    <style>
        body { font-family: Inter, sans-serif; color: var(--txt-default); }
        .header { display:flex; justify-content:space-between; align-items:center; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:8px; border:1px solid #ddd; }
    </style>
</head>
<body>
    <header class="header">
        <div>
            <h1>{{ __('messages.pdf.loan_transaction.title') }}</h1>
            <div>{{ __('messages.loan_transaction.id') }}: {{ $transaction->id }}</div>
            <div>{{ __('messages.loan_transaction.date') }}: {{ $transaction->created_at->format('Y-m-d') }}</div>
        </div>
        <div>
            <span class="myds-pill">{{ __('messages.status.' . $transaction->status) }}</span>
        </div>
    </header>

    <section class="summary">
        <h2>{{ __('messages.loan_transaction.details') }}</h2>
        <p>{{ __('messages.loan_transaction.handled_by') }}: {{ $transaction->user->name }}</p>
    </section>

    <section class="items">
        <h2>{{ __('messages.loan_transaction.items') }}</h2>
        <table>
            <thead>
                <tr>
                    <th>{{ __('messages.equipment.name') }}</th>
                    <th>{{ __('messages.loan_transaction.quantity') }}</th>
                    <th>{{ __('messages.loan_transaction.notes') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaction->items as $item)
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

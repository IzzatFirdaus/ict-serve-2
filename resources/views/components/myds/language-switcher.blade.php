<form method="POST" action="{{ route('language.switch') }}" class="mr-2 hidden md:block" aria-label="{{ __('messages.aria.language_dropdown') }}">
    @csrf
    <label for="lang-select" class="sr-only">{{ __('messages.language.select') }}</label>
    <select
        id="lang-select"
        name="language"
        class="focus:ring-primary-300 focus-visible:ring-primary-400 rounded bg-white px-2 py-1 text-sm font-medium text-primary-600 border border-otl-divider transition focus:ring-2 focus:outline-none focus-visible:ring-4"
        aria-label="{{ __('messages.aria.language_dropdown') }}"
        onchange="this.form.submit()"
    >
        <option value="ms" @if(app()->getLocale()==='ms') selected @endif>{{ __('messages.language.ms') }}</option>
        <option value="en" @if(app()->getLocale()==='en') selected @endif>{{ __('messages.language.en') }}</option>
    </select>
</form>

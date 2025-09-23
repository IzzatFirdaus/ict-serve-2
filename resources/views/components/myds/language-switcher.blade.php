<form method="POST" action="{{ route('language.switch') }}" class="myds-lang-switcher">
    @csrf
    <button
        type="submit"
        name="lang"
        value="{{ app()->getLocale() === 'en' ? 'ms' : 'en' }}"
    class="myds-btn-language myds-focus-ring"
        aria-label="{{ app()->getLocale() === 'en' ? 'Tukar Bahasa' : 'Switch Language' }}"
    >
        {{ app()->getLocale() === 'en' ? 'BM' : 'EN' }}
    </button>
</form>

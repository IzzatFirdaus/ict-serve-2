<form method="POST" action="{{ route('language.switch') }}" class="mr-2 hidden md:block">
    @csrf
    <button
        type="submit"
        name="lang"
        value="{{ app()->getLocale() === 'en' ? 'ms' : 'en' }}"
        class="hover:bg-primary-50 text-primary-600 focus:ring-primary-300 focus-visible:ring-primary-400 rounded bg-white px-2 py-1 text-sm font-medium transition focus:ring-2 focus:outline-none focus-visible:ring-4"
        aria-label="{{ app()->getLocale() === 'en' ? 'Tukar Bahasa' : 'Switch Language' }}"
    >
        {{ app()->getLocale() === 'en' ? 'BM' : 'EN' }}
    </button>
</form>

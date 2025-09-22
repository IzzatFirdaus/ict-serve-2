<form method="POST" action="{{ route('language.switch') }}" class="mr-2 hidden md:block">
    @csrf
    <button
        type="submit"
        name="lang"
        value="{{ app()->getLocale() === 'en' ? 'ms' : 'en' }}"
        class="text-sm font-medium px-2 py-1 rounded bg-white hover:bg-primary-50 text-primary-600 focus:outline-none focus:ring-2 focus:ring-primary-300 transition focus-visible:ring-4 focus-visible:ring-primary-400"
        aria-label="{{ app()->getLocale() === 'en' ? 'Tukar Bahasa' : 'Switch Language' }}"
    >
        {{ app()->getLocale() === 'en' ? 'BM' : 'EN' }}
    </button>
</form>

{{--
    ICTServe (iServe) Welcome Page
    - Compliant with MYDS (Malaysia Government Design System) & 18 Prinsip MyGovEA
    - Responsive 12-8-4 grid, ARIA/keyboard accessible, bilingual-ready
    - Uses MYDS tokens for colour, spacing, typography, iconography
    - Branding: MOTAC, BPM, ICTServe (iServe)
--}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ __('messages.meta.title') }}</title>
        <meta name="description" content="{{ __('messages.meta.description') }}" />

        <!-- MYDS & Tailwind CSS, compiled via resources/css/app.css -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;700&display=swap"
            rel="stylesheet"
        />

        <!-- Bootstrap Icons CDN for UI icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        />
        <!-- FontAwesome CDN for social icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    </head>
    <body class="bg-washed text-black-900 flex min-h-screen flex-col font-sans antialiased">
        <!-- Skip to main content for accessibility (MYDS) -->
        <a href="#main-content" class="skip-link">{{ __('messages.aria.skip_to_content') }}</a>
        <!-- Header -->
        <header class="border-otl-divider sticky top-0 z-40 w-full border-b bg-white shadow-md">
            <div class="mx-auto flex max-w-screen-xl items-center justify-between px-4 py-3">
                <div class="flex items-center gap-3">
                    <!-- MOTAC Logo JPEG (MYDS: height 40px, width auto, alt text) -->
                    <img
                        src="{{ asset('images/motac-logo.jpeg') }}"
                        alt="{{ __('messages.meta.title') }}"
                        class="h-10 w-auto"
                        style="height: 40px; width: auto; max-width: 160px; object-fit: contain"
                    />
                    <span
                        class="font-poppins text-primary-600 ml-2 text-xl font-bold tracking-wide"
                    >
                        ICTServe
                        <span class="text-black-700 font-normal">(iServe)</span>
                    </span>
                </div>
                <nav
                    class="flex flex-1 items-center justify-end gap-6"
                    aria-label="{{ __('messages.aria.main_navigation') }}"
                >
                    <x-myds.language-switcher />
                    <x-myds.theme-switcher />
                    <a href="{{ route('login') }}" class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none">
                        <x-bi-person-circle class="text-primary-600 h-6 w-6 flex-shrink-0" aria-label="{{ __('messages.nav.login') }}" />
                        {{ __('messages.nav.login') }}
                    </a>
                    <a href="#about" class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none">
                        <x-bi-info-circle class="text-primary-600 h-6 w-6 flex-shrink-0" aria-label="{{ __('messages.nav.about') }}" />
                        {{ __('messages.nav.about') }}
                    </a>
                    <a href="#contact" class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none">
                        <x-bi-telephone class="text-primary-600 h-6 w-6 flex-shrink-0" aria-label="{{ __('messages.nav.contact') }}" />
                        {{ __('messages.nav.contact') }}
                    </a>
                </nav>
            </div>
        </header>

        <!-- Phase Banner (optional) -->
        <div
            class="bg-warning-50 border-warning-200 text-warning-700 border-b py-2 text-center text-xs font-medium"
            role="status"
        >
            <span class="bg-warning-200 text-warning-900 mr-2 inline-block rounded px-2 py-1">
                <x-bi-exclamation-triangle class="mr-1 h-4 w-4 flex-shrink-0 align-middle" aria-label="{{ __('messages.phase.beta') }}" style="display: inline" />
                {{ __('messages.phase.beta') }}
            </span>
            {{ __('messages.phase.testing_notice') }}
            <a href="#feedback" class="underline">{{ __('messages.phase.feedback') }}</a>
        </div>

        <!-- Language Switch Feedback Toast/Callout (MYDS) -->
        @if (session('status'))
            <div class="mx-auto mt-4 w-full max-w-md">
                <div
                    class="bg-success-50 border-success-200 text-success-800 shadow-card border-l-4 border px-4 py-3 rounded flex items-center gap-3"
                    role="status"
                    aria-live="polite"
                >
                    <x-bi-translate class="text-success-600 text-xl" />
                    <span class="font-medium">{{ session('status') }}</span>
                </div>
            </div>
        @endif

        <!-- Main Content -->
        <main
            id="main-content"
            tabindex="-1"
            class="bg-washed flex flex-1 flex-col items-center justify-center px-4 py-8"
        >
            <!-- Hero Section -->
            <section class="mx-auto mb-12 w-full max-w-4xl text-center">
                <h1
                    class="font-poppins text-primary-600 mb-4 text-4xl font-bold drop-shadow sm:text-5xl"
                    style="letter-spacing: -1px"
                >
                    {{ __('messages.hero.title') }}
                    <span class="text-black-700 font-normal">(iServe)</span>
                </h1>
                <p class="text-black-700 mb-4 text-lg font-medium sm:text-xl">
                    {{ __('messages.hero.subtitle') }}
                </p>
                <p class="mb-8 text-base text-gray-600 sm:text-lg">
                    {{ __('messages.hero.description') }}
                </p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a
                        href="{{ route('login') }}"
                        class="bg-primary-600 shadow-button hover:bg-primary-700 focus-visible:ring-primary-400 easeoutback-short inline-flex items-center justify-center rounded-lg px-6 py-3 text-base font-semibold text-white transition focus:outline-none focus-visible:ring-2"
                    >
                        <x-bi-arrow-right class="mr-2 -ml-1 h-5 w-5 flex-shrink-0" aria-label="{{ __('messages.nav.login') }}" />
                        {{ __('messages.nav.login') }}
                    </a>
                    <a
                        href="#panduan"
                        class="border-primary-300 text-primary-600 shadow-button hover:bg-primary-50 focus-visible:ring-primary-400 easeoutback-short inline-flex items-center justify-center rounded-lg border bg-white px-6 py-3 text-base font-semibold transition focus:outline-none focus-visible:ring-2"
                    >
                        <x-bi-book class="mr-2 -ml-1 h-5 w-5 flex-shrink-0" aria-label="{{ __('messages.hero.guide') }}" />
                        {{ __('messages.hero.guide') }}
                    </a>
                </div>
            </section>

            <!-- Quick Info Cards -->
            <section
                class="mb-10 grid w-full max-w-5xl grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3"
            >
                <!-- ICT Loan Card -->
                <div
                    class="shadow-card border-otl-divider flex flex-col items-center rounded-xl border bg-white p-6 text-center"
                >
                    <x-bi-folder class="text-primary-600 mx-auto mb-3 h-10 w-10" aria-label="{{ __('messages.cards.loan.icon') }}" />
                    <h2 class="font-poppins text-primary-700 mb-2 text-lg font-semibold">
                        {{ __('messages.cards.loan.title') }}
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        {{ __('messages.cards.loan.description') }}
                    </p>
                    <a
                        href="#loan-info"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        {{ __('messages.cards.loan.more') }}
                        <x-bi-chevron-right class="ml-1 h-4 w-4" aria-label="{{ __('messages.cards.loan.more') }}" />
                    </a>
                </div>

                <!-- Helpdesk Card -->
                <div
                    class="shadow-card border-otl-divider flex flex-col items-center rounded-xl border bg-white p-6 text-center"
                >
                    <x-bi-chat-dots class="text-success-600 mx-auto mb-3 h-10 w-10" aria-label="{{ __('messages.cards.helpdesk.icon') }}" />
                    <h2 class="font-poppins text-success-700 mb-2 text-lg font-semibold">
                        {{ __('messages.cards.helpdesk.title') }}
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        {{ __('messages.cards.helpdesk.description') }}
                    </p>
                    <a
                        href="#helpdesk-info"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        {{ __('messages.cards.helpdesk.more') }}
                        <x-bi-chevron-right class="ml-1 h-4 w-4" aria-label="{{ __('messages.cards.helpdesk.more') }}" />
                    </a>
                </div>

                <!-- Compliance Card -->
                <div
                    class="shadow-card border-otl-divider flex flex-col items-center rounded-xl border bg-white p-6 text-center"
                >
                    <x-bi-shield-check class="text-warning-600 mx-auto mb-3 h-10 w-10" aria-label="{{ __('messages.cards.compliance.icon') }}" />
                    <h2 class="font-poppins text-warning-700 mb-2 text-lg font-semibold">
                        {{ __('messages.cards.compliance.title') }}
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        {{ __('messages.cards.compliance.description') }}
                    </p>
                    <a
                        href="#compliance"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        {{ __('messages.cards.compliance.more') }}
                        <x-bi-chevron-right class="ml-1 h-4 w-4 flex-shrink-0" aria-label="{{ __('messages.cards.compliance.more') }}" />
                    </a>
                </div>
            </section>

            <!-- How It Works / Manfaat Section -->
            <section id="how-it-works" class="mx-auto mb-10 w-full max-w-4xl">
                <h2 class="font-poppins text-primary-700 mb-6 text-center text-2xl font-semibold">
                    {{ __('messages.howitworks.title') }}
                </h2>
                <ol class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2 lg:grid-cols-4">
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <x-bi-journal class="text-primary-600 icon-myds mx-auto mb-2 h-8 w-8" aria-label="{{ __('messages.howitworks.step1.icon') }}" />
                        <span class="text-black-900 font-medium">
                            {{ __('messages.howitworks.step1.title') }}
                        </span>
                        <span class="text-black-700 mt-1 text-xs">
                            {{ __('messages.howitworks.step1.description') }}
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <x-bi-patch-check class="text-success-600 icon-myds mx-auto mb-2 h-8 w-8" aria-label="{{ __('messages.howitworks.step2.icon') }}" />
                        <span class="text-black-900 font-medium">
                            {{ __('messages.howitworks.step2.title') }}
                        </span>
                        <span class="text-black-700 mt-1 text-xs">
                            {{ __('messages.howitworks.step2.description') }}
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <x-bi-folder class="text-warning-600 icon-myds mx-auto mb-2 h-8 w-8" aria-label="{{ __('messages.howitworks.step3.icon') }}" />
                        <span class="text-black-900 font-medium">
                            {{ __('messages.howitworks.step3.title') }}
                        </span>
                        <span class="text-black-700 mt-1 text-xs">
                            {{ __('messages.howitworks.step3.description') }}
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <x-bi-list class="text-primary-700 icon-myds mx-auto mb-2 h-8 w-8" aria-label="{{ __('messages.howitworks.step4.icon') }}" />
                        <span class="text-black-900 font-medium">
                            {{ __('messages.howitworks.step4.title') }}
                        </span>
                        <span class="text-black-700 mt-1 text-xs">
                            {{ __('messages.howitworks.step4.description') }}
                        </span>
                    </li>
                </ol>
            </section>
        </main>

        <!-- Footer -->
        <footer class="border-otl-divider mt-auto border-t bg-white py-4">
            <div
                class="mx-auto flex max-w-screen-xl flex-col items-center justify-between gap-4 px-4 md:flex-row"
            >
                <div class="flex items-center gap-2">
                    <img
                        src="{{ asset('images/bpm-logo.png') }}"
                        alt="{{ __('messages.footer.bpm_logo_alt') }}"
                        class="h-10 w-auto"
                        style="height: 40px; width: auto; max-width: 160px; object-fit: contain"
                    />
                    <span class="text-black-700 text-xs">{{ __('messages.footer.bpm') }}</span>
                </div>
                <div class="text-center text-xs text-gray-500">
                    &copy;
                    <span id="year"></span>
                    {{ __('messages.footer.copyright') }}
                </div>
                <div class="footer-social flex gap-3">
                    <a href="https://facebook.com/motacmalaysia" aria-label="Facebook" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none">
                        <x-bi-facebook class="h-6 w-6" aria-label="Facebook" />
                    </a>
                    <a href="https://x.com/motacmalaysia" aria-label="X (Twitter)" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none">
                        <x-bi-twitter-x class="h-6 w-6" aria-label="X (Twitter)" />
                    </a>
                    <a href="https://instagram.com/motacmalaysia" aria-label="Instagram" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none">
                        <x-bi-instagram class="h-6 w-6" aria-label="Instagram" />
                    </a>
                    <a href="https://youtube.com/motacmalaysia" aria-label="YouTube" target="_blank" rel="noopener" class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none">
                        <x-bi-youtube class="h-6 w-6" aria-label="YouTube" />
                    </a>
                </div>
            </div>
            <div
                class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-center gap-4 px-4 pt-2 text-xs"
            >
                <a
                    href="#privacy"
                    class="focus:ring-primary-300 text-gray-500 hover:underline focus:ring-2 focus:outline-none"
                >
                    {{ __('messages.footer.privacy') }}
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#terms"
                    class="focus:ring-primary-300 text-gray-500 hover:underline focus:ring-2 focus:outline-none"
                >
                    {{ __('messages.footer.terms') }}
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#accessibility"
                    class="focus:ring-primary-300 text-gray-500 hover:underline focus:ring-2 focus:outline-none"
                >
                    {{ __('messages.footer.accessibility') }}
                </a>
            </div>
        </footer>

        <!-- App JS handled by Vite -->
        {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    </body>
</html>

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

        <!-- MYDS CSS compiled via resources/sass/app.scss -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@500;700&display=swap"
            rel="stylesheet"
        />

        <!-- Prefer local MYDS SVG icons; fallback to FontAwesome already included -->
        <!-- FontAwesome CDN for social icons -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        @if(isset($currentTheme))
            <script>document.documentElement.setAttribute('data-theme', '{{ e($currentTheme) }}');</script>
        @endif
    </head>
    <body class="myds-text--primary font-body antialiased myds-layout-fullscreen">
        <!-- Skip to main content for accessibility (MYDS) -->
    <a href="#main-content" class="myds-skip-link" tabindex="0">{{ __('messages.aria.skip_to_content') }}</a>
        {{-- MYDS: Skip link per MYDS-Design-Overview.md and MYDS-Develop-Overview.md (see Accessibility & Skiplink sections) --}}
        <!-- Header -->
        <header class="w-full myds-nav sticky top-0 z-40">
            <div class="myds-container flex items-center justify-between py-3">
                <div class="flex items-center gap-3">
                    <!-- MOTAC Logo JPEG (MYDS: height 40px, max-width 160px, auto aspect) -->
                    <img
                        src="{{ asset('images/motac-logo.jpeg') }}"
                        alt="MOTAC Logo"
                        class="myds-logo"
                        style="height:40px;max-width:160px;width:auto;object-fit:contain;"
                    />
                    <span class="ml-2 myds-heading-xs myds-brand tracking-wide">
                        {{ __('messages.meta.title') }}
                        <span class="font-normal myds-text--secondary">(iServe)</span>
                    </span>
                </div>
                <nav class="flex-1 flex items-center justify-end gap-6" aria-label="Navigasi utama">
                    {{-- MYDS Language Switcher (select variant for tests) --}}
                    <livewire:shared.language-switcher />
                    {{-- MYDS Theme Switcher (select variant for tests) --}}
                    <livewire:shared.theme-switcher />
                    <a
                        href="{{ route('login') }}"
                        class="myds-nav-link myds-body-sm font-medium hover:underline myds-focus-ring flex items-center gap-1"
                        aria-label="{{ __('messages.auth.login.title') }}"
                    >
                        <i class="fa-solid fa-user-circle myds-text--primary myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true" role="img"></i>
                        {{ __('messages.actions.login') }}
                    </a>
                    <a
                        href="#about"
                        class="myds-nav-link"
                        aria-label="{{ __('messages.nav.about') }}"
                    >
                            <i class="fa-solid fa-circle-info myds-text--primary myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true" role="img"></i>
                        {{ __('messages.nav.about') }}
                    </a>
                    <a
                        href="#contact"
                        class="myds-nav-link"
                        aria-label="{{ __('messages.nav.contact') }}"
                    >
                            <i class="fa-solid fa-phone myds-text--primary myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true" role="img"></i>
                        {{ __('messages.nav.contact') }}
                    </a>
                </nav>
            </div>
        </header>

        <!-- Phase Banner (optional) -->
        <div
            class="bg-warning-50 py-2 border-b border-warning-200 text-warning-700 text-center text-xs font-medium"
            role="status"
        >
            <span class="inline-block bg-warning-200 text-warning-900 rounded px-2 py-1 mr-2">
                <i class="fa-solid fa-triangle-exclamation myds-text--warning myds-icon myds-icon--md" aria-hidden="true" role="img"></i>
                {{ __('messages.phase.beta') }}
            </span>
            {{ __('messages.phase.testing_notice') }}
            <a href="#feedback" class="underline">{{ __('messages.phase.feedback') }}</a>
        </div>

        <!-- Main Content -->
        <main
            id="main-content"
            tabindex="-1"
            class="flex-1 flex flex-col items-center justify-center px-4 py-8"
        >
        {{-- MYDS: Main content landmark for skip link focus target (see MYDS-Design-Overview.md) --}}
            <!-- Hero Section -->
            <section class="w-full max-w-4xl mx-auto text-center mb-12">
                <h1 class="myds-heading-lg myds-text--primary mb-4 drop-shadow myds-letter-spacing-tight">
                    {{ __('messages.hero.title') }}
                    <span class="font-normal myds-text--secondary">(iServe)</span>
                </h1>
                <p class="myds-body-xl myds-text--primary mb-4 font-medium">
                    {{ __('messages.hero.subtitle') }}
                </p>
                <p class="myds-body-lg myds-text--muted mb-8">
                    {{ __('messages.hero.description') }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a
                        href="/login"
                        class="myds-btn myds-btn--primary myds-focus-ring text-base"
                        aria-label="{{ __('messages.actions.login') }}"
                    >
                        <i class="fa-solid fa-arrow-right myds-icon myds-icon--md mr-2" aria-hidden="true" role="img"></i>
                        {{ __('messages.actions.login') }}
                    </a>
                    <a
                        href="#panduan"
                        class="myds-btn myds-btn--secondary myds-focus-ring text-base"
                        aria-label="{{ __('messages.hero.guide') }}"
                    >
                        <i class="fa-solid fa-book myds-icon myds-icon--md mr-2" aria-hidden="true" role="img"></i>
                        {{ __('messages.hero.guide') }}
                    </a>
                </div>
            </section>

            <!-- Quick Info Cards -->
            <section class="w-full myds-container">
                <div class="myds-grid mb-10">
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card--hover h-full">
                            <i class="fa-solid fa-folder myds-text--primary myds-icon myds-icon--lg" aria-hidden="true" role="img" aria-label="Pinjaman ICT"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text--primary mb-2">
                                {{ __('messages.cards.loan.title') }}
                            </h2>
                            <p class="myds-body-sm myds-text--secondary mb-4">
                                {{ __('messages.cards.loan.description') }}
                            </p>
                            <a
                                href="#loan-info"
                                class="myds-btn--link myds-focus-ring"
                                aria-label="{{ __('messages.cards.loan.more') }}"
                            >
                                {{ __('messages.cards.loan.more') }}
                                <i class="fa-solid fa-chevron-right myds-icon myds-icon--md" aria-hidden="true" role="img"></i>
                            </a>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <!-- Helpdesk Card -->
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                            <i class="fa-solid fa-comments myds-text--success myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Helpdesk ICT"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text--success mb-2">
                                {{ __('messages.cards.helpdesk.title') }}
                            </h2>
                            <p class="myds-body-sm myds-text--muted mb-4">
                                {{ __('messages.cards.helpdesk.description') }}
                            </p>
                            <a
                                href="#helpdesk-info"
                                class="myds-btn--link myds-focus-ring"
                                aria-label="{{ __('messages.cards.helpdesk.more') }}"
                            >
                                {{ __('messages.cards.helpdesk.more') }}
                                <i class="fa-solid fa-chevron-right myds-icon myds-icon--md ml-1" aria-hidden="true" role="img"></i>
                            </a>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <!-- Compliance Card -->
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                                <i class="fa-solid fa-shield-check myds-text--warning myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Pematuhan MYDS &amp; MyGovEA"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text--warning mb-2">
                                {{ __('messages.cards.compliance.title') }}
                            </h2>
                            <p class="myds-body-sm myds-text--muted mb-4">
                                {{ __('messages.cards.compliance.description') }}
                            </p>
                            <a
                                href="#compliance"
                                class="myds-btn--link myds-focus-ring"
                                aria-label="{{ __('messages.cards.compliance.more') }}"
                            >
                                {{ __('messages.cards.compliance.more') }}
                                <i class="fa-solid fa-chevron-right myds-icon myds-icon--md ml-1 flex-shrink-0" aria-hidden="true" role="img"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works / Manfaat Section -->
            <section id="how-it-works" class="w-full myds-container mb-10">
                <h2 class="myds-heading-sm myds-text--primary mb-6 text-center">
                    {{ __('messages.howitworks.title') }}
                </h2>
                <div class="myds-grid">
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                                <i class="fa-solid fa-book-open myds-text--primary myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Isi Borang"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                                <span class="myds-body-md font-medium myds-text--primary">{{ __('messages.howitworks.step1.title') }}</span>
                                <span class="myds-body-xs myds-text--muted mt-1">
                                    {{ __('messages.howitworks.step1.description') }}
                                </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                                <i class="fa-solid fa-badge-check myds-text--success myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Kelulusan / Tindakan"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                                <span class="myds-body-md font-medium myds-text--primary">{{ __('messages.howitworks.step2.title') }}</span>
                                <span class="myds-body-xs myds-text--muted mt-1">
                                    {{ __('messages.howitworks.step2.description') }}
                                </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                                <i class="fa-solid fa-box-archive myds-text--warning myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Ambil / Pulang Peralatan"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                                <span class="myds-body-md font-medium myds-text--primary">{{ __('messages.howitworks.step3.title') }}</span>
                                <span class="myds-body-xs myds-text--muted mt-1">
                                    {{ __('messages.howitworks.step3.description') }}
                                </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card__body flex flex-col items-center text-center">
                                <i class="fa-solid fa-list myds-text--primary myds-icon myds-icon--lg mx-auto" aria-hidden="true" role="img" aria-label="Jejak Status"></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                                <span class="myds-body-md font-medium myds-text--primary">{{ __('messages.howitworks.step4.title') }}</span>
                                <span class="myds-body-xs myds-text--muted mt-1">
                                    {{ __('messages.howitworks.step4.description') }}
                                </span>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="myds-footer mt-auto py-4">
            <div class="myds-container myds-footer-layout">
                <div class="myds-footer-brand">
                    <img
                        src="{{ asset('images/bpm-logo.png') }}"
                        alt="{{ __('messages.footer.bpm_logo_alt') }}"
                        class="myds-logo"
                        style="height:40px;max-width:160px;width:auto;object-fit:contain;"
                    />
                    <span class="myds-body-xs myds-text--muted">{{ __('messages.footer.bpm') }}</span>
                </div>
                <div class="myds-body-xs myds-text--muted myds-footer-copyright">
                    &copy;
                    <span id="year"></span>
                    {{ __('messages.footer.copyright') }}
                </div>
                <div class="myds-footer-social">
                    <a
                        href="https://facebook.com/motacmalaysia"
                        aria-label="Facebook"
                        target="_blank"
                        rel="noopener"
                        class="myds-social-link"
                    >
                        <i class="fab fa-facebook myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true"></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                    </a>
                    <a
                        href="https://x.com/motacmalaysia"
                        aria-label="X (Twitter)"
                        target="_blank"
                        rel="noopener"
                        class="myds-social-link"
                    >
                        <i class="fab fa-x-twitter myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true"></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                    </a>
                    <a
                        href="https://instagram.com/motacmalaysia"
                        aria-label="Instagram"
                        target="_blank"
                        rel="noopener"
                        class="myds-social-link"
                    >
                        <i class="fab fa-instagram myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true"></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                    </a>
                    <a
                        href="https://youtube.com/motacmalaysia"
                        aria-label="YouTube"
                        target="_blank"
                        rel="noopener"
                        class="myds-social-link"
                    >
                        <i class="fab fa-youtube myds-icon myds-icon--md" style="width:20px;height:20px;" aria-hidden="true"></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                    </a>
                </div>
            </div>
            <div class="myds-container myds-footer-links">
                <a href="#privacy" class="myds-footer-link">{{ __('messages.footer.privacy') }}</a>
                <span class="myds-text--muted">|</span>
                <a href="#terms" class="myds-footer-link">{{ __('messages.footer.terms') }}</a>
                <span class="myds-text--muted">|</span>
                <a href="#accessibility" class="myds-footer-link">{{ __('messages.footer.accessibility') }}</a>
            </div>
        </footer>

        <!-- App JS handled by Vite -->
        {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    </body>
</html>

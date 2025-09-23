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
        <title>ICTServe (iServe) – Sistem Pengurusan Perkhidmatan ICT MOTAC</title>
        <meta
            name="description"
            content="Platform rasmi pinjaman peralatan dan helpdesk ICT MOTAC."
        />

        <!-- MYDS CSS compiled via resources/sass/app.scss -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
    <body class="myds-text-primary font-body antialiased myds-layout-fullscreen">
        <!-- Skip to main content for accessibility (MYDS) -->
    <a href="#main-content" class="myds-skip-link" tabindex="0">Langkau ke kandungan utama</a>
    {{-- MYDS: Skip link per MYDS-Design-Overview.md and MYDS-Develop-Overview.md (see Accessibility & Skiplink sections) --}}
        <!-- Header -->
        <header class="w-full myds-nav sticky top-0 z-40">
            <div class="myds-container flex items-center justify-between py-3">
                <div class="flex items-center gap-3">
                    <!-- MOTAC Logo JPEG (MYDS: height 40px, max-width 160px, auto aspect) -->
                    <img
                        src="{{ asset('images/motac-logo.jpeg') }}"
                        alt="Logo MOTAC"
                        class="myds-logo"
                        style="height:40px;max-width:160px;width:auto;object-fit:contain;"
                        {{-- MYDS: Logo sizing per MYDS-Design-Overview.md §Logo, MYDS-Develop-Overview.md §Logo, MyGovEA Prinsip 7 (Kebolehcapaian) --}}
                    />
                    <span class="ml-2 myds-heading-xs myds-brand tracking-wide">
                        ICTServe
                        <span class="font-normal myds-text-secondary">(iServe)</span>
                    </span>
                </div>
                <nav class="flex-1 flex items-center justify-end gap-6" aria-label="Navigasi utama">
                    <x-myds.language-switcher />
                    <a
                        href="{{ route('login') }}"
                        class="myds-nav-link myds-body-sm font-medium hover:underline myds-focus-ring flex items-center gap-1"
                    >
                        <!-- Bootstrap Icons person-circle -->
                        <i
                            class="bi bi-person-circle myds-text-primary myds-icon myds-icon--md"
                            style="width:20px;height:20px;"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md §Sizes, MYDS-Develop-Overview.md §Icon, MyGovEA Prinsip 7 (Kebolehcapaian) --}}
                        Log Masuk
                    </a>
                    <a
                        href="#about"
                        class="myds-nav-link"
                    >
                        <!-- Bootstrap Icons info-circle -->
                        <i
                            class="bi bi-info-circle myds-text-primary myds-icon myds-icon--md"
                            style="width:20px;height:20px;"
                            aria-hidden="true"
                            role="img"
                            aria-label="Tentang"
                        ></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                        Tentang
                    </a>
                    <a
                        href="#contact"
                        class="myds-nav-link"
                    >
                        <!-- Bootstrap Icons telephone -->
                        <i
                            class="bi bi-telephone myds-text-primary myds-icon myds-icon--md"
                            style="width:20px;height:20px;"
                            aria-hidden="true"
                            role="img"
                            aria-label="Hubungi"
                        ></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md, MYDS-Develop-Overview.md (Icon: 20x20px for medium) --}}
                        Hubungi
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
                <!-- Bootstrap Icons exclamation-triangle -->
                <i
                    class="bi bi-exclamation-triangle myds-text-warning myds-icon myds-icon--md"
                    aria-hidden="true"
                    role="img"
                    aria-label="Beta"
                ></i>
                {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                Beta
            </span>
            Platform ini dalam fasa pengujian. Sila laporkan isu ke BPM.
            <a href="#feedback" class="underline">Beri maklum balas</a>
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
                <h1 class="myds-heading-lg myds-text-primary mb-4 drop-shadow myds-letter-spacing-tight">
                    Selamat Datang ke ICTServe
                    <span class="font-normal myds-text-secondary">(iServe)</span>
                </h1>
                <p class="myds-body-xl myds-text-primary mb-4 font-medium">
                    Pusat Pengurusan Pinjaman &amp; Sokongan ICT MOTAC
                </p>
                <p class="myds-body-lg myds-text-muted mb-8">
                    Semua permohonan pinjaman peralatan ICT dan aduan kerosakan kini dalam satu
                    sistem digital – mesra rakyat, telus, dan pantas.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a
                        href="{{ route('login') }}"
                        class="myds-btn myds-btn-primary myds-focus-ring text-base"
                    >
                        <!-- Bootstrap Icons arrow-right -->
                        <i
                            class="bi bi-arrow-right myds-icon myds-icon--md mr-2"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                        Log Masuk
                    </a>
                    <a
                        href="#panduan"
                        class="myds-btn myds-btn-secondary myds-focus-ring text-base"
                    >
                        <!-- Bootstrap Icons book -->
                        <i
                            class="bi bi-book myds-icon myds-icon--md mr-2"
                            aria-hidden="true"
                            role="img"
                            aria-label="Panduan Pengguna"
                        ></i>
                        {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                        Panduan Pengguna
                    </a>
                </div>
            </section>

            <!-- Quick Info Cards -->
            <section class="w-full myds-container">
                <div class="myds-grid mb-10">
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card--hover h-full">
                            <i
                                class="bi bi-folder myds-text-primary myds-icon myds-icon--lg"
                                aria-hidden="true"
                                role="img"
                                aria-label="Pinjaman ICT"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text-primary mb-2">
                                Pinjaman ICT
                            </h2>
                            <p class="myds-body-sm myds-text-secondary mb-4">
                                Permohonan pinjaman laptop, projektor, dan peralatan ICT secara digital dan
                                telus.
                            </p>
                            <a
                                href="#loan-info"
                                class="myds-btn-link myds-focus-ring"
                            >
                                Maklumat Lanjut
                                <i
                                    class="bi bi-chevron-right myds-icon myds-icon--md"
                                    aria-hidden="true"
                                    role="img"
                                    aria-label="Maklumat Lanjut"
                                ></i>
                                {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            </a>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <!-- Helpdesk Card -->
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-chat-dots myds-text-success myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Helpdesk ICT"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text-success mb-2">
                                Helpdesk ICT
                            </h2>
                            <p class="myds-body-sm myds-text-muted mb-4">
                                Lapor masalah ICT, pantau status tiket dan terima bantuan profesional BPM.
                            </p>
                            <a
                                href="#helpdesk-info"
                                class="myds-btn-link myds-focus-ring"
                            >
                                Maklumat Lanjut
                                <i
                                    class="bi bi-chevron-right myds-icon myds-icon--md ml-1"
                                    aria-hidden="true"
                                    role="img"
                                    aria-label="Maklumat Lanjut"
                                ></i>
                                {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            </a>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                        <!-- Compliance Card -->
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-shield-check myds-text-warning myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Pematuhan MYDS &amp; MyGovEA"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <h2 class="myds-heading-3xs myds-text-warning mb-2">
                                Pematuhan MYDS &amp; MyGovEA
                            </h2>
                            <p class="myds-body-sm myds-text-muted mb-4">
                                Reka bentuk mematuhi piawaian Malaysia Government Design System &amp; 18
                                Prinsip MyGovEA.
                            </p>
                            <a
                                href="#compliance"
                                class="myds-btn-link myds-focus-ring"
                            >
                                Ketahui Lagi
                                <i
                                    class="bi bi-chevron-right myds-icon myds-icon--md ml-1 flex-shrink-0"
                                    aria-hidden="true"
                                    role="img"
                                    aria-label="Ketahui Lagi"
                                ></i>
                                {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works / Manfaat Section -->
            <section id="how-it-works" class="w-full myds-container mb-10">
                <h2 class="myds-heading-sm myds-text-primary mb-6 text-center">
                    Bagaimana ICTServe Berfungsi
                </h2>
                <div class="myds-grid">
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-journal myds-text-primary myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Isi Borang"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <span class="myds-body-md font-medium myds-text-primary">Isi Borang</span>
                            <span class="myds-body-xs myds-text-muted mt-1">
                                Permohonan pinjaman atau aduan ICT secara digital
                            </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-patch-check myds-text-success myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Kelulusan / Tindakan"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <span class="myds-body-md font-medium myds-text-primary">Kelulusan / Tindakan</span>
                            <span class="myds-body-xs myds-text-muted mt-1">
                                Permohonan disemak &amp; diluluskan pegawai
                            </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-folder myds-text-warning myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Ambil / Pulang Peralatan"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <span class="myds-body-md font-medium myds-text-primary">Ambil / Pulang Peralatan</span>
                            <span class="myds-body-xs myds-text-muted mt-1">
                                Urusan fizikal di BPM dengan rekod digital
                            </span>
                        </div>
                    </div>
                    <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                        <div class="myds-card myds-card-body flex flex-col items-center text-center">
                            <i
                                class="bi bi-list myds-text-primary myds-icon myds-icon--lg mx-auto"
                                aria-hidden="true"
                                role="img"
                                aria-label="Jejak Status"
                            ></i>
                            {{-- MYDS: Icon sizing per MYDS-Icons-Overview.md --}}
                            <span class="myds-body-md font-medium myds-text-primary">Jejak Status</span>
                            <span class="myds-body-xs myds-text-muted mt-1">
                                Pantau status permohonan &amp; tiket secara masa nyata
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
                        alt="Logo BPM"
                        class="myds-logo"
                        style="height:40px;max-width:160px;width:auto;object-fit:contain;"
                        {{-- MYDS: Logo sizing per MYDS-Design-Overview.md, MYDS-Develop-Overview.md (Logo: 40px height, max 160px width, auto aspect) --}}
                    />
                    {{-- MYDS: Logo sizing per MYDS-Design-Overview.md --}}
                    <span class="myds-body-xs myds-text-muted">Bahagian Pengurusan Maklumat (BPM)</span>
                </div>
                <div class="myds-body-xs myds-text-muted myds-footer-copyright">
                    &copy;
                    <span id="year"></span>
                    Hakcipta Terpelihara, Kementerian Pelancongan, Seni dan Budaya Malaysia
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
                <a
                    href="#privacy"
                    class="myds-footer-link"
                >
                    Dasar Privasi
                </a>
                <span class="myds-text-muted">|</span>
                <a
                    href="#terms"
                    class="myds-footer-link"
                >
                    Terma Penggunaan
                </a>
                <span class="myds-text-muted">|</span>
                <a
                    href="#accessibility"
                    class="myds-footer-link"
                >
                    Kenyataan Kebolehcapaian
                </a>
            </div>
        </footer>

        <!-- App JS handled by Vite -->
        {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    </body>
</html>

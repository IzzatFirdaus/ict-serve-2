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
        <a href="#main-content" class="skip-link">Langkau ke kandungan utama</a>
        <!-- Header -->
        <header class="border-otl-divider sticky top-0 z-40 w-full border-b bg-white shadow-md">
            <div class="mx-auto flex max-w-screen-xl items-center justify-between px-4 py-3">
                <div class="flex items-center gap-3">
                    <!-- MOTAC Logo JPEG (MYDS: height 40px, width auto, alt text) -->
                    <img
                        src="{{ asset('images/motac-logo.jpeg') }}"
                        alt="Logo MOTAC"
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
                <nav class="flex flex-1 items-center justify-end gap-6" aria-label="Navigasi utama">
                    <x-myds.language-switcher />
                    <a
                        href="{{ route('login') }}"
                        class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none"
                    >
                        <!-- Bootstrap Icons person-circle -->
                        <i
                            class="bi bi-person-circle text-primary-600 h-6 w-6 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        Log Masuk
                    </a>
                    <a
                        href="#about"
                        class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none"
                    >
                        <!-- Bootstrap Icons info-circle -->
                        <i
                            class="bi bi-info-circle text-primary-600 h-6 w-6 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Tentang"
                        ></i>
                        Tentang
                    </a>
                    <a
                        href="#contact"
                        class="focus:ring-primary-300 flex items-center gap-1 text-sm font-medium hover:underline focus:ring-2 focus:outline-none"
                    >
                        <!-- Bootstrap Icons telephone -->
                        <i
                            class="bi bi-telephone text-primary-600 h-6 w-6 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Hubungi"
                        ></i>
                        Hubungi
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
                <!-- Bootstrap Icons exclamation-triangle -->
                <i
                    class="bi bi-exclamation-triangle mr-1 h-4 w-4 flex-shrink-0 align-middle"
                    aria-hidden="true"
                    role="img"
                    aria-label="Beta"
                    style="display: inline"
                ></i>
                Beta
            </span>
            Platform ini dalam fasa pengujian. Sila laporkan isu ke BPM.
            <a href="#feedback" class="underline">Beri maklum balas</a>
        </div>

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
                    Selamat Datang ke ICTServe
                    <span class="text-black-700 font-normal">(iServe)</span>
                </h1>
                <p class="text-black-700 mb-4 text-lg font-medium sm:text-xl">
                    Pusat Pengurusan Pinjaman &amp; Sokongan ICT MOTAC
                </p>
                <p class="mb-8 text-base text-gray-600 sm:text-lg">
                    Semua permohonan pinjaman peralatan ICT dan aduan kerosakan kini dalam satu
                    sistem digital – mesra rakyat, telus, dan pantas.
                </p>
                <div class="flex flex-col justify-center gap-4 sm:flex-row">
                    <a
                        href="{{ route('login') }}"
                        class="bg-primary-600 shadow-button hover:bg-primary-700 focus-visible:ring-primary-400 easeoutback-short inline-flex items-center justify-center rounded-lg px-6 py-3 text-base font-semibold text-white transition focus:outline-none focus-visible:ring-2"
                    >
                        <!-- Bootstrap Icons arrow-right -->
                        <i
                            class="bi bi-arrow-right mr-2 -ml-1 h-5 w-5 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        Log Masuk
                    </a>
                    <a
                        href="#panduan"
                        class="border-primary-300 text-primary-600 shadow-button hover:bg-primary-50 focus-visible:ring-primary-400 easeoutback-short inline-flex items-center justify-center rounded-lg border bg-white px-6 py-3 text-base font-semibold transition focus:outline-none focus-visible:ring-2"
                    >
                        <!-- Bootstrap Icons book -->
                        <i
                            class="bi bi-book mr-2 -ml-1 h-5 w-5 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Panduan Pengguna"
                        ></i>
                        Panduan Pengguna
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
                    <i
                        class="bi bi-folder text-primary-600 mx-auto mb-3 h-10 w-10"
                        aria-hidden="true"
                        role="img"
                        aria-label="Pinjaman ICT"
                    ></i>
                    <h2 class="font-poppins text-primary-700 mb-2 text-lg font-semibold">
                        Pinjaman ICT
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        Permohonan pinjaman laptop, projektor, dan peralatan ICT secara digital dan
                        telus.
                    </p>
                    <a
                        href="#loan-info"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        Maklumat Lanjut
                        <i
                            class="bi bi-chevron-right ml-1 h-4 w-4"
                            aria-hidden="true"
                            role="img"
                            aria-label="Maklumat Lanjut"
                        ></i>
                    </a>
                </div>

                <!-- Helpdesk Card -->
                <div
                    class="shadow-card border-otl-divider flex flex-col items-center rounded-xl border bg-white p-6 text-center"
                >
                    <i
                        class="bi bi-chat-dots text-success-600 mx-auto mb-3 h-10 w-10"
                        aria-hidden="true"
                        role="img"
                        aria-label="Helpdesk ICT"
                    ></i>
                    <h2 class="font-poppins text-success-700 mb-2 text-lg font-semibold">
                        Helpdesk ICT
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        Lapor masalah ICT, pantau status tiket dan terima bantuan profesional BPM.
                    </p>
                    <a
                        href="#helpdesk-info"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        Maklumat Lanjut
                        <i
                            class="bi bi-chevron-right ml-1 h-4 w-4"
                            aria-hidden="true"
                            role="img"
                            aria-label="Maklumat Lanjut"
                        ></i>
                    </a>
                </div>

                <!-- Compliance Card -->
                <div
                    class="shadow-card border-otl-divider flex flex-col items-center rounded-xl border bg-white p-6 text-center"
                >
                    <i
                        class="bi bi-shield-check text-warning-600 mx-auto mb-3 h-10 w-10"
                        aria-hidden="true"
                        role="img"
                        aria-label="Pematuhan MYDS &amp; MyGovEA"
                    ></i>
                    <h2 class="font-poppins text-warning-700 mb-2 text-lg font-semibold">
                        Pematuhan MYDS &amp; MyGovEA
                    </h2>
                    <p class="text-black-700 mb-4 text-sm">
                        Reka bentuk mematuhi piawaian Malaysia Government Design System &amp; 18
                        Prinsip MyGovEA.
                    </p>
                    <a
                        href="#compliance"
                        class="text-primary-600 focus:ring-primary-300 inline-flex items-center font-medium transition hover:underline focus:ring-2 focus:outline-none"
                    >
                        Ketahui Lagi
                        <i
                            class="bi bi-chevron-right ml-1 h-4 w-4 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Ketahui Lagi"
                        ></i>
                    </a>
                </div>
            </section>

            <!-- How It Works / Manfaat Section -->
            <section id="how-it-works" class="mx-auto mb-10 w-full max-w-4xl">
                <h2 class="font-poppins text-primary-700 mb-6 text-center text-2xl font-semibold">
                    Bagaimana ICTServe Berfungsi
                </h2>
                <ol class="grid grid-cols-1 gap-4 text-center sm:grid-cols-2 lg:grid-cols-4">
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <i
                            class="bi bi-journal text-primary-600 icon-myds mx-auto mb-2 h-8 w-8"
                            aria-hidden="true"
                            role="img"
                            aria-label="Isi Borang"
                        ></i>
                        <span class="text-black-900 font-medium">Isi Borang</span>
                        <span class="text-black-700 mt-1 text-xs">
                            Permohonan pinjaman atau aduan ICT secara digital
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <i
                            class="bi bi-patch-check text-success-600 icon-myds mx-auto mb-2 h-8 w-8"
                            aria-hidden="true"
                            role="img"
                            aria-label="Kelulusan / Tindakan"
                        ></i>
                        <span class="text-black-900 font-medium">Kelulusan / Tindakan</span>
                        <span class="text-black-700 mt-1 text-xs">
                            Permohonan disemak &amp; diluluskan pegawai
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <i
                            class="bi bi-folder text-warning-600 icon-myds mx-auto mb-2 h-8 w-8"
                            aria-hidden="true"
                            role="img"
                            aria-label="Ambil / Pulang Peralatan"
                        ></i>
                        <span class="text-black-900 font-medium">Ambil / Pulang Peralatan</span>
                        <span class="text-black-700 mt-1 text-xs">
                            Urusan fizikal di BPM dengan rekod digital
                        </span>
                    </li>
                    <li
                        class="shadow-card border-otl-divider flex flex-col items-center rounded-lg border bg-white p-5"
                    >
                        <i
                            class="bi bi-list text-primary-700 icon-myds mx-auto mb-2 h-8 w-8"
                            aria-hidden="true"
                            role="img"
                            aria-label="Jejak Status"
                        ></i>
                        <span class="text-black-900 font-medium">Jejak Status</span>
                        <span class="text-black-700 mt-1 text-xs">
                            Pantau status permohonan &amp; tiket secara masa nyata
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
                        alt="Logo BPM"
                        class="h-10 w-auto"
                        style="height: 40px; width: auto; max-width: 160px; object-fit: contain"
                    />
                    <span class="text-black-700 text-xs">Bahagian Pengurusan Maklumat (BPM)</span>
                </div>
                <div class="text-center text-xs text-gray-500">
                    &copy;
                    <span id="year"></span>
                    Hakcipta Terpelihara, Kementerian Pelancongan, Seni dan Budaya Malaysia
                </div>
                <div class="footer-social flex gap-3">
                    <a
                        href="https://facebook.com/motacmalaysia"
                        aria-label="Facebook"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none"
                    >
                        <i class="fab fa-facebook h-6 w-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://x.com/motacmalaysia"
                        aria-label="X (Twitter)"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none"
                    >
                        <i class="fab fa-x-twitter h-6 w-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://instagram.com/motacmalaysia"
                        aria-label="Instagram"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none"
                    >
                        <i class="fab fa-instagram h-6 w-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://youtube.com/motacmalaysia"
                        aria-label="YouTube"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:ring-primary-300 focus:ring-2 focus:outline-none"
                    >
                        <i class="fab fa-youtube h-6 w-6" aria-hidden="true"></i>
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
                    Dasar Privasi
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#terms"
                    class="focus:ring-primary-300 text-gray-500 hover:underline focus:ring-2 focus:outline-none"
                >
                    Terma Penggunaan
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#accessibility"
                    class="focus:ring-primary-300 text-gray-500 hover:underline focus:ring-2 focus:outline-none"
                >
                    Kenyataan Kebolehcapaian
                </a>
            </div>
        </footer>

        <!-- App JS handled by Vite -->
        {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    </body>
</html>

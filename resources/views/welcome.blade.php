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
    <body class="bg-washed text-black-900 font-sans antialiased min-h-screen flex flex-col">
        <!-- Skip to main content for accessibility (MYDS) -->
        <a href="#main-content" class="skip-link">Langkau ke kandungan utama</a>
        <!-- Header -->
        <header class="w-full bg-white shadow-md border-b border-otl-divider sticky top-0 z-40">
            <div class="max-w-screen-xl mx-auto flex items-center justify-between px-4 py-3">
                <div class="flex items-center gap-3">
                    <!-- MOTAC Logo JPEG (MYDS: height 40px, width auto, alt text) -->
                    <img
                        src="{{ asset('images/motac-logo.jpeg') }}"
                        alt="Logo MOTAC"
                        class="h-10 w-auto"
                        style="height: 40px; width: auto; max-width: 160px; object-fit: contain"
                    />
                    <span
                        class="ml-2 text-xl font-poppins font-bold text-primary-600 tracking-wide"
                    >
                        ICTServe
                        <span class="font-normal text-black-700">(iServe)</span>
                    </span>
                </div>
                <nav class="flex-1 flex items-center justify-end gap-6" aria-label="Navigasi utama">
                    <x-myds.language-switcher />
                    <a
                        href="{{ route('login') }}"
                        class="text-sm font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 flex items-center gap-1"
                    >
                        <!-- Bootstrap Icons person-circle -->
                        <i
                            class="bi bi-person-circle text-primary-600 w-6 h-6 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        Log Masuk
                    </a>
                    <a
                        href="#about"
                        class="text-sm font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 flex items-center gap-1"
                    >
                        <!-- Bootstrap Icons info-circle -->
                        <i
                            class="bi bi-info-circle text-primary-600 w-6 h-6 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Tentang"
                        ></i>
                        Tentang
                    </a>
                    <a
                        href="#contact"
                        class="text-sm font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 flex items-center gap-1"
                    >
                        <!-- Bootstrap Icons telephone -->
                        <i
                            class="bi bi-telephone text-primary-600 w-6 h-6 flex-shrink-0"
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
            class="bg-warning-50 py-2 border-b border-warning-200 text-warning-700 text-center text-xs font-medium"
            role="status"
        >
            <span class="inline-block bg-warning-200 text-warning-900 rounded px-2 py-1 mr-2">
                <!-- Bootstrap Icons exclamation-triangle -->
                <i
                    class="bi bi-exclamation-triangle w-4 h-4 mr-1 align-middle flex-shrink-0"
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
            class="flex-1 flex flex-col items-center justify-center px-4 py-8 bg-washed"
        >
            <!-- Hero Section -->
            <section class="w-full max-w-4xl mx-auto text-center mb-12">
                <h1
                    class="font-poppins text-4xl sm:text-5xl font-bold text-primary-600 mb-4 drop-shadow"
                    style="letter-spacing: -1px"
                >
                    Selamat Datang ke ICTServe
                    <span class="font-normal text-black-700">(iServe)</span>
                </h1>
                <p class="text-lg sm:text-xl text-black-700 mb-4 font-medium">
                    Pusat Pengurusan Pinjaman &amp; Sokongan ICT MOTAC
                </p>
                <p class="text-base sm:text-lg text-gray-600 mb-8">
                    Semua permohonan pinjaman peralatan ICT dan aduan kerosakan kini dalam satu
                    sistem digital – mesra rakyat, telus, dan pantas.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a
                        href="{{ route('login') }}"
                        class="inline-flex items-center justify-center px-6 py-3 bg-primary-600 text-white font-semibold rounded-lg shadow-button hover:bg-primary-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-400 transition easeoutback-short text-base"
                    >
                        <!-- Bootstrap Icons arrow-right -->
                        <i
                            class="bi bi-arrow-right w-5 h-5 mr-2 -ml-1 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Log Masuk"
                        ></i>
                        Log Masuk
                    </a>
                    <a
                        href="#panduan"
                        class="inline-flex items-center justify-center px-6 py-3 border border-primary-300 text-primary-600 bg-white font-semibold rounded-lg shadow-button hover:bg-primary-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-primary-400 transition easeoutback-short text-base"
                    >
                        <!-- Bootstrap Icons book -->
                        <i
                            class="bi bi-book w-5 h-5 mr-2 -ml-1 flex-shrink-0"
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
                class="w-full max-w-5xl grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10"
            >
                <!-- ICT Loan Card -->
                <div
                    class="bg-white rounded-xl shadow-card border border-otl-divider p-6 flex flex-col items-center text-center"
                >
                    <i
                        class="bi bi-folder w-10 h-10 mb-3 text-primary-600 mx-auto"
                        aria-hidden="true"
                        role="img"
                        aria-label="Pinjaman ICT"
                    ></i>
                    <h2 class="font-poppins text-lg font-semibold text-primary-700 mb-2">
                        Pinjaman ICT
                    </h2>
                    <p class="text-sm text-black-700 mb-4">
                        Permohonan pinjaman laptop, projektor, dan peralatan ICT secara digital dan
                        telus.
                    </p>
                    <a
                        href="#loan-info"
                        class="inline-flex items-center text-primary-600 font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 transition"
                    >
                        Maklumat Lanjut
                        <i
                            class="bi bi-chevron-right ml-1 w-4 h-4"
                            aria-hidden="true"
                            role="img"
                            aria-label="Maklumat Lanjut"
                        ></i>
                    </a>
                </div>

                <!-- Helpdesk Card -->
                <div
                    class="bg-white rounded-xl shadow-card border border-otl-divider p-6 flex flex-col items-center text-center"
                >
                    <i
                        class="bi bi-chat-dots w-10 h-10 mb-3 text-success-600 mx-auto"
                        aria-hidden="true"
                        role="img"
                        aria-label="Helpdesk ICT"
                    ></i>
                    <h2 class="font-poppins text-lg font-semibold text-success-700 mb-2">
                        Helpdesk ICT
                    </h2>
                    <p class="text-sm text-black-700 mb-4">
                        Lapor masalah ICT, pantau status tiket dan terima bantuan profesional BPM.
                    </p>
                    <a
                        href="#helpdesk-info"
                        class="inline-flex items-center text-primary-600 font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 transition"
                    >
                        Maklumat Lanjut
                        <i
                            class="bi bi-chevron-right ml-1 w-4 h-4"
                            aria-hidden="true"
                            role="img"
                            aria-label="Maklumat Lanjut"
                        ></i>
                    </a>
                </div>

                <!-- Compliance Card -->
                <div
                    class="bg-white rounded-xl shadow-card border border-otl-divider p-6 flex flex-col items-center text-center"
                >
                    <i
                        class="bi bi-shield-check w-10 h-10 mb-3 text-warning-600 mx-auto"
                        aria-hidden="true"
                        role="img"
                        aria-label="Pematuhan MYDS &amp; MyGovEA"
                    ></i>
                    <h2 class="font-poppins text-lg font-semibold text-warning-700 mb-2">
                        Pematuhan MYDS &amp; MyGovEA
                    </h2>
                    <p class="text-sm text-black-700 mb-4">
                        Reka bentuk mematuhi piawaian Malaysia Government Design System &amp; 18
                        Prinsip MyGovEA.
                    </p>
                    <a
                        href="#compliance"
                        class="inline-flex items-center text-primary-600 font-medium hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300 transition"
                    >
                        Ketahui Lagi
                        <i
                            class="bi bi-chevron-right ml-1 w-4 h-4 flex-shrink-0"
                            aria-hidden="true"
                            role="img"
                            aria-label="Ketahui Lagi"
                        ></i>
                    </a>
                </div>
            </section>

            <!-- How It Works / Manfaat Section -->
            <section id="how-it-works" class="w-full max-w-4xl mx-auto mb-10">
                <h2 class="font-poppins text-2xl font-semibold text-primary-700 mb-6 text-center">
                    Bagaimana ICTServe Berfungsi
                </h2>
                <ol class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-center">
                    <li
                        class="flex flex-col items-center bg-white rounded-lg p-5 shadow-card border border-otl-divider"
                    >
                        <i
                            class="bi bi-journal w-8 h-8 mb-2 text-primary-600 icon-myds mx-auto"
                            aria-hidden="true"
                            role="img"
                            aria-label="Isi Borang"
                        ></i>
                        <span class="font-medium text-black-900">Isi Borang</span>
                        <span class="text-xs text-black-700 mt-1">
                            Permohonan pinjaman atau aduan ICT secara digital
                        </span>
                    </li>
                    <li
                        class="flex flex-col items-center bg-white rounded-lg p-5 shadow-card border border-otl-divider"
                    >
                        <i
                            class="bi bi-patch-check w-8 h-8 mb-2 text-success-600 icon-myds mx-auto"
                            aria-hidden="true"
                            role="img"
                            aria-label="Kelulusan / Tindakan"
                        ></i>
                        <span class="font-medium text-black-900">Kelulusan / Tindakan</span>
                        <span class="text-xs text-black-700 mt-1">
                            Permohonan disemak &amp; diluluskan pegawai
                        </span>
                    </li>
                    <li
                        class="flex flex-col items-center bg-white rounded-lg p-5 shadow-card border border-otl-divider"
                    >
                        <i
                            class="bi bi-folder w-8 h-8 mb-2 text-warning-600 icon-myds mx-auto"
                            aria-hidden="true"
                            role="img"
                            aria-label="Ambil / Pulang Peralatan"
                        ></i>
                        <span class="font-medium text-black-900">Ambil / Pulang Peralatan</span>
                        <span class="text-xs text-black-700 mt-1">
                            Urusan fizikal di BPM dengan rekod digital
                        </span>
                    </li>
                    <li
                        class="flex flex-col items-center bg-white rounded-lg p-5 shadow-card border border-otl-divider"
                    >
                        <i
                            class="bi bi-list w-8 h-8 mb-2 text-primary-700 icon-myds mx-auto"
                            aria-hidden="true"
                            role="img"
                            aria-label="Jejak Status"
                        ></i>
                        <span class="font-medium text-black-900">Jejak Status</span>
                        <span class="text-xs text-black-700 mt-1">
                            Pantau status permohonan &amp; tiket secara masa nyata
                        </span>
                    </li>
                </ol>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-otl-divider mt-auto py-4">
            <div
                class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-between px-4 gap-4"
            >
                <div class="flex items-center gap-2">
                    <img
                        src="{{ asset('images/bpm-logo.png') }}"
                        alt="Logo BPM"
                        class="h-10 w-auto"
                        style="height: 40px; width: auto; max-width: 160px; object-fit: contain"
                    />
                    <span class="text-xs text-black-700">Bahagian Pengurusan Maklumat (BPM)</span>
                </div>
                <div class="text-xs text-gray-500 text-center">
                    &copy;
                    <span id="year"></span>
                    Hakcipta Terpelihara, Kementerian Pelancongan, Seni dan Budaya Malaysia
                </div>
                <div class="flex gap-3 footer-social">
                    <a
                        href="https://facebook.com/motacmalaysia"
                        aria-label="Facebook"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300"
                    >
                        <i class="fab fa-facebook w-6 h-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://x.com/motacmalaysia"
                        aria-label="X (Twitter)"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300"
                    >
                        <i class="fab fa-x-twitter w-6 h-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://instagram.com/motacmalaysia"
                        aria-label="Instagram"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300"
                    >
                        <i class="fab fa-instagram w-6 h-6" aria-hidden="true"></i>
                    </a>
                    <a
                        href="https://youtube.com/motacmalaysia"
                        aria-label="YouTube"
                        target="_blank"
                        rel="noopener"
                        class="text-primary-600 hover:text-primary-800 focus:outline-none focus:ring-2 focus:ring-primary-300"
                    >
                        <i class="fab fa-youtube w-6 h-6" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div
                class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-center gap-4 px-4 pt-2 text-xs"
            >
                <a
                    href="#privacy"
                    class="text-gray-500 hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300"
                >
                    Dasar Privasi
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#terms"
                    class="text-gray-500 hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300"
                >
                    Terma Penggunaan
                </a>
                <span class="text-gray-300">|</span>
                <a
                    href="#accessibility"
                    class="text-gray-500 hover:underline focus:outline-none focus:ring-2 focus:ring-primary-300"
                >
                    Kenyataan Kebolehcapaian
                </a>
            </div>
        </footer>

        <!-- App JS handled by Vite -->
        {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    </body>
</html>

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
        {{-- Ensure myds-components.scss is imported in your main app.scss --}}

        <!-- Google Fonts: Inter and Poppins as per MYDS Typography -->
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

    <!-- Skip to main content for accessibility (MYDS Guideline) -->
    <a href="#main-content" class="myds-skip-link" tabindex="0">Langkau ke kandungan utama</a>

    <!-- Header -->
    <header class="w-full myds-nav sticky top-0 z-40">
        <div class="myds-container flex items-center justify-between py-3">
            <div class="flex items-center gap-3">
                <img
                    src="{{ asset('images/motac-logo.jpeg') }}"
                    alt="Logo MOTAC"
                    class="myds-logo"
                />
                <span class="ml-2 myds-heading-xs myds-brand tracking-wide">
                    ICTServe
                    <span class="font-normal myds-text-secondary">(iServe)</span>
                </span>
            </div>
            <nav class="flex-1 flex items-center justify-end gap-6" aria-label="Navigasi utama">
                {{-- Assuming x-myds.language-switcher is a Blade component --}}
                {{-- <x-myds.language-switcher /> --}}
                <a href="{{ route('login') }}" class="myds-nav-link myds-body-sm font-medium hover:underline myds-focus-ring flex items-center gap-1">
                    <i class="bi bi-person-circle myds-icon--md" aria-hidden="true" role="img" aria-label="Log Masuk"></i>
                    Log Masuk
                </a>
                <a href="#about" class="myds-nav-link myds-body-sm font-medium hover:underline myds-focus-ring flex items-center gap-1">
                    <i class="bi bi-info-circle myds-icon--md" aria-hidden="true" role="img" aria-label="Tentang"></i>
                    Tentang
                </a>
                <a href="#contact" class="myds-nav-link myds-body-sm font-medium hover:underline myds-focus-ring flex items-center gap-1">
                    <i class="bi bi-telephone myds-icon--md" aria-hidden="true" role="img" aria-label="Hubungi"></i>
                    Hubungi
                </a>
            </nav>
        </div>
    </header>

    <!-- Phase Banner (MYDS Component) -->
    <div class="bg-warning-50 py-2 border-b border-warning-200 text-warning-700 text-center myds-body-xs font-medium" role="status">
        <span class="inline-block bg-warning-200 text-warning-900 rounded px-2 py-1 mr-2">
            <i class="bi bi-exclamation-triangle myds-icon--md" aria-hidden="true" role="img" aria-label="Beta"></i>
            Beta
        </span>
        Platform ini dalam fasa pengujian. Sila laporkan isu ke BPM.
        <a href="#feedback" class="underline myds-focus-ring">Beri maklum balas</a>
    </div>

    <!-- Main Content -->
    <main id="main-content" tabindex="-1" class="flex-1 px-4 py-8">

        <!-- Hero Section -->
        <section class="myds-container text-center mb-12">
            <h1 class="myds-heading-lg myds-text-primary mb-4 drop-shadow">
                Selamat Datang ke ICTServe <span class="font-normal myds-text-secondary">(iServe)</span>
            </h1>
            <p class="myds-body-xl myds-text-primary mb-4 font-medium">
                Pusat Pengurusan Pinjaman &amp; Sokongan ICT MOTAC
            </p>
            <p class="myds-body-lg myds-text-muted mb-8 max-w-3xl mx-auto">
                Semua permohonan pinjaman peralatan ICT dan aduan kerosakan kini dalam satu sistem digital – mesra rakyat, telus, dan pantas.
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('login') }}" class="myds-btn myds-btn-primary myds-focus-ring text-base">
                    <i class="bi bi-arrow-right myds-icon--md mr-2" aria-hidden="true"></i>
                    Log Masuk
                </a>
                <a href="#panduan" class="myds-btn myds-btn-secondary myds-focus-ring text-base">
                    <i class="bi bi-book myds-icon--md mr-2" aria-hidden="true"></i>
                    Panduan Pengguna
                </a>
            </div>
        </section>

        <!-- Quick Info Cards (MYDS Grid) -->
        <section class="w-full myds-container">
            <div class="myds-grid mb-10">
                <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card myds-card--hover">
                        <i class="bi bi-folder myds-text-primary myds-icon--lg mb-4" aria-hidden="true"></i>
                        <h2 class="myds-heading-3xs myds-text-primary mb-2">Pinjaman ICT</h2>
                        <p class="myds-body-sm myds-text-secondary mb-4">
                            Permohonan pinjaman laptop, projektor, dan peralatan ICT secara digital dan telus.
                        </p>
                        <a href="#loan-info" class="myds-btn-link myds-focus-ring mt-auto">
                            Maklumat Lanjut <i class="bi bi-chevron-right myds-icon--md" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card myds-card--hover">
                        <i class="bi bi-chat-dots myds-text-success myds-icon--lg mb-4" aria-hidden="true"></i>
                        <h2 class="myds-heading-3xs myds-text-success mb-2">Helpdesk ICT</h2>
                        <p class="myds-body-sm myds-text-secondary mb-4">
                            Lapor masalah ICT, pantau status tiket dan terima bantuan profesional BPM.
                        </p>
                        <a href="#helpdesk-info" class="myds-btn-link myds-focus-ring mt-auto">
                            Maklumat Lanjut <i class="bi bi-chevron-right myds-icon--md ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div class="myds-col-span-12 lg:myds-col-span-4 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card myds-card--hover">
                        <i class="bi bi-shield-check myds-text-warning myds-icon--lg mb-4" aria-hidden="true"></i>
                        <h2 class="myds-heading-3xs myds-text-warning mb-2">Pematuhan MYDS &amp; MyGovEA</h2>
                        <p class="myds-body-sm myds-text-secondary mb-4">
                            Reka bentuk mematuhi piawaian Malaysia Government Design System &amp; 18 Prinsip MyGovEA.
                        </p>
                        <a href="#compliance" class="myds-btn-link myds-focus-ring mt-auto">
                            Ketahui Lagi <i class="bi bi-chevron-right myds-icon--md ml-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section (MYDS Grid) -->
        <section id="how-it-works" class="w-full myds-container mb-10">
            <h2 class="myds-heading-sm myds-text-primary mb-6 text-center">Bagaimana ICTServe Berfungsi</h2>
            <div class="myds-grid">
                <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card">
                        <i class="bi bi-journal myds-text-primary myds-icon--lg mb-3" aria-hidden="true"></i>
                        <span class="myds-body-md font-medium myds-text-primary">Isi Borang</span>
                        <span class="myds-body-xs myds-text-muted mt-1">Permohonan pinjaman atau aduan ICT secara digital</span>
                    </div>
                </div>
                <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card">
                        <i class="bi bi-patch-check myds-text-success myds-icon--lg mb-3" aria-hidden="true"></i>
                        <span class="myds-body-md font-medium myds-text-primary">Kelulusan / Tindakan</span>
                        <span class="myds-body-xs myds-text-muted mt-1">Permohonan disemak &amp; diluluskan pegawai</span>
                    </div>
                </div>
                <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card">
                        <i class="bi bi-folder myds-text-warning myds-icon--lg mb-3" aria-hidden="true"></i>
                        <span class="myds-body-md font-medium myds-text-primary">Ambil / Pulang Peralatan</span>
                        <span class="myds-body-xs myds-text-muted mt-1">Urusan fizikal di BPM dengan rekod digital</span>
                    </div>
                </div>
                <div class="myds-col-span-12 lg:myds-col-span-3 md:myds-col-span-4 sm:myds-col-span-4">
                    <div class="myds-card">
                        <i class="bi bi-list myds-text-primary myds-icon--lg mb-3" aria-hidden="true"></i>
                        <span class="myds-body-md font-medium myds-text-primary">Jejak Status</span>
                        <span class="myds-body-xs myds-text-muted mt-1">Pantau status permohonan &amp; tiket secara masa nyata</span>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="myds-footer mt-auto py-4">
        <div class="myds-container myds-footer-layout">
            <div class="myds-footer-brand">
                <img src="{{ asset('images/bpm-logo.png') }}" alt="Logo BPM" class="myds-logo" />
                <span class="myds-body-xs myds-text-muted">Bahagian Pengurusan Maklumat (BPM)</span>
            </div>
            <div>
                <div class="myds-body-xs myds-text-muted myds-footer-copyright">
                    &copy; <span id="year">{{ date('Y') }}</span> Hakcipta Terpelihara, Kementerian Pelancongan, Seni dan Budaya Malaysia
                </div>
                <div class="myds-body-xs myds-text-muted mt-2">
                    No. 2, Menara 1, Jalan P5/6, Presint 5, 62200 Putrajaya · Tel: 03-8000 8000 · Fax: 03-8891 7100 · <a href="https://www.motac.gov.my/hubungi" target="_blank" rel="noopener" class="myds-footer-link">Hubungi Kami</a>
                </div>
            </div>
            <div class="myds-footer-social">
                <a href="https://www.facebook.com/MyMOTAC" aria-label="Facebook" target="_blank" rel="noopener" class="myds-social-link"><i class="fab fa-facebook myds-icon--md" aria-hidden="true"></i></a>
                <a href="https://x.com/MyMOTAC" aria-label="X (Twitter)" target="_blank" rel="noopener" class="myds-social-link"><i class="fab fa-x-twitter myds-icon--md" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/MyMOTAC" aria-label="Instagram" target="_blank" rel="noopener" class="myds-social-link"><i class="fab fa-instagram myds-icon--md" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/c/MyMOTAC" aria-label="YouTube" target="_blank" rel="noopener" class="myds-social-link"><i class="fab fa-youtube myds-icon--md" aria-hidden="true"></i></a>
            </div>
        </div>
        <div class="myds-container myds-footer-links">
            <a href="#privacy" class="myds-footer-link">Dasar Privasi</a>
            <span class="myds-text-muted">|</span>
            <a href="#terms" class="myds-footer-link">Terma Penggunaan</a>
            <span class="myds-text-muted">|</span>
            <a href="#accessibility" class="myds-footer-link">Kenyataan Kebolehcapaian</a>
        </div>
    </footer>

    <!-- App JS handled by Vite -->
    {{-- Vite injects the compiled JS/CSS when using @vite in the head --}}
    <script>
        // Simple script to keep the year updated in the footer.
        // document.getElementById('year').textContent = new Date().getFullYear();
    </script>
</body>
</html>

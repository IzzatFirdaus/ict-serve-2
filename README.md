# README.md

## ICTServe (iServe) – MYDS-Compliant ICT Service Management

ICTServe (iServe) adalah aplikasi Laravel 12 untuk mengurus perkhidmatan ICT di MOTAC, termasuk modul Pinjaman Peralatan dan Helpdesk Aduan Kerosakan. Projek ini dibina dengan fokus kepada pengalaman mesra pengguna, aksesibiliti yang ketat, dan pematuhan kepada [Sistem Reka Bentuk Kerajaan Malaysia (MYDS)](https://design.digital.gov.my/) dan [Prinsip MyGovEA](https://mygovea.jdn.gov.my/page-prinsip-reka-bentuk/).

*ICTServe (iServe) is a modern Laravel 12 application for managing ICT services in MOTAC, including equipment loans and helpdesk ticketing for damage complaints. The project is built with a citizen-centric focus, strict accessibility, and compliance with the [Malaysia Government Design System (MYDS)](https://design.digital.gov.my/) and [MyGovEA Principles](https://mygovea.jdn.gov.my/page-prinsip-reka-bentuk/).*

---

### 1. Gambaran Projek (Project Overview)

- **Tujuan (Purpose)**: Menyediakan platform digital berpusat untuk semua permintaan perkhidmatan ICT MOTAC—pinjaman peralatan dan aduan kerosakan.  
*Provide a unified, digital platform for all MOTAC ICT service requests—equipment loans and damage complaints.*

- **Sasaran Pengguna (Audience)**: Semua staf MOTAC, BPM, pasukan sokongan ICT, dan pentadbir.

*All MOTAC staff, BPM, IT support, and administrators.*

- **Fokus Reka Bentuk (Design Focus)**: Pematuhan MYDS, aksesibiliti (WCAG 2.1 AA), grid responsif 12-8-4, dan seni bina modular.

*MYDS-compliant UI, accessibility (WCAG 2.1 AA), responsive 12-8-4 grid, and a modular, extensible architecture.*

---

### 2. Ciri Utama (Core Features)

- **Papan Pemuka Berpusat (Centralized Dashboard)**: Akses bersepadu ke modul pinjaman & helpdesk, notifikasi, dan penjejakan status.

*Unified access to loan & helpdesk modules, notifications, and status tracking.*

- **Modul Pinjaman Peralatan (Equipment Loan Module)**: Borang permohonan digital, aliran kelulusan, pengeluaran/pemulangan, dan jejak audit.

*Digital loan application, approval workflow, issuance/return, and audit log.*

- **Modul Helpdesk (Helpdesk Module)**: Borang aduan kerosakan, sistem tiket dengan status, komen berbenang, dan tugasan admin.

*Damage complaint form, ticketing with status, threaded comments, and admin assignment.*

- **Aksesibiliti & UI MYDS (Accessibility & MYDS UI)**: Navigasi papan kekunci, sokongan ARIA, kontras tinggi, dan mod gelap.

*Keyboard navigation, ARIA support, high contrast, and dark mode.*

- **Ciri Lain (Other Features)**: Jejak audit penuh, notifikasi dalam aplikasi & e-mel, akses berasaskan peranan, dan sokongan dwibahasa (BM utama).

*Full audit logging, in-app & email notifications, role-based access, and bilingual support (Malay primary).*

---

### 3. Teknologi (Technology Stack)

- **Backend**: PHP `^8.2`, Laravel `^12.0`
- **Frontend**: Livewire `^3.6`, Filament `^4.0`, Alpine.js, Tailwind CSS `^4.1`, Vite `^6.0`
- **Pangkalan Data (Database)**: MySQL / MariaDB / PostgreSQL / SQLite
- **Pengujian (Testing)**: PHPUnit, Playwright (E2E), axe-core (Accessibility)
- **Kualiti Kod (Code Quality)**: Laravel Pint, Prettier, Stylelint, Larastan

---

### 4. Struktur Sistem (System Architecture)

- **Seni Bina (Architecture)**: Struktur Laravel MVC standard dengan komponen Livewire, sumber admin Filament, dan pustaka komponen Blade untuk elemen MYDS.

*Standard Laravel MVC structure with Livewire components, Filament admin resources, and a Blade component library for MYDS elements.*

- **Struktur Direktori (Directory Structure)**:
  app/
   ├─ Http/Controllers/
   ├─ Models/
   ├─ Livewire/
   ├─ Services/
   └─ Policies/
  resources/
   ├─ views/
   │   ├─ components/myds/
   │   └─ livewire/
   ├─ css/
   └─ js/
  database/
   ├─ migrations/
   └─ seeders/
  routes/
  tests/

- **Dokumentasi Lanjut (Further Documentation)**: Rujuk direktori `/docs` untuk skema data terperinci, carta aliran kerja, dan rasional reka bentuk.

*See the `/docs` directory for detailed data schemas, workflow charts, and design rationale.*

---

### 5\. Persediaan & Mula Pantas (Installation & Quick Start)

### Prasyarat (Prerequisites)

- PHP ^8.2 (dengan ekstensi yang diperlukan)
- Composer
- Node.js v18+
- Pangkalan Data: MySQL, MariaDB, PostgreSQL, atau SQLite

### Langkah-langkah Pemasangan (Setup Steps)

1. **Clone repositori dan pasang pergantungan PHP.**

*Clone the repository and install PHP dependencies.*

    git clone [https://github.com/user/ict-serve.git](https://github.com/user/ict-serve.git)
    cd ict-serve
    Copy-Item .env.example .env
    composer install

2. **Sediakan persekitaran aplikasi.**

*Set up the application environment.*

    php artisan key:generate

#### Edit your .env with database credentials as needed

1. **Jalankan migrasi pangkalan data dan seeders.**

*Run database migrations and seeders.*

    php artisan migrate --seed

4. **Pasang pergantungan frontend.**

*Install frontend dependencies.*

    npm install

5. **Jalankan server pembangunan.**

*Run the development servers.*

    ```powershell
        # Dalam terminal pertama (In the first terminal):
        npm run dev

        # Dalam terminal kedua (In a second terminal):
        php artisan serve
    ```

6. **Akses aplikasi.**

*Access the application.*

Buka (Open) [http://localhost:8000](https://www.google.com/search?q=http://localhost:8000)

---

## 6\. Aliran Pembangunan (Development Workflow)

- **Jalankan ujian PHPUnit (Run PHPUnit tests)**:
    `php artisan test`

- **Jalankan ujian Playwright E2E (Run Playwright E2E tests)**:
    `npx playwright test`

- **Format kod PHP (Format PHP code)**:
    `vendor/bin/pint --dirty`

- **Format kod frontend (Format frontend code)**:
    `npx prettier --write .`

- **Lint fail CSS (Lint CSS files)**:
    `npx stylelint "**/*.css"`

- **Analisis statik (Static analysis)**:
    `./vendor/bin/phpstan analyse`

---

## 7\. Konvensyen Kod & UI (Coding & UI Conventions)

- **Laravel Boost**: Ikut konvensyen Laravel Boost untuk struktur kod, penamaan, dan amalan terbaik.

*Follow Laravel Boost conventions for code structure, naming, and best practices.*

- **Sistem Reka Bentuk MYDS (MYDS Design System)**: Gunakan token semantik MYDS untuk warna, jarak, dan tipografi.

*Use semantic tokens from MYDS for colors, spacing, and typography.*

- **Aksesibiliti (Accessibility)**: Pastikan semua komponen menyokong navigasi papan kekunci, label ARIA, dan kontras warna yang mencukupi.

*Ensure all components support keyboard navigation, ARIA labels, and sufficient color contrast.*

---

## 8\. Lesen & Penghargaan (License & Credits)

- **Lesen (License)**: MIT
- **Penulis Utama (Lead Author)**: IzzatFirdaus

---

Jika terdapat sebarang cadangan atau masalah, sila buka *issue* di repositori ini.

*Please open an issue for any suggestions or problems.*

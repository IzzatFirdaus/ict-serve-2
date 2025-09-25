Dokumentasi Lengkap ICTServe (iServe) v1.0 - Dokumen Dikemaskini
📄 Dokumentasi_Reka_Bentuk_ICTServe(iServe).md
Dokumentasi Reka Bentuk Sistem ICTServe (iServe) v1.0
Maklumat Dokumen
AtributNilaiVersi Dokumen2.0Tarikh Kemaskini25 September 2025StatusAktifKlasifikasiTeknikalPenulisPasukan Pembangunan ICTServe
Kandungan

Ringkasan Eksekutif
Prinsip Reka Bentuk
Seni Bina Sistem
Reka Bentuk Antara Muka
Reka Bentuk Pangkalan Data
Reka Bentuk Keselamatan
Reka Bentuk API
Pematuhan Standard
Panduan Implementasi
Lampiran

1. Ringkasan Eksekutif
   1.1 Pengenalan
   ICTServe (iServe) adalah sistem pengurusan perkhidmatan ICT komprehensif yang direka khusus untuk Kementerian Pelancongan, Seni dan Budaya Malaysia (MOTAC). Sistem ini mengintegrasikan pengurusan pinjaman peralatan ICT dan operasi helpdesk dalam satu platform yang selamat, cekap dan mesra pengguna.
   1.2 Objektif Reka Bentuk
   ObjektifPeneranganMetrik KejayaanKebolehgunaanAntara muka intuitif dan mudah digunakanSkor SUS > 80PrestasiSistem responsif dengan masa muat pantasMasa respons < 2sSkalabilitiMenyokong pertumbuhan pengguna500+ pengguna serentakKeselamatanPerlindungan data menyeluruhZero breachKebolehselenggaraanMudah dikemas kini dan diselenggara< 4 jam downtime/tahun
   1.3 Skop Reka Bentuk
   Dokumen ini merangkumi:

Prinsip dan garis panduan reka bentuk
Seni bina sistem dan komponen
Spesifikasi antara muka pengguna
Struktur pangkalan data
Protokol keselamatan
Standard API dan integrasi

2.  Prinsip Reka Bentuk
    2.1 Prinsip MyGOVEA
    ICTServe mematuhi 18 prinsip MyGOVEA untuk memastikan kualiti dan kebolehgunaan sistem:
    mermaidmindmap
    root((MyGOVEA))
    Pengguna
    Berpaksikan Rakyat
    Kawalan Pengguna
    Pencegahan Ralat
    Data
    Berpacukan Data
    Kandungan Terancang
    Struktur Hierarki
    Teknologi
    Teknologi Bersesuaian
    Fleksibel
    Seragam
    Antara Muka
    Minimalis dan Mudah
    Paparan Jelas
    Komponen UI/UX
    Komunikasi
    Komunikasi Berkesan
    Panduan & Dokumentasi
    Tipografi
    2.2 Prinsip Reka Bentuk Teknikal
    2.2.1 Domain-Driven Design (DDD)
    php// Bounded Contexts
    ├── Equipment Management Context
    │ ├── Equipment Aggregate
    │ ├── Loan Application Aggregate
    │ └── Transaction Aggregate
    │
    ├── Helpdesk Context
    │ ├── Ticket Aggregate
    │ ├── Category Aggregate
    │ └── Comment Aggregate
    │
    └── User Management Context
    ├── User Aggregate
    ├── Department Aggregate
    └── Role Aggregate
    2.2.2 SOLID Principles
    PrinsipImplementasiSingle ResponsibilitySetiap kelas mempunyai satu tanggungjawab sahajaOpen/ClosedTerbuka untuk extension, tertutup untuk modificationLiskov SubstitutionSubclass boleh menggantikan parent classInterface SegregationInterface yang spesifik dan fokusDependency InversionBergantung pada abstraksi, bukan konkrit
    2.3 Prinsip Kebolehcapaian (WCAG 2.1 AA)
    AspekKeperluanImplementasiPerceivableMaklumat boleh dilihatKontras warna 4.5:1, teks alternatifOperableInterface boleh digunakanKeyboard navigation, skip linksUnderstandableMaklumat mudah difahamiLabel jelas, arahan konsistenRobustSerasi dengan teknologi bantuanARIA labels, semantic HTML
3.  Seni Bina Sistem
    3.1 Seni Bina Keseluruhan
    mermaidC4Context
    title Konteks Sistem ICTServe

        Person(user, "Pengguna MOTAC", "Staf yang menggunakan sistem")
        Person(admin, "Pentadbir", "Menguruskan sistem")

        System_Boundary(ictserve, "ICTServe") {
            System(web, "Web Application", "Laravel 12 + Livewire 3")
            System(api, "REST API", "API untuk integrasi")
            SystemDb(db, "Database", "MySQL 8.0")
            System(cache, "Cache", "Redis")
        }

        System_Ext(email, "Email System", "SMTP Server")
        System_Ext(hrmis, "HRMIS", "Sistem HR")

        Rel(user, web, "Menggunakan")
        Rel(admin, web, "Menguruskan")
        Rel(web, api, "Menggunakan")
        Rel(api, db, "Baca/Tulis")
        Rel(api, cache, "Cache data")
        Rel(web, email, "Hantar notifikasi")
        Rel(api, hrmis, "Sync data staf")

    3.2 Seni Bina Lapisan
    yamlPresentation Layer:
    Components: - Blade Templates - Livewire Components - Alpine.js
    Responsibilities: - User interface rendering - User interaction handling - Form validation

Application Layer:
Components: - Controllers - Services - Form Requests
Responsibilities: - Business logic orchestration - Request validation - Response formatting

Domain Layer:
Components: - Models - Repositories - Value Objects
Responsibilities: - Business rules - Domain logic - Entity relationships

Infrastructure Layer:
Components: - Database - Cache - File Storage
Responsibilities: - Data persistence - External integrations - System services
3.3 Corak Reka Bentuk (Design Patterns)
CorakPenggunaanContohRepository PatternData access abstractionEquipmentRepositoryService PatternBusiness logic encapsulationLoanApplicationServiceObserver PatternEvent handlingModel observersFactory PatternObject creationNotificationFactoryStrategy PatternAlgorithm selectionPayment processors 4. Reka Bentuk Antara Muka
4.1 Sistem Grid Responsif
css/_Grid System: 12-8-4_/
.container {
display: grid;
gap: 1rem;
}

/_Desktop: 12 columns_/
@media (min-width: 1024px) {
.container {
grid-template-columns: repeat(12, 1fr);
}
}

/_Tablet: 8 columns_/
@media (min-width: 768px) and (max-width: 1023px) {
.container {
grid-template-columns: repeat(8, 1fr);
}
}

/_Mobile: 4 columns_/
@media (max-width: 767px) {
.container {
grid-template-columns: repeat(4, 1fr);
}
}
4.2 Sistem Warna (MYDS)
scss// Primary Colors
$primary-50: #EFF6FF;
$primary-100: #DBEAFE;
$primary-500: #3B82F6;
$primary-600: #2563EB;
$primary-700: #1D4ED8;

// Secondary Colors
$secondary-50: #F8FAFC;
$secondary-500: #64748B;
$secondary-900: #0F172A;

// Semantic Colors
$success: #10B981;
$warning: #F59E0B;
$danger: #EF4444;
$info: #06B6D4;

// Neutral Colors
$gray-50: #F9FAFB;
$gray-500: #6B7280;
$gray-900: #111827;
4.3 Tipografi
css/_Heading Font Stack_/
.heading {
font-family: 'Poppins', -apple-system, BlinkMacSystemFont, sans-serif;
font-weight: 600;
line-height: 1.2;
}

/_Body Font Stack_/
.body {
font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
font-weight: 400;
line-height: 1.6;
}

/_Font Sizes (rem) _/
.text-xs { font-size: 0.75rem; } /_ 12px _/
.text-sm { font-size: 0.875rem; } /_ 14px _/
.text-base { font-size: 1rem; } /_ 16px _/
.text-lg { font-size: 1.125rem; } /_ 18px _/
.text-xl { font-size: 1.25rem; } /_ 20px _/
.text-2xl { font-size: 1.5rem; } /_ 24px _/
.text-3xl { font-size: 1.875rem; } /_ 30px_/
4.4 Komponen UI
4.4.1 Button Component
blade{{-- resources/views/components/button.blade.php --}}
@props([
'type' => 'primary',
'size' => 'medium',
'disabled' => false,
'loading' => false,
])

@php
$classes = [
'primary' => 'bg-primary-600 hover:bg-primary-700 text-white',
'secondary' => 'bg-gray-200 hover:bg-gray-300 text-gray-800',
'danger' => 'bg-danger hover:bg-red-600 text-white',
];

$sizes = [
'small' => 'px-3 py-1.5 text-sm',
'medium' => 'px-4 py-2 text-base',
'large' => 'px-6 py-3 text-lg',
];
@endphp

<button
{{ $attributes->merge([
        'type' => 'button',
        'class' => 'inline-flex items-center justify-center rounded-md font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed ' . $classes[$type] . ' ' . $sizes[$size]
    ]) }}
{{ $disabled || $loading ? 'disabled' : '' }}

>

    @if($loading)
        <svg class="animate-spin -ml-1 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    @endif
    {{ $slot }}

</button>
4.4.2 Form Input Component
blade{{-- resources/views/components/form/input.blade.php --}}
@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'required' => false,
    'error' => null,
])

<div class="form-group">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-danger">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm' . ($error ? ' border-danger' : '')]) }}
        {{ $required ? 'required' : '' }}
    />

    @if($error)
        <p class="mt-1 text-sm text-danger">{{ $error }}</p>
    @endif

</div>
5. Reka Bentuk Pangkalan Data
5.1 Prinsip Reka Bentuk Database
PrinsipPeneranganImplementasiNormalizationMengurangkan redundansi data3NF untuk kebanyakan jadualIndexingMeningkatkan prestasi queryIndex pada foreign keys dan search fieldsSoft DeletesMengekalkan data historydeleted_at timestampAudit TrailTracking perubahan datacreated_by, updated_by fieldsUUID SupportUnique identifiersUUID untuk API references
5.2 Struktur Jadual Utama
5.2.1 Users Table
sqlCREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid CHAR(36) UNIQUE NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    identification_number VARCHAR(20) UNIQUE,
    department_id BIGINT UNSIGNED,
    position_id BIGINT UNSIGNED,
    grade_id BIGINT UNSIGNED,
    status ENUM('active', 'inactive', 'suspended') DEFAULT 'active',
    created_by BIGINT UNSIGNED,
    updated_by BIGINT UNSIGNED,
    deleted_by BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,

    INDEX idx_users_email (email),
    INDEX idx_users_department (department_id),
    INDEX idx_users_status (status),

    FOREIGN KEY (department_id) REFERENCES departments(id),
    FOREIGN KEY (position_id) REFERENCES positions(id),
    FOREIGN KEY (grade_id) REFERENCES grades(id)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
5.3 Relationship Diagram
mermaiderDiagram
USERS ||--o{ LOAN_APPLICATIONS : creates
USERS ||--o{ HELPDESK_TICKETS : submits
DEPARTMENTS ||--o{ USERS : has
GRADES ||--o{ USERS : assigned
POSITIONS ||--o{ USERS : holds

    LOAN_APPLICATIONS ||--|{ LOAN_APPLICATION_ITEMS : contains
    LOAN_APPLICATIONS ||--o{ LOAN_TRANSACTIONS : generates
    LOAN_APPLICATIONS ||--o{ APPROVALS : requires

    EQUIPMENT ||--o{ LOAN_TRANSACTION_ITEMS : tracked_in
    EQUIPMENT_CATEGORIES ||--o{ EQUIPMENT : categorizes

    HELPDESK_TICKETS ||--o{ HELPDESK_COMMENTS : has
    HELPDESK_CATEGORIES ||--o{ HELPDESK_TICKETS : categorizes

    NOTIFICATIONS }o--|| USERS : sent_to

6. Reka Bentuk Keselamatan
   6.1 Lapisan Keselamatan
   yamlApplication Security:
   Authentication: - Laravel Fortify - 2FA support - Session management

Authorization: - Role-based access control (RBAC) - Permission-based policies - Resource-level permissions

Data Protection: - Encryption at rest (AES-256) - Encryption in transit (TLS 1.3) - Database field encryption

Input Validation: - Server-side validation - CSRF protection - XSS prevention - SQL injection prevention
6.2 Security Headers
php// config/secure-headers.php
return [
'X-Frame-Options' => 'SAMEORIGIN',
'X-Content-Type-Options' => 'nosniff',
'X-XSS-Protection' => '1; mode=block',
'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
'Content-Security-Policy' => "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com;",
'Referrer-Policy' => 'strict-origin-when-cross-origin',
'Permissions-Policy' => 'camera=(), microphone=(), geolocation=()',
];
6.3 Audit Logging
php// app/Traits/Auditable.php
trait Auditable
{
public static function bootAuditable()
{
static::creating(function ($model) {
if (auth()->check()) {
$model->created_by = auth()->id();
}
});

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });

        static::deleting(function ($model) {
            if (auth()->check()) {
                $model->deleted_by = auth()->id();
                $model->save();
            }
        });
    }

} 7. Reka Bentuk API
7.1 RESTful API Design
yamlAPI Structure:
Version: /api/v1
Format: JSON
Authentication: Bearer Token (Sanctum)

Endpoints:
Equipment:
GET /equipment # List equipment
GET /equipment/{id} # Get equipment details
POST /equipment # Create equipment
PUT /equipment/{id} # Update equipment
DELETE /equipment/{id} # Delete equipment

    Loans:
      GET    /loans                  # List loans
      GET    /loans/{id}             # Get loan details
      POST   /loans                  # Create loan application
      PUT    /loans/{id}/approve     # Approve loan
      PUT    /loans/{id}/reject      # Reject loan
      POST   /loans/{id}/issue       # Issue equipment
      POST   /loans/{id}/return      # Return equipment

7.2 API Response Format
json{
"success": true,
"data": {
"id": 1,
"type": "loan_application",
"attributes": {
"application_number": "LA-2025-09-0001",
"status": "approved",
"created_at": "2025-09-25T10:00:00Z"
},
"relationships": {
"user": {
"id": 123,
"name": "Ahmad Ali"
},
"equipment": [
{
"id": 456,
"name": "Dell Laptop",
"quantity": 1
}
]
}
},
"meta": {
"timestamp": "2025-09-25T10:30:00Z",
"version": "1.0"
}
}
7.3 Error Handling
json{
"success": false,
"error": {
"code": "VALIDATION_ERROR",
"message": "The given data was invalid.",
"details": {
"email": [
"The email field is required."
],
"loan_date": [
"The loan date must be a future date."
]
}
},
"meta": {
"timestamp": "2025-09-25T10:30:00Z",
"request_id": "req_abc123"
}
} 8. Pematuhan Standard
8.1 MyGOVEA Compliance Checklist
PrinsipStatusImplementasiBerpaksikan Rakyat✅User-centered design, usability testingBerpacukan Data✅Comprehensive data model, analyticsKandungan Terancang✅Structured content, clear hierarchyTeknologi Bersesuaian✅Modern tech stack, scalable architectureAntara Muka Minimalis✅Clean UI, focused functionalitySeragam✅Consistent design patternsPaparan Jelas✅Clear navigation, breadcrumbsRealistik✅Based on actual workflowsKognitif✅Reduced cognitive loadFleksibel✅Modular architectureKomunikasi✅Multi-channel notificationsStruktur Hierarki✅Clear organizational structureKomponen UI/UX✅Reusable componentsTipografi✅MYDS typography standardsTetapan Lalai✅Smart defaultsKawalan Pengguna✅User preferences, RBACPencegahan Ralat✅Validation, confirmationsPanduan & Dokumentasi✅Comprehensive documentation
8.2 WCAG 2.1 AA Compliance
KriteriaStatusNota1.1.1 Non-text Content✅Alt text untuk semua imej1.4.3 Contrast (Minimum)✅Ratio 4.5:1 untuk teks normal2.1.1 Keyboard✅Semua fungsi boleh diakses dengan keyboard2.4.7 Focus Visible✅Focus indicator jelas3.3.2 Labels or Instructions✅Label jelas untuk semua input 9. Panduan Implementasi
9.1 Development Setup
bash# Prerequisites

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.0
- MySQL >= 8.0
- Redis >= 7.0

# Installation Steps

1. Clone repository
   git clone <https://github.com/motac/ictserve.git>
   cd ictserve

2. Install dependencies
   composer install
   npm install

3. Environment setup
   cp .env.example .env
   php artisan key:generate

4. Database setup
   php artisan migrate --seed

5. Build assets
   npm run build

6. Start development server
   php artisan serve
   npm run dev
   9.2 Deployment Checklist
   yamlPre-Deployment:

- [ ] Run tests: php artisan test
- [ ] Check code quality: php artisan insights
- [ ] Build assets: npm run build
- [ ] Clear caches: php artisan optimize:clear

Deployment:

- [ ] Enable maintenance mode: php artisan down
- [ ] Pull latest code: git pull origin main
- [ ] Install dependencies: composer install --no-dev
- [ ] Run migrations: php artisan migrate --force
- [ ] Clear and cache configs: php artisan optimize
- [ ] Restart services: supervisorctl restart all

Post-Deployment:

- [ ] Disable maintenance mode: php artisan up
- [ ] Verify application: health checks
- [ ] Monitor logs: tail -f storage/logs/laravel.log
      9.3 Testing Strategy
      Jenis TestToolCoverage TargetUnit TestsPHPUnit> 80%Feature TestsPHPUnit> 70%Browser TestsLaravel DuskCritical pathsAPI TestsPostman/PHPUnitAll endpointsPerformance TestsApache Bench< 2s responseSecurity TestsOWASP ZAPZero vulnerabilities

10. Lampiran
    A. Glosari Teknikal
    IstilahDefinisiAPIApplication Programming InterfaceCRUDCreate, Read, Update, DeleteDDDDomain-Driven DesignMVCModel-View-ControllerRBACRole-Based Access ControlRESTRepresentational State TransferSOLIDSingle responsibility, Open-closed, Liskov substitution, Interface segregation, Dependency inversionUUIDUniversally Unique IdentifierWCAGWeb Content Accessibility Guidelines
    B. Rujukan

Laravel Documentation
Livewire Documentation
Filament Documentation
MYDS Guidelines
MyGOVEA Framework
WCAG 2.1 Guidelines

C. Changelog
VersiTarikhPerubahanPenulis2.025/09/2025Major update dengan compliance penuhPasukan ICTServe1.515/08/2025Tambah security featuresSecurity Team1.012/06/2025Initial releaseDevelopment Team
D. Hubungi
Pasukan Pembangunan ICTServe

Email: <ictserve@motac.gov.my>
Portal: <https://ictserve.motac.gov.my/support>
Telefon: 03-8000 8000

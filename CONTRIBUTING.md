# Sumbangan / Contributing

Terima kasih kerana berminat untuk menyumbang kepada ICTServe (iServe). Dokumen ini menerangkan peraturan cawangan (branch), tujuan setiap cawangan, proses Pull Request, garis panduan mesej commit, dan konvensyen umum untuk repositori ini.

*Thank you for your interest in contributing to ICTServe (iServe). This document explains branch rules, the purpose of each branch, the Pull Request process, commit message guidelines, and general conventions for this repository.*

## Peraturan & Tujuan Cawangan (Branch Rules & Purposes)

Kami menggunakan gabungan aliran kerja Gitflow dan Feature Branch. Berikut adalah cawangan utama dan tujuannya:

*We use a hybrid of Gitflow and Feature Branch workflows. Below are the main branches and their purposes:*

- `master`
  - **Tujuan:** Cawangan utama yang sentiasa stabil dan sedia untuk pengeluaran.
  - **Peraturan:** Lindungi cawangan ini. Semua hotfix dan pelepasan utama digabungkan di sini selepas semakan PR dan lulus CI.

    *Purpose: Main stable branch, always production-ready. All hotfixes and major releases are merged here after PR review and passing CI.*

- `develop`
  - **Tujuan:** Cawangan integrasi untuk pembangunan berterusan. Ciri-ciri baru digabungkan ke sini sebelum pelepasan.
  - **Peraturan:** PR dari `feature/*` harus mensasarkan `develop` dan memerlukan sekurang-kurangnya satu semakan serta lulus CI.

    *Purpose: Integration branch for ongoing development. New features are merged here before release.*

- `production`
  - **Tujuan:** Mewakili kod sebenar yang dideploy ke persekitaran produksi (jika pipeline deploy anda menggunakan cawangan khas).
  - **Peraturan:** Pastikan segerak dengan `master`. Lindungi jika ia mencetuskan pelepasan.

    *Purpose: Represents deployed production code (if your deployment pipeline targets a dedicated branch). Keep in sync with `master`.*

- `live`
  - **Tujuan:** Cawangan pilihan untuk deploy live/hot atau persekitaran live khusus.
  - **Peraturan:** Saranan perlindungan sama seperti `production`.

    *Purpose: Optional branch for live/hot deployments or a dedicated live environment.*

- `hotfix/*`
  - **Tujuan:** Pembetulan pantas yang kritikal (emergency fixes) untuk production. Cabang dari `master`; gabungkan kembali ke `master` dan `develop` selepas diuji.
  - **Peraturan:** Hotfix kecil, diuji, dan tag versi pada `master` selepas merge.

    *Purpose: Urgent fixes for production. Branch from `master` and merge back into `master` and `develop` after testing.*

- `feature/*`
  - **Tujuan:** Cawangan jangka pendek untuk ciri, penambahbaikan, atau eksperimen. Cabang dari `develop`.
  - **Peraturan:** PR ke `develop`, padam cawangan selepas digabungkan.

    *Purpose: Short-lived branches for features, improvements, or experiments. Branch from `develop`. PR into `develop` and delete after merge.*

## Konvensyen Penamaan Cawangan (Branch Naming Conventions)

- Ciri (feature): `feature/<penerangan-pendek>`
- Bugfix: `bugfix/<penerangan-pendek>`
- Hotfix: `hotfix/<penerangan-pendek>`
- Pelepasan (release): `release/<versi-semver>`

Gunakan huruf kecil dan tanda sengkang (-) untuk memisahkan kata.

*Feature: `feature/<short-description>`  
Bugfix: `bugfix/<short-description>`  
Hotfix: `hotfix/<short-description>`  
Release: `release/<semver-version>`  
Use lowercase and hyphens to separate words.*

## Proses Pull Request (Pull Request Process)

1. Cipta cawangan feature dari `develop`:

   ```shell
   git checkout develop
   git checkout -b feature/nama-ciri-anda
   ```

   *Create a feature branch from `develop`:*

   ```shell
   git checkout develop
   git checkout -b feature/your-feature-name
   ```

2. Lakukan perubahan, commit kerap dengan mesej bermakna, dan tolak (push) cawangan anda:

   ```shell
   git push -u origin feature/nama-ciri-anda
   ```

   *Make changes, commit frequently with meaningful messages, and push your branch:*

   ```shell
   git push -u origin feature/your-feature-name
   ```

3. Buka Pull Request yang mensasarkan `develop` (atau `master` untuk hotfix). Sertakan penerangan jelas, tangkapan skrin jika perlu, dan pautkan isu berkaitan.

   *Open a Pull Request targeting `develop` (or `master` for hotfixes). Provide a clear description, screenshots if needed, and link related issues.*

4. Pastikan CI lulus dan minta sekurang-kurangnya satu semakan kod. Selesaikan komen semakan dengan commit susulan.

   *Ensure CI passes and request at least one code review. Address review comments with follow-up commits.*

5. Selepas diluluskan, gabungkan PR menggunakan merge commit atau squash (mengikut pilihan pasukan) dan padam cawangan.

   *After approval, merge the PR using a merge commit or squash (team preference) and delete the branch.*

## Garis Panduan Mesej Commit (Commit Message Guidelines)

- Gunakan masa sekarang: "Tambah borang login" bukan "Telah tambah borang login".
- Hadkan baris subjek kepada 50 aksara.
- Tambah badan mesej dengan butiran tambahan dan rujukan isu bila perlu.

*Use present tense: "Add login form", not "Added login form".  
Limit subject line to 50 characters.  
Add a body with more details and issue references when needed.*

Contoh:

```git
feat(auth): tambah borang login dan pilihan remember-me

- Tambah komponen borang login
- Tambah kotak pilihan remember-me untuk penambahbaikan UX
- Tutup #123
```

*Example:*

```git
feat(auth): add login form and remember-me option

- Add login form component
- Add remember-me checkbox to improve UX
- Closes #123
```

## Varian Aliran Kerja (Workflow Variants)

- **Ciri ringkas:** Kerja pada `feature/*`, buka PR ke `develop` atau `main` jika `develop` tidak digunakan.
- **Gitflow:** Gunakan `develop` untuk integrasi, `release/*` untuk stabilisasi pelepasan, dan `hotfix/*` untuk pembaikan kecemasan.

*Simple feature-branch: Work on `feature/*`, PR to `develop` or `main` if `develop` is not used.  
Gitflow: Use `develop` for integration, `release/*` for release stabilization, and `hotfix/*` for emergency fixes.*

## Perlindungan Cawangan & CI (Branch Protection & CI)

- Lindungi `master` (dan `production`/`live` jika digunakan) dengan status checks wajib, semakan wajib, dan larangan force-push.
- Pastikan CI (ujian, analisis statik) berjalan pada PR dan push ke cawangan penting.

*Protect `master` (and `production`/`live` if used) with required status checks, required reviews, and disallowed force pushes.  
Ensure CI (tests, static analysis) runs on PRs and pushes to important branches.*

## Kerja Rutin Tempatan (Local Housekeeping)

- Padam cawangan tempatan selepas digabungkan:

   ```shell
   git branch -d feature/nama-ciri-anda
   git push origin --delete feature/nama-ciri-anda
   ```

   *Delete local branches after merging:*

   ```shell
   git branch -d feature/your-feature-name
   git push origin --delete feature/your-feature-name
   ```

- Rebase atau merge secara berkala dari `develop` untuk memastikan cawangan feature sentiasa kemas dan mengurangkan konflik.

   *Rebase or merge regularly from `develop` to keep your feature branch up to date and reduce conflicts.*

## Soalan atau Pengecualian (Questions or Exceptions)

Jika tidak pasti dari mana hendak mencabang, tanya dalam PR atau buka isu yang menerangkan perubahan anda. Pengecualian kepada aliran kerja mesti didokumenkan dalam penerangan PR.

*If unsure where to branch from, ask in a PR or open an issue describing your change. Exceptions to the workflow must be documented in the PR description.*

---

Terima kasih kerana membantu memastikan repositori ini kemas dan kolaboratif.

*Thank you for helping keep this repository clean and collaborative.*

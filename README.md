# UAS Administrasi Server (Cloud Computing II)

## 📌 Identitas
- **Nama**: Jibril Judex Facti Aliyudin
- **Mata Kuliah**: Administrasi Server (Cloud Computing II)
- **Dosen**: Mohamad Firdaus, M.Kom.

---

## 🏗 Topologi Arsitektur CI/CD

```
┌──────────────┐     git push      ┌──────────────────┐
│  VS Code     │ ─────────────────►│  GitHub Actions   │
│  (Lokal)     │                   │  CI/CD Pipeline   │
└──────────────┘                   └────────┬─────────┘
                                            │
                              ┌─────────────┴─────────────┐
                              │                           │
                    ┌─────────▼─────────┐     ┌──────────▼──────────┐
                    │ deploy-statis.yml  │     │ deploy-dinamis.yml  │
                    │ (Paths: web-statis)│     │ (Paths: web-dinamis)│
                    └─────────┬─────────┘     └──────────┬──────────┘
                              │                           │
                              ▼                           ▼
                    ┌───────────────────────────────────────────────┐
                    │              Docker Hub Registry              │
                    │  uas-statis:latest  │  uas-dinamis:latest     │
                    └───────────────────────┬───────────────────────┘
                                            │ docker pull
                                            ▼
                    ┌───────────────────────────────────────────────┐
                    │           AWS EC2 Instance (UAS_JUDEX)        │
                    │                                               │
                    │  ┌─────────────────────────────────────────┐  │
                    │  │  Nginx Reverse Proxy (Port 80)          │  │
                    │  │  /       → Web Statis (CV)              │  │
                    │  │  /app/   → Web Dinamis (PHP MVC)        │  │
                    │  └─────────────────┬───────────────────────┘  │
                    │                    │ proxy_pass               │
                    │  ┌─────────────────▼───────────────────────┐  │
                    │  │  PHP 8.2 + Apache (web-dinamis)         │  │
                    │  │  Metal Band Dashboard (News & Tours)    │  │
                    │  └─────────────────┬───────────────────────┘  │
                    │                    │ DATABASE_HOST=db         │
                    │  ┌─────────────────▼───────────────────────┐  │
                    │  │  MariaDB 10.11 (db)                     │  │
                    │  │  Auto-seed via init.sql                  │  │
                    │  │  Volume: mariadb_data (persisten)        │  │
                    │  └─────────────────────────────────────────┘  │
                    │                                               │
                    │  Network: uas-network (bridge)                │
                    └───────────────────────────────────────────────┘
```

---

## 🚀 Tautan Akses Live AWS EC2

| Aplikasi | URL | Keterangan |
|---|---|---|
| 🌐 Web Statis (CV) | [http://54.255.63.190](http://54.255.63.190) | Port 80 - Nginx |
| ⚙️ Berita & Jadwal Tur (Publik) | [http://54.255.63.190/app/](http://54.255.63.190/app/) | Port 80 → Reverse Proxy |
| ⚙️ Admin Dashboard (Rahasia) | [http://54.255.63.190/app/index.php?page=login](http://54.255.63.190/app/index.php?page=login) | Halaman Login Admin |

**Login Credentials Dashboard:**
| Username | Password | Role |
|---|---|---|
| `admin` | `password` | Administrator |
| `jibril` | `password` | Jibril Judex Facti Aliyudin |

*(Pastikan Security Group Inbound EC2 terbuka untuk port 22 dan 80)*

---

## 🏗 Penjelasan Arsitektur & Kriteria Penilaian

### 1. Arsitektur CI/CD Pipeline (Bobot 20%)
Proyek ini mengimplementasikan **dua pipeline GitHub Actions yang terisolasi** menggunakan teknik **Paths Filter**:
- `.github/workflows/deploy-statis.yml`: Hanya berjalan jika terdapat perubahan pada folder `web-statis/`.
- `.github/workflows/deploy-dinamis.yml`: Hanya berjalan jika terdapat perubahan pada folder `web-dinamis/`.

**Keuntungan**: Meminimalisir pemborosan *resource runner*. Setiap pipeline melakukan: **Build Image → Push ke Docker Hub → Deploy ke EC2 via SSH dan Docker Compose** secara otomatis. `deploy-statis` juga menggunakan Docker Compose untuk memastikan seluruh container berada dalam satu jaringan internal yang sama (`uas-network`).

### 2. Orkestrasi Docker Compose & Jaringan (Bobot 20%)
File `docker-compose.yml` disusun dengan **Best Practice**:
- **Jaringan Internal**: Semua kontainer berjalan di dalam `uas-network` (bridge).
- **DNS Internal**: `DATABASE_HOST=db` — Web Dinamis terkoneksi ke MariaDB via nama service, bukan IP. Web Statis (Reverse proxy) juga diarahkan ke `http://web-dinamis:80/`.
- **Port DB Tidak Diekspos**: Port MariaDB (3306) hanya bisa diakses dari dalam Docker network.
- **`depends_on`**: Kontainer `web-dinamis` menunggu database `db` siap sebelum menyala.
- **Persistent Volume**: `mariadb_data` menjaga data database tidak hilang saat container di-recreate.
- **Environment Variables**: Kredensial database disuntikkan via variabel, bukan hardcode.

### 3. Fungsionalitas Aplikasi & Automasi DB (Bobot 20%)
- **Web Statis (Port 80)**: Nginx Alpine menyajikan CV/Portfolio + bertindak sebagai **Reverse Proxy** (`/app/` → PHP App).
- **Web Dinamis**: Aplikasi "Echoes of Eternity" (Portal Berita & Jadwal Tur Band Metal) berbasis PHP 8.2 MVC dengan desain *Glassmorphism Premium Dashboard*.
  - `models/` → `NewsModel.php`, `TourModel.php`, `UserModel.php`
  - `views/` → `public.php`, `dashboard.php`, `login.php`, `layout.php`
  - `controllers/` → `PublicController.php`, `DashboardController.php`, `AuthController.php`
- **Fitur Login**: Session-based authentication dengan bcrypt password hashing (`password_verify`). Memisahkan akses publik (fans) dan rahasia (admin dashboard).
- **Automasi Database**: `init.sql` otomatis dieksekusi MariaDB via `/docker-entrypoint-initdb.d/` untuk seeding tabel `users`, `news`, dan `tours`.

### 4. Dokumentasi Teknis (Bobot 15%)
README ini menyertakan:
- ✅ Topologi arsitektur CI/CD
- ✅ Penjelasan environment & konfigurasi
- ✅ Tautan akses langsung ke IP AWS
- ✅ Screenshot bukti deploy (lihat di bawah)

### 5. Uji Coba Langsung (Live Test): Zero-Touch Deployment (Bobot 25%)
**Metode Pembuktian:**
Setiap kali `git push` dari VS Code lokal, GitHub Actions otomatis:
1. Build Docker Image baru
2. Push ke Docker Hub
3. SSH ke EC2 → Pull Image terbaru → Recreate Container via Docker Compose
4. Perubahan langsung terlihat di browser **tanpa intervensi manual**.

---

## 🛠 Bukti Screenshot Deploy

*(Tambahkan screenshot hasil deploy GitHub Actions yang Centang Hijau di sini)*
![Screenshot Actions Success](link-gambar-disini)

*(Tambahkan screenshot bukti UI Web Statis & Dinamis di EC2 di sini)*
![Screenshot Web Statis](link-gambar-disini)
![Screenshot Web Dinamis Dashboard](link-gambar-disini)

*(Tambahkan screenshot docker ps di EC2 di sini)*
![Screenshot Docker PS](link-gambar-disini)

---

## ⚙️ Konfigurasi Environment (Rahasia)
*Environment variables* disuntikkan secara aman menggunakan **GitHub Secrets**:

| Secret Key | Value |
|---|---|
| `AWS_HOST` | 54.255.63.190 |
| `AWS_USERNAME` | ubuntu |
| `AWS_PRIVATE_KEY` | [PEM SSH KEY] |
| `DOCKERHUB_USERNAME` | jibriljudex |
| `DOCKERHUB_TOKEN` | [DOCKER ACCESS TOKEN] |

# UAS Administrasi Server (Cloud Computing II)

![Topologi Arsitektur CI/CD](https://miro.medium.com/v2/resize:fit:1200/1*y6C4nSjvPAENEQYw7HAnQA.png)

## 📌 Identitas
- **Nama**: Jibril Judex Facti Aliyudin
- **Mata Kuliah**: Administrasi Server (Cloud Computing II)
- **Dosen**: Mohamad Firdaus, M.Kom.

---

## 🚀 Tautan Akses Live AWS EC2
Aplikasi di-deploy ke instansi EC2 AWS dan dapat diakses langsung pada IP publik berikut:
- 🌐 **Web Statis (CV Portfolio)**: [http://54.255.63.190:80](http://54.255.63.190:80)
- ⚙️ **Web Dinamis MVC (Guestbook)**: [http://54.255.63.190:3000](http://54.255.63.190:3000)

*(Pastikan Security Group Inbound EC2 terbuka untuk port 80 dan 3000)*

---

## 🏗 Penjelasan Arsitektur & Kriteria Penilaian

Repositori ini disusun secara khusus untuk memenuhi 5 Kriteria Penilaian UAS:

### 1. Arsitektur CI/CD Pipeline (Bobot 20%)
Proyek ini mengimplementasikan dua buah pipeline GitHub Actions yang terisolasi dan efisien menggunakan teknik **Paths Filter**:
- `.github/workflows/deploy-statis.yml`: Hanya berjalan jika terdapat perubahan pada folder `web-statis/`.
- `.github/workflows/deploy-dinamis.yml`: Hanya berjalan jika terdapat perubahan pada folder `web-dinamis/` atau file konfigurasi Docker Compose.
**Keuntungan**: Meminimalisir pemborosan *resource runner*. Skrip secara otomatis melakukan Build, Login Docker Hub, Push Image, lalu mengirim instruksi ke EC2 via SSH dan SCP untuk eksekusi peluncuran container.

### 2. Orkestrasi Docker Compose & Jaringan (Bobot 20%)
Penulisan `docker-compose.yml` dalam proyek ini disusun dengan struktur *Best Practice*:
- **Pemisahan Jaringan**: Semua kontainer berjalan di dalam `uas-network` berjenis *bridge*.
- **Variabel DNS Internal**: Web Dinamis terkoneksi ke MariaDB tidak menggunakan IP, melainkan memanggil `DATABASE_HOST=db`. Database tidak diekspos ke port publik sama sekali (Port DB tidak di-bind ke Host AWS), sangat mengamankan *credential*.
- **`depends_on`**: Kontainer `web-dinamis` dipastikan menunggu database `db` siap terlebih dahulu sebelum menyala.

### 3. Fungsionalitas Aplikasi & Automasi DB (Bobot 20%)
- **Web Statis**: Menggunakan Nginx (Port 80) dengan tema "Metal / Cyber" buatan sendiri tanpa framework.
- **Web Dinamis**: Menggunakan PHP 8.2 murni dengan arsitektur **MVC (Model-View-Controller)**. Telah dilengkapi proteksi *SQL Injection* menggunakan *PDO Driver*. (Berjalan pada Port 3000).
- **Automasi Database**: File `database/init.sql` otomatis dieksekusi oleh MariaDB melalui binding volume ke `/docker-entrypoint-initdb.d/init.sql` untuk men-seeding tabel dan dua data *Guestbook* awal.

### 4. Dokumentasi Teknis (Bobot 15%)
Dokumentasi repositori ini menyertakan penjelasan yang terstruktur, *environment setting*, serta ruang untuk *Screenshot Success Action*. (Lihat bagian bawah untuk tangkapan layar pengujian riwayat deploy/log).

### 5. Uji Coba Langsung (Live Test): Zero-Touch Deployment (Bobot 25%)
**Metode Pembuktian:** 
Setiap kali *git commit* dan *push* dijalankan dari VS Code lokal, GitHub Actions akan langsung menggulirkan pembaruan, melakukan image pullling pada Server AWS, dan kontainer ter-update otomatis tanpa waktu jeda (*downtime*) yang parah. **Tidak perlu intervensi manual masuk ke terminal AWS**. Semua auto-deploy secara *magic*!

---

## 🛠 Bukti Screenshot Deploy (Wajib Diisi Sebelum Submit)

*(Tambahkan screenshot hasil deploy GitHub Actions yang Centang Hijau di sini)*
![Screenshot Actions 1](link-gambar-disini)

*(Tambahkan screenshot bukti UI Web Statis & Dinamis di EC2 di sini)*
![Screenshot Web Berjalan](link-gambar-disini)

---

## Konfigurasi Environment (Rahasia)
*Environment variables* telah disuntikkan secara aman menggunakan **GitHub Secrets**:
- `AWS_HOST`: 54.255.63.190
- `AWS_USERNAME`: ubuntu
- `AWS_PRIVATE_KEY`: [PEM SSH KEY]
- `DOCKERHUB_USERNAME`: jibriljudex
- `DOCKERHUB_TOKEN`: [DOCKER ACCESS TOKEN]

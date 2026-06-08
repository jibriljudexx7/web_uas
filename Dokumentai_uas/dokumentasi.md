# Dokumentasi UAS – Administrasi Server (Cloud Computing II)

**Dosen Pengampu:** Mohamad Firdaus, M.Kom.

---

## Daftar Isi
1. [Langkah 1 – Persiapan Lingkungan](#langkah-1)
2. [Langkah 2 – Membuat Repository GitHub](#langkah-2)
3. [Langkah 3 – Menyiapkan Docker & Docker‑Compose](#langkah-3)
4. [Langkah 4 – Membuat CI/CD Pipeline (GitHub Actions)](#langkah-4)
5. [Langkah 5 – Deploy Aplikasi Statis (Web CV)](#langkah-5)
6. [Langkah 6 – Deploy Aplikasi Dinamis (Node/PHP/Python)](#langkah-6)
7. [Langkah 7 – Pengaturan Database MariaDB](#langkah-7)
8. [Langkah 8 – Pengujian Live Test & Auto‑Update](#langkah-8)
9. [Langkah 9 – Dokumentasi Teknis (README.md)](#langkah-9)
10. [Langkah 10 – Pengambilan Screenshot & Bukti](#langkah-10)
11. [Langkah 11 – Penilaian Akhir & Submit](#langkah-11)

---

### <a name="langkah-1"></a>Langkah 1 – Persiapan Lingkungan
![Langkah 1](image-1.png)
*Gambar menunjukkan persiapan server AWS EC2, instalasi Docker, Docker‑Compose, dan konfigurasi security group.*

### <a name="langkah-2"></a>Langkah 2 – Membuat Repository GitHub
![Langkah 2](image-2.png)
*Repositori dibuat dengan struktur folder `web-statis` dan `web-dinamis`, serta file `.github/workflows` untuk CI/CD.*

### <a name="langkah-3"></a>Langkah 3 – Menyiapkan Docker & Docker‑Compose
![Langkah 3](image-3.png)
*File `docker-compose.yml` berisi service untuk web‑statis, web‑dinamis, dan MariaDB dengan network internal.*

### <a name="langkah-4"></a>Langkah 4 – Membuat CI/CD Pipeline (GitHub Actions)
![Langkah 4](image-4.png)
*Workflow GitHub Actions (`deploy-statis.yml` & `deploy-dinamis.yml`) melakukan build image, push ke Docker Hub, dan deployment ke EC2 via SSH.*

### <a name="langkah-5"></a>Langkah 5 – Deploy Aplikasi Statis (Web CV)
![Langkah 5](image-5.png)
*Setelah pipeline selesai, aplikasi web‑statis dapat diakses pada port 80 melalui public IP AWS.*

### <a name="langkah-6"></a>Langkah 6 – Deploy Aplikasi Dinamis (Node/PHP/Python)
![Langkah 6](image-6.png)
*Contoh deploy aplikasi dinamis menggunakan PHP (atau Node.js/Python) dengan environment variable yang diperlukan.*

### <a name="langkah-7"></a>Langkah 7 – Pengaturan Database MariaDB
![Langkah 7](image-7.png)
*Database MariaDB di‑seed otomatis menggunakan skrip SQL pada folder `/docker-entrypoint-initdb.d/`.*

### <a name="langkah-8"></a>Langkah 8 – Pengujian Live Test & Auto‑Update
![Langkah 8](image-8.png)
*Demo perubahan kode lokal, commit, push, dan pipeline men‑update container secara otomatis tanpa downtime.*

### <a name="langkah-9"></a>Langkah 9 – Dokumentasi Teknis (README.md)
![Langkah 9](image-9.png)
*README berisi arsitektur, cara menjalankan, variabel lingkungan, dan link ke repository.*

### <a name="langkah-10"></a>Langkah 10 – Pengambilan Screenshot & Bukti
![Langkah 10](image-10.png)
*Screenshot hasil pipeline hijau, port mapping, serta tampilan aplikasi di browser.*

### <a name="langkah-11"></a>Langkah 11 – Penilaian Akhir & Submit
![Langkah 11](image-11.png)
*Mahasiswa menyiapkan laporan akhir, mengunggah ke portal UAS, dan menunggu penilaian akhir.*

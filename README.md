# NeoSID 🚀

**Sistem Informasi Desa Modern & Berdaya Saing Tinggi**

NeoSID adalah platform Sistem Informasi Desa (SID) mutakhir yang dirancang untuk mempercepat transformasi digital di tingkat desa. Dibangun dengan fokus pada kemudahan penggunaan, estetika modern, keamanan data, dan kinerja optimal, NeoSID siap mendukung desa-desa di seluruh Indonesia agar semakin mandiri dan berdaya saing tinggi.

---

## 🌟 Fitur Utama

- **Dashboard Modern**: Tampilan visual yang premium, bersih, dan interaktif dengan kemudahan navigasi yang intuitif.
- **Layanan Mandiri Warga**: Portal interaktif yang mempermudah warga untuk mengakses informasi, permohonan surat, dan data secara mandiri.
- **Desain Premium (Fresh Theme)**: Menggunakan tipografi modern (Inter/Outfit Font), *glassmorphism-style overlays*, dan transisi visual yang halus.
- **Manajemen Artikel & Berita**: Sistem publikasi informasi desa yang dinamis untuk mendukung transparansi dan komunikasi publik.
- **Transparansi Keuangan (APBDes)**: Visualisasi anggaran pendapatan dan belanja desa secara transparan melalui grafik dan widget interaktif.

---

## 🛠️ Persyaratan Sistem

Untuk menjalankan platform NeoSID secara lokal maupun di server hosting, pastikan lingkungan Anda memenuhi spesifikasi berikut:

- **Web Server**: Apache / Nginx
- **PHP Version**: v8.1+
- **Database Server**: MySQL / MariaDB (v10.4+)
- **OS**: Windows / Linux (Ubuntu, Debian, CentOS, CentOS Stream)

---

## 🚀 Panduan Instalasi Lokal

1. **Clone Repository**:
   ```bash
   git clone https://github.com/diskonnekted/neosid.git
   ```

2. **Konfigurasi Database**:
   - Impor struktur database awal (`opensid.sql` atau file sejenis jika tersedia).
   - Edit pengaturan database pada file `desa/config/database.php` dengan data MySQL Anda.

3. **Jalankan Aplikasi**:
   Akses url aplikasi Anda melalui browser:
   ```text
   http://localhost/neosid
   ```

---

## 📄 Hak Cipta dan Lisensi

Aplikasi ini dikembangkan berdasarkan **GNU General Public License Versi 3**. Bebas digunakan dan dikembangkan untuk memajukan pembangunan desa.

---

## 🤝 Kontribusi

Kami sangat mengapresiasi kontribusi dari berbagai pihak baik berupa pelaporan bug, saran fitur baru, maupun pengembangan kode sumber:

- **GitHub Repository**: [diskonnekted/neosid](https://github.com/diskonnekted/neosid)
- **Email**: arif.susilo@gmail.com

# WEMOS Water Monitoring System

Sistem monitoring dan kontrol penggunaan air berbasis IoT menggunakan WEMOS D1 Mini. Sistem ini memantau penggunaan air secara real-time, mengontrol aliran air melalui solenoid valve, serta menampilkan data dalam dashboard visual yang interaktif.

## 📋 Daftar Isi

- [Fitur Utama](#-fitur-utama)
- [Teknologi yang Digunakan](#-teknologi-yang-digunakan)
- [Persyaratan Sistem](#-persyaratan-sistem)
- [Instalasi](#-instalasi)
- [Konfigurasi Database](#-konfigurasi-database)
- [Struktur Proyek](#-struktur-proyek)
- [Cara Penggunaan](#-cara-penggunaan)
- [API Endpoints](#-api-endpoints)
- [Hardware Requirements](#-hardware-requirements)
- [Screenshot](#-screenshot)
- [Troubleshooting](#-troubleshooting)
- [Kontribusi](#-kontribusi)
- [Lisensi](#-lisensi)

## 🚀 Fitur Utama

- **Real-time Water Flow Monitoring** - Pemantauan aliran air secara langsung
- **Water Quality Monitoring** - Pemantauan kualitas air menggunakan sensor turbidity
- **Remote Water Control** - Kontrol solenoid valve ON/OFF melalui web dashboard
- **Payment Calculation** - Perhitungan biaya penggunaan air (harian/bulanan)
- **Data Visualization** - Grafik penggunaan air dengan Chart.js
- **User Authentication** - Sistem login untuk keamanan
- **Responsive Dashboard** - Dashboard yang responsif menggunakan Argon Dashboard template

## 🛠️ Teknologi yang Digunakan

### Backend
- **PHP** - Server-side scripting
- **MySQL** - Database management
- **AJAX** - Asynchronous data loading

### Frontend
- **HTML5/CSS3** - Markup dan styling
- **JavaScript/jQuery** - Client-side scripting
- **Bootstrap 5** - Responsive framework
- **Argon Dashboard** - Admin template
- **Chart.js** - Data visualization

### Hardware
- **WEMOS D1 Mini** - ESP8266 based microcontroller
- **Water Flow Sensor** - Sensor aliran air
- **Turbidity Sensor** - Sensor kekeruhan air
- **Solenoid Valve** - Katup elektrik untuk kontrol aliran

## 💻 Persyaratan Sistem

### Software
- Web Server (Apache/Nginx)
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web Browser modern (Chrome, Firefox, Edge)

### Hardware
- WEMOS D1 Mini (ESP8266)
- Water Flow Sensor (YF-S201 atau sejenisnya)
- Turbidity Sensor
- Solenoid Valve 12V
- Relay Module
- Power Supply 5V dan 12V

## 📥 Instalasi

### 1. Clone atau Download Proyek

```bash
git clone https://github.com/username/wemos-water-monitoring.git
cd wemos-water-monitoring
```

### 2. Setup Web Server

Pindahkan folder proyek ke direktori web server:

**Untuk XAMPP:**
```bash
cp -r wemos /opt/lampp/htdocs/
```

**Untuk Apache:**
```bash
cp -r wemos /var/www/html/
```

### 3. Start Web Server dan MySQL

**XAMPP:**
```bash
sudo /opt/lampp/lampp start
```

**Apache & MySQL:**
```bash
sudo systemctl start apache2
sudo systemctl start mysql
```

## 🗄️ Konfigurasi Database

### 1. Buat Database

Akses phpMyAdmin atau MySQL CLI:

```sql
CREATE DATABASE db_wemos;
USE db_wemos;
```

### 2. Buat Tabel yang Diperlukan

```sql
-- Tabel sensor untuk data water flow
CREATE TABLE tb_sensor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    water_flow FLOAT NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel turbidity untuk data kualitas air
CREATE TABLE tb_turbidity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    turbidity FLOAT NOT NULL,
    status VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel solenoid untuk kontrol valve
CREATE TABLE tb_selenoid (
    id INT AUTO_INCREMENT PRIMARY KEY,
    status TINYINT(1) DEFAULT 0,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabel user untuk autentikasi
CREATE TABLE tb_user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    role VARCHAR(20) DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert data solenoid default
INSERT INTO tb_selenoid (status) VALUES (0);

-- Insert user default (password: admin123)
INSERT INTO tb_user (username, password, nama_lengkap, role)
VALUES ('admin', MD5('admin123'), 'Administrator', 'admin');
```

### 3. Konfigurasi Koneksi Database

Edit file [pages/function.php](pages/function.php) jika diperlukan:

```php
$conn = mysqli_connect("localhost", "root", "", "db_wemos");
```

Sesuaikan:
- **Host**: localhost (atau IP server database)
- **Username**: root (atau username MySQL Anda)
- **Password**: "" (kosong atau password MySQL Anda)
- **Database**: db_wemos

## 📁 Struktur Proyek

```
wemos/
├── assets/              # Asset frontend (CSS, JS, Images)
│   ├── css/
│   ├── js/
│   └── img/
├── css/                 # Custom CSS files
├── jquery/              # jQuery library files
├── login/               # Halaman login
├── pages/               # PHP pages dan functions
│   ├── function.php     # Database connection & functions
│   ├── adduser.php      # Add user functionality
│   ├── delete.php       # Delete functionality
│   ├── clock.php        # Clock display
│   ├── selenoidvalve.php # Solenoid valve control
│   └── settings.php     # Settings page
├── docs/                # Dokumentasi tambahan
├── index.php            # Main dashboard
├── watercontrol.php     # Water control component
├── waterpayment.php     # Payment calculation component
├── waterusage.php       # Water usage display
├── ceksensor.php        # Sensor data API
├── bayar.php            # Payment API
├── fetch.php            # Data fetch API
├── grafik.php           # Chart data API
├── pembayaran.php       # Payment processing
├── clockvalve.php       # Valve timing
├── logout.php           # Logout handler
└── README.md            # Dokumentasi ini
```

## 🎯 Cara Penggunaan

### 1. Login ke Sistem

1. Buka browser dan akses: `http://localhost/wemos`
2. Login dengan kredensial default:
   - Username: `admin`
   - Password: `admin123`

### 2. Dashboard Utama

Setelah login, Anda akan melihat:
- **Water Flow Today** - Total penggunaan air hari ini
- **Water Control System** - Switch ON/OFF untuk solenoid valve
- **Water Payment** - Kalkulasi biaya (harian/bulanan)
- **Water Quality** - Status kualitas air dari sensor turbidity
- **Grafik Penggunaan** - Grafik penggunaan air per hari dalam bulan berjalan

### 3. Kontrol Solenoid Valve

1. Pada card "Water Control System"
2. Toggle switch untuk membuka/menutup valve
3. Status akan berubah menjadi ON/OFF
4. Posisi valve akan ditampilkan dengan timestamp

### 4. Melihat Pembayaran

1. Pada card "Water Payment"
2. Pilih periode: Daily Pay atau Monthly Pay
3. Sistem akan menghitung biaya berdasarkan penggunaan
4. Tarif: Rp 1.9 per liter

### 5. Monitoring Kualitas Air

- Lihat nilai turbidity pada dashboard
- Status air akan ditampilkan (Jernih/Keruh)

## 🔌 API Endpoints

### Sensor Data Endpoint
**GET** `/ceksensor.php`
- Mengembalikan nilai turbidity terkini
- Response: nilai float

### Water Control
**POST** `/pages/selenoidvalve.php`
- Mengontrol status solenoid valve
- Parameter: `status` (0/1)

### Payment Data
**POST** `/pembayaran.php`
- Menghitung biaya penggunaan air
- Parameter: `request` (pembayaranharian/bulanan)
- Response: formatted rupiah

### Valve Timing
**GET** `/clockvalve.php`
- Mendapatkan waktu terakhir valve diubah
- Response: timestamp

### Chart Data
**GET** `/grafik.php`
- Mendapatkan data untuk grafik penggunaan
- Response: JSON data tanggal dan penggunaan

## 🔧 Hardware Requirements

### Skema Koneksi WEMOS

```
WEMOS D1 Mini
├── D1 (GPIO5)  → Water Flow Sensor (Signal)
├── D2 (GPIO4)  → Relay Module (IN)
├── A0 (ADC)    → Turbidity Sensor (Analog Out)
├── 5V          → Sensor Power
└── GND         → Common Ground

Solenoid Valve
├── +12V        → Power Supply 12V
└── GND         → Relay NO/COM
```

### Komponen yang Dibutuhkan

| Komponen | Spesifikasi | Jumlah |
|----------|-------------|--------|
| WEMOS D1 Mini | ESP8266 | 1 |
| Water Flow Sensor | YF-S201 (1-30L/min) | 1 |
| Turbidity Sensor | Analog output | 1 |
| Solenoid Valve | 12V DC | 1 |
| Relay Module | 5V, 1 Channel | 1 |
| Power Supply | 5V 2A | 1 |
| Power Supply | 12V 1A | 1 |
| Kabel Jumper | Male-Female | Secukupnya |

### Kode Arduino untuk WEMOS

```cpp
// Akan ditambahkan file .ino untuk program WEMOS
// Fitur:
// - Membaca water flow sensor
// - Membaca turbidity sensor
// - Mengirim data ke server via HTTP POST
// - Menerima perintah kontrol valve
// - Koneksi WiFi
```

## 📸 Screenshot

*Screenshot akan ditambahkan di sini*

- Dashboard utama
- Water control interface
- Grafik penggunaan air
- Halaman login
- Settings panel

## 🐛 Troubleshooting

### Database Connection Error
**Problem:** `Warning: mysqli_connect(): (HY000/1045): Access denied`

**Solution:**
1. Periksa username dan password MySQL di `pages/function.php`
2. Pastikan MySQL service berjalan
3. Periksa privileges user MySQL

### Session Error
**Problem:** Tidak bisa login atau langsung logout

**Solution:**
1. Pastikan `session_start()` dipanggil di awal file
2. Periksa permission folder session PHP
3. Clear browser cache dan cookies

### WEMOS Tidak Terkoneksi
**Problem:** Data sensor tidak masuk ke database

**Solution:**
1. Periksa koneksi WiFi WEMOS
2. Pastikan IP server benar di kode Arduino
3. Periksa konfigurasi firewall
4. Test endpoint dengan Postman/curl

### Valve Tidak Merespon
**Problem:** Toggle switch tidak mengubah status valve

**Solution:**
1. Periksa koneksi relay ke WEMOS
2. Test relay secara manual
3. Periksa power supply untuk solenoid valve
4. Cek database apakah status berubah

## 🤝 Kontribusi

Kontribusi sangat diterima! Untuk berkontribusi:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

## 📝 Todo List

- [ ] Tambahkan kode Arduino (.ino) untuk WEMOS
- [ ] Implementasi notifikasi email/WhatsApp saat anomali
- [ ] Tambahkan export data ke CSV/Excel
- [ ] Implementasi user management lengkap
- [ ] Tambahkan historical data dengan rentang waktu custom
- [ ] Implementasi API untuk mobile app
- [ ] Tambahkan unit testing
- [ ] Dokumentasi API dengan Swagger/OpenAPI

## 📄 Lisensi

Proyek ini menggunakan lisensi MIT. Lihat file `LICENSE` untuk detail lebih lanjut.

## 👥 Author

**Dimas**
- GitHub: [@username](https://github.com/username)
- Email: your.email@example.com

## 🙏 Acknowledgments

- [Argon Dashboard](https://www.creative-tim.com/product/argon-dashboard) - Template dashboard
- [Chart.js](https://www.chartjs.org/) - Library grafik
- [Bootstrap](https://getbootstrap.com/) - CSS Framework
- Komunitas Arduino dan ESP8266 Indonesia

## 📞 Support

Jika Anda memiliki pertanyaan atau menemukan bug, silakan:
1. Buka [Issues](https://github.com/username/wemos-water-monitoring/issues)
2. Email ke: your.email@example.com
3. Diskusi di forum komunitas

---

**Made with ❤️ for IoT Water Monitoring**
# wemos-website

<?php

$siteName = 'KursusKu UIN';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');

require_once __DIR__ . '/helpers.php';

function rupiah(int $amount): string
{
    return 'Rp' . number_format($amount, 0, ',', '.');
}

function formatTanggal(string $date): string
{
    return date('d-m-Y', strtotime($date));
}

function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

function statusKursus(int $quota, int $registered): string
{
    $remaining = sisaKursi($quota, $registered);

    if ($remaining <= 0) {
        return 'Penuh';
    }

    if ($remaining <= 5) {
        return 'Hampir Penuh';
    }

    return 'Tersedia';
}

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21'
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22'
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24'
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28'
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01'
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03'
    ],
];

?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" 
  content="width=device-width, 
  initial-scale=1">

  <link rel="stylesheet" href="assets/css/style.css">

  <title><?= htmlspecialchars($siteName) ?></title>
</head>

<body> 
  <header class="site-header">
  <div class="container">
    <div class="nav-wrap">
      <nav aria-label="Navigasi utama"> 
        <a href="index.php" class="brand"><?= htmlspecialchars($siteName) ?></a> 
        <a href="index.php#katalog">Katalog</a>
        <a href="register.php">Daftar Kursus</a>
        <a href="#keunggulan">Keunggulan</a> 
        <a href="#alur">Cara Daftar</a> 
        <a href="#kontak">Kontak</a> 
      </nav>
    </div>
  </div>
</header>

  <main class="container">
    <!-- Hero Section Baru: Split Layout -->
<section class="hero-modern">
  <div class="container hero-wrapper">
    <div class="hero-text">
      <span class="badge">Pendaftaran Dibuka</span>
      <h1>Tingkatkan Karir Digital Anda Bersama Kami</h1>
      <p>Platform pembelajaran interaktif berbasis proyek dengan mentor profesional. Mulai perjalanan karir Anda dari nol hingga siap kerja.</p>
      <div class="hero-actions">
        <a href="#katalog" class="btn-primary">Lihat Katalog</a>
        <a href="fee-calculator.php" class="btn-outline">Estimasi Biaya</a>
      </div>
    </div>
    <div class="hero-visual">
      <!-- Anda bisa mengganti kotak ini dengan tag <img> nantinya -->
      <img src="assets/images/hero-kursus.jpg" alt="Ilustrasi Belajar Kursus" class="hero-image">
    </div>
  </div>
</section>

<!-- Keunggulan Section Baru: Icon Cards -->
<section class="features-modern" id="keunggulan">
  <div class="container">
    <div class="section-header">
      <h2>Nilai Tambah Program Kami</h2>
      <p>Metode pembelajaran yang dirancang khusus untuk kesuksesan Anda.</p>
    </div>
    
    <div class="features-grid">
      <article class="feature-card">
        <div class="feature-icon">🎯</div>
        <h3>Materi Terarah</h3>
        <p>Kurikulum disusun secara bertahap dari pemahaman dasar hingga implementasi praktik nyata.</p>
      </article>
      
      <article class="feature-card">
        <div class="feature-icon">💻</div>
        <h3>Belajar Berbasis Proyek</h3>
        <p>Setiap tahapan belajar akan menghasilkan portofolio berupa aplikasi yang dapat berfungsi.</p>
      </article>
      
      <article class="feature-card">
        <div class="feature-icon">🤝</div>
        <h3>Pendampingan Intensif</h3>
        <p>Evaluasi rutin dan demonstrasi langsung untuk memastikan mahasiswa memahami setiap materi.</p>
      </article>
    </div>
  </div>
</section>

   <section id="katalog">
    <h2>Katalog Kursus</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; width: 100%;">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kursus</th>
                <th>Biaya</th>
                <th>Mulai</th>
                <th>Sisa Kursi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['code']) ?></td>
                    <td><?= htmlspecialchars(trim($course['name'])) ?></td>
                    <td><?= rupiah($course['fee']) ?></td>
                    <td><?= formatTanggal($course['start_date']) ?></td>
                    <td><?= sisaKursi($course['quota'], $course['registered']) ?></td>
                    <td><strong><?= statusKursus($course['quota'], $course['registered']) ?></strong></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

    <section id="alur">
      <h2>Cara Mendaftar</h2>
      <ol>
        <li>Pilih kursus yang diminati.</li>
        <li>Isi form pendaftaran.</li>
        <li>Periksa kembali data.</li>
        <li> Kirim pendaftaran dan tunggu konfirmasi. </li>
      </ol>
    </section>
    <section id="media">
      <h2>Kenali Program Kami</h2> <img src="assets/images/hero-kursus.jpg" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer" width="640">
      <h3>Video Singkat</h3> <video controls width="640">
        <source src="assets/video/intro-kursus.mp4" type="video/mp4"> Browser Anda tidak mendukung video HTML5.
      </video>
      <p> <a href="https://www.php.net/" target="_blank" rel="noopener"> Dokumentasi PHP </a> </p>
    </section>
    <section id="kontak">
      <h2>Kontak</h2>
      <p> Email: junandahanif2406@gmail.com </p>
      <p> Alamat: UIN Sjech M Djamil Djambek </p>
    </section>
  </main>
  <footer> <small> &copy; <?= $year ?> <?= htmlspecialchars($siteName) ?> </small> </footer>
</body>

</html>
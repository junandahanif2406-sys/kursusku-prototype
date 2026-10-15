<?php

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Mengambil data dari form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');

$courseCode = $_POST['course_code'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$learningMode = $_POST['learning_mode'] ?? '';

$packageCount = (int) ($_POST['package_count'] ?? 1);

$notes = trim($_POST['notes'] ?? '');

$interests = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}


// Memastikan minat yang dikirim sesuai dengan pilihan yang tersedia
$allowedInterestKeys = array_keys($interestOptions);

$interests = array_values(
    array_intersect($interests, $allowedInterestKeys)
);


// ==========================
// VALIDASI
// ==========================

$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($phone === '') {
    $errors[] = 'Nomor HP wajib diisi.';
}

if ($studyProgram === '') {
    $errors[] = 'Program studi wajib diisi.';
}


// Mencari kursus berdasarkan kode
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
}


// Validasi tipe peserta
if (!in_array(
    $participantType,
    ['mahasiswa', 'guru', 'umum'],
    true
)) {
    $errors[] = 'Tipe peserta tidak valid.';
}


// Validasi metode belajar
if (!in_array(
    $learningMode,
    ['offline', 'online', 'hybrid'],
    true
)) {
    $errors[] = 'Metode belajar tidak valid.';
}


// Validasi jumlah paket
if (!in_array(
    $packageCount,
    [1, 2, 3],
    true
)) {
    $errors[] = 'Jumlah paket tidak valid.';
}

// JIKA ADA ERROR
if ($errors !== []) {
    http_response_code(422);
    ?>

    <!doctype html>
    <html lang="id">
    <!-- Tampilan pesan error-->
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
              content="width=device-width, initial-scale=1">

        <title>Data Belum Valid - KursusKu</title>

        <link rel="stylesheet"
              href="assets/css/style.css">
    </head>

    <body>

    <main class="container">

        <h1>Data Belum Dapat Diproses</h1>

        <ul>

            <?php foreach ($errors as $error): ?>

                <li><?= e($error) ?></li>

            <?php endforeach; ?>

        </ul>

        <a class="btn-link"
           href="register.php">
            Kembali ke Form
        </a>

    </main>

    </body>

    </html>

    <?php

    exit;
}


// ==========================
// PERHITUNGAN BIAYA
// ==========================

// Menentukan persentase diskon
$discountPercent =
    getDiscountPercent($participantType);

// Harga kursus × jumlah paket
$grossTotal =
    $course['fee'] * $packageCount;

// Menghitung nominal diskon
$discountAmount =
    intdiv(
        $grossTotal * $discountPercent,
        100
    );

// Total setelah diskon
$finalTotal =
    $grossTotal - $discountAmount;


// ==========================
// METODE BELAJAR
// ==========================

$learningModeLabel =
    getLearningModeLabel($learningMode);

?>

<!doctype html>

<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Hasil Pendaftaran - KursusKu UIN</title>

    <link rel="stylesheet"
          href="assets/css/style.css">

</head>

<body>

<header class="site-header">

    <div class="container nav-wrap">

        <a class="brand"
           href="index.php">
            KursusKu UIN
        </a>

        <nav aria-label="Navigasi utama">

            <a href="index.php">
                Beranda
            </a>

            <a href="index.php#katalog">
                Katalog
            </a>

            <a href="register.php">
                Daftar
            </a>

        </nav>

    </div>

</header>


<main class="container result-page">

    <section class="alert-success">

        <h1>Pendaftaran Berhasil Diproses</h1>

        <p>
            Berikut adalah ringkasan data pendaftaran Anda.
        </p>

    </section>


    <section class="summary-card">

        <dl class="summary-list">

            <dt>Nama</dt>
            <dd><?= e($name) ?></dd>


            <dt>Email</dt>
            <dd><?= e($email) ?></dd>


            <dt>Nomor HP</dt>
            <dd><?= e($phone) ?></dd>


            <dt>Program Studi</dt>
            <dd><?= e($studyProgram) ?></dd>


            <dt>Kursus</dt>
            <dd><?= e($course['name']) ?></dd>


            <dt>Tipe Peserta</dt>
            <dd><?= e($participantType) ?></dd>


            <dt>Metode Belajar</dt>
            <dd><?= e($learningModeLabel) ?></dd>


            <dt>Jumlah Paket</dt>
            <dd><?= $packageCount ?></dd>

        </dl>


        <h2>Rincian Biaya</h2>

        <p>
            Subtotal:
            <?= formatRupiah($grossTotal) ?>
        </p>

        <p>
            Diskon:
            <?= $discountPercent ?>%
            (-<?= formatRupiah($discountAmount) ?>)
        </p>

        <p>

            <strong>
                Total Akhir:
                <?= formatRupiah($finalTotal) ?>
            </strong>

        </p>


        <h2>Minat Belajar</h2>

        <ul>

            <?php if ($interests === []): ?>

                <li>Belum memilih minat.</li>

            <?php else: ?>

                <?php foreach ($interests as $interest): ?>

                    <?php
                    $label =
                        $interestOptions[$interest]
                        ?? $interest;
                    ?>

                    <li>
                        <?= e($label) ?>
                    </li>

                <?php endforeach; ?>

            <?php endif; ?>

        </ul>


        <h2>Catatan</h2>

        <p>
            <?= e($notes) ?>
        </p>


        <a class="btn-link"
           href="register.php">
            Kembali ke Form
        </a>

    </section>

</main>

</body>

</html>
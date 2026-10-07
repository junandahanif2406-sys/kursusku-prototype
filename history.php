<?php

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Riwayat Pendaftaran - KursusKu UIN</title>

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

            <a href="history.php">
                Riwayat
            </a>

        </nav>

    </div>

</header>


<main class="container">

    <section class="page-intro">

        <p class="eyebrow">
            Riwayat Pendaftaran
        </p>

        <h1>
            Riwayat Kursus
        </h1>

        <p>
            Halaman ini menampilkan contoh data riwayat
            pendaftaran kursus.
        </p>

    </section>


    <section class="summary-card">

        <h2>
            Data Pendaftaran
        </h2>

        <?php

        /*
         * Data latihan untuk simulasi riwayat.
         * Data ini belum menggunakan database.
         */

        $history = [

            [
                'name' => 'Junanda',
                'course_code' => 'php',
                'participant_type' => 'mahasiswa',
                'learning_mode' => 'online',
                'package_count' => 2,
                'status' => 'Diproses',
            ],

            [
                'name' => 'Fadli',
                'course_code' => 'web',
                'participant_type' => 'mahasiswa',
                'learning_mode' => 'offline',
                'package_count' => 1,
                'status' => 'Selesai',
            ],

            [
                'name' => 'Maulana',
                'course_code' => 'laravel',
                'participant_type' => 'umum',
                'learning_mode' => 'hybrid',
                'package_count' => 1,
                'status' => 'Diproses',
            ],

        ];

        ?>

        <?php if ($history === []): ?>

            <p>
                Belum ada riwayat pendaftaran.
            </p>

        <?php else: ?>

            <div class="table-wrap">

                <table>

                    <thead>

                        <tr>

                            <th>
                                No.
                            </th>

                            <th>
                                Nama
                            </th>

                            <th>
                                Kursus
                            </th>

                            <th>
                                Tipe Peserta
                            </th>

                            <th>
                                Metode Belajar
                            </th>

                            <th>
                                Jumlah Paket
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php foreach ($history as $index => $item): ?>

                            <?php

                            $course =
                                findCourse(
                                    $courses,
                                    $item['course_code']
                                );

                            $courseName =
                                $course['name']
                                ?? 'Kursus tidak ditemukan';

                            $learningModeLabel =
                                getLearningModeLabel(
                                    $item['learning_mode']
                                );

                            ?>

                            <tr>

                                <td>
                                    <?= $index + 1 ?>
                                </td>

                                <td>
                                    <?= e($item['name']) ?>
                                </td>

                                <td>
                                    <?= e($courseName) ?>
                                </td>

                                <td>
                                    <?= e($item['participant_type']) ?>
                                </td>

                                <td>
                                    <?= e($learningModeLabel) ?>
                                </td>

                                <td>
                                    <?= (int) $item['package_count'] ?>
                                </td>

                                <td>
                                    <?= e($item['status']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php endif; ?>


        <div class="form-group">

            <a class="btn-link"
               href="register.php">
                Tambah Pendaftaran
            </a>

        </div>

    </section>

</main>

</body>

</html>
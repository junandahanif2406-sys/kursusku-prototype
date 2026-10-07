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

    <title>Loop Lab - KursusKu UIN</title>

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
            Loop Lab
        </p>

        <h1>
            Latihan Perulangan PHP
        </h1>

        <p>
            Halaman latihan untuk memahami
            for, while, do-while, dan foreach.
        </p>

    </section>


    <!-- FOR -->

    <section class="summary-card">

        <h2>
            1. Perulangan For
        </h2>

        <p>
            Perulangan for digunakan ketika jumlah
            pengulangan sudah diketahui.
        </p>

        <?php

        for ($i = 1; $i <= 5; $i++) {

            echo "Pertemuan ke-$i<br>";

        }

        ?>

    </section>


    <!-- WHILE -->

    <section class="summary-card">

        <h2>
            2. Perulangan While
        </h2>

        <p>
            Perulangan while berjalan selama
            kondisinya masih benar.
        </p>

        <?php

        $i = 1;

        while ($i <= 5) {

            echo "Nomor antrean: $i<br>";

            $i++;

        }

        ?>

    </section>


    <!-- DO-WHILE -->

    <section class="summary-card">

        <h2>
            3. Perulangan Do-While
        </h2>

        <p>
            Perulangan do-while menjalankan blok
            kode terlebih dahulu, kemudian mengecek kondisi.
        </p>

        <?php

        $i = 1;

        do {

            echo "Percobaan ke-$i<br>";

            $i++;

        } while ($i <= 5);

        ?>

    </section>


    <!-- FOREACH -->

    <section class="summary-card">

        <h2>
            4. Perulangan Foreach
        </h2>

        <p>
            Foreach digunakan untuk membaca setiap
            item di dalam array.
        </p>

        <ul>

            <?php foreach ($courses as $course): ?>

                <li>

                    <?= e($course['name']) ?>

                    -

                    <?= formatRupiah($course['fee']) ?>

                </li>

            <?php endforeach; ?>

        </ul>

    </section>

<section class="summary-card">

    <h2>
        Daftar Fasilitas
    </h2>

    <ul>

        <?php foreach ($facilities as $facility): ?>

            <li>
                <?= e($facility) ?>
            </li>

        <?php endforeach; ?>

    </ul>

</section>

    <!-- PERBANDINGAN -->

    <section class="summary-card">

        <h2>
            Perbandingan Jenis Loop
        </h2>

        <ul>

            <li>
                <strong>for:</strong>
                jumlah pengulangan sudah diketahui.
            </li>

            <li>
                <strong>while:</strong>
                kondisi diperiksa sebelum blok dijalankan.
            </li>

            <li>
                <strong>do-while:</strong>
                blok dijalankan terlebih dahulu,
                kemudian kondisi diperiksa.
            </li>

            <li>
                <strong>foreach:</strong>
                digunakan untuk membaca setiap item array.
            </li>

        </ul>

    </section>


    <section class="summary-card">

        <a class="btn-link"
           href="index.php">
            Kembali ke Beranda
        </a>

    </section>

</main>

</body>

</html>
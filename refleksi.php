<?php

$refleksi = [
    [
        'judul' => 'Perbedaan radio dan checkbox',
        'isi' => 'Radio digunakan ketika pengguna hanya boleh memilih satu pilihan, sedangkan checkbox digunakan ketika pengguna dapat memilih lebih dari satu pilihan.'
    ],
    [
        'judul' => 'Mengapa checkbox menggunakan []?',
        'isi' => 'Tanda [] digunakan agar beberapa pilihan checkbox dapat dikirim sebagai array ke PHP. Pada program ini digunakan pada name="interests[]".'
    ],
    [
        'judul' => 'Mengapa menggunakan foreach?',
        'isi' => 'foreach digunakan untuk membaca setiap item dalam array satu per satu. Pada program ini digunakan untuk menampilkan pilihan kursus, minat, fasilitas, dan data riwayat.'
    ],
    [
        'judul' => 'Mengapa menggunakan branching untuk diskon?',
        'isi' => 'Branching digunakan karena persentase diskon berbeda berdasarkan jenis peserta. Mahasiswa mendapat diskon 20%, guru 15%, sedangkan umum tidak mendapat diskon.'
    ],
    [
        'judul' => 'Mengapa perhitungan total dilakukan secara berurutan?',
        'isi' => 'Perhitungan dilakukan mulai dari harga kursus dikalikan jumlah paket, kemudian menentukan nominal diskon, lalu mengurangi subtotal dengan diskon untuk mendapatkan total akhir.'
    ],
    [
        'judul' => 'Apa fungsi ?? pada input POST?',
        'isi' => 'Operator ?? digunakan untuk memberikan nilai cadangan apabila data POST tidak tersedia. Contohnya adalah $name = trim($_POST["name"] ?? "").'
    ],
    [
        'judul' => 'Mengapa menggunakan htmlspecialchars()?',
        'isi' => 'htmlspecialchars() digunakan ketika menampilkan data dari pengguna agar karakter khusus HTML tidak langsung dianggap sebagai kode HTML.'
    ],
    [
        'judul' => 'Mengapa program belum menggunakan database?',
        'isi' => 'Program belum menggunakan database karena praktikum ini berfokus pada PHP dasar, form, array, validasi, percabangan, perulangan, dan pemrosesan data.'
    ]
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Refleksi Praktikum - KursusKu UIN</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            line-height: 1.6;
        }

        h1 {
            text-align: center;
        }

        .item {
            margin-bottom: 25px;
        }

        .item h2 {
            font-size: 18px;
        }

        .item p {
            text-align: justify;
        }

        button {
            padding: 10px 18px;
            cursor: pointer;
        }

        @media print {
            button {
                display: none;
            }
        }

    </style>

</head>

<body>

<h1>Refleksi Praktikum PHP</h1>

<?php foreach ($refleksi as $index => $item): ?>

    <div class="item">

        <h2>
            <?= $index + 1 ?>.
            <?= htmlspecialchars($item['judul']) ?>
        </h2>

        <p>
            <?= htmlspecialchars($item['isi']) ?>
        </p>

    </div>

<?php endforeach; ?>

<button onclick="window.print()">
    Cetak / Simpan sebagai PDF
</button>

</body>

</html>
<?php

$tests = [
    [
        'no' => 1,
        'skenario' => 'Mahasiswa + Web Dasar + 1 paket',
        'harapan' => 'Rp240.000',
        'aktual' => 'Rp240.000',
        'status' => 'Berhasil'
    ],
    [
        'no' => 2,
        'skenario' => 'Guru + PHP Dasar + 1 paket',
        'harapan' => 'Rp340.000',
        'aktual' => 'Rp340.000',
        'status' => 'Berhasil'
    ],
    [
        'no' => 3,
        'skenario' => 'Umum + Laravel Dasar + 1 paket',
        'harapan' => 'Rp500.000',
        'aktual' => 'Rp500.000',
        'status' => 'Berhasil'
    ],
    [
        'no' => 4,
        'skenario' => 'Mahasiswa + Web Dasar + 2 paket',
        'harapan' => 'Rp480.000',
        'aktual' => 'Rp480.000',
        'status' => 'Berhasil'
    ],
    [
        'no' => 5,
        'skenario' => 'Nama kosong',
        'harapan' => 'Nama wajib diisi',
        'aktual' => 'Sesuai',
        'status' => 'Berhasil'
    ],
    [
        'no' => 6,
        'skenario' => 'Email tidak valid',
        'harapan' => 'Format email tidak valid',
        'aktual' => 'Sesuai',
        'status' => 'Berhasil'
    ],
    [
        'no' => 7,
        'skenario' => 'Tidak memilih minat',
        'harapan' => 'Tidak ada warning',
        'aktual' => 'Sesuai',
        'status' => 'Berhasil'
    ],
    [
        'no' => 8,
        'skenario' => 'Memilih 3 minat',
        'harapan' => 'Semua 3 minat muncul',
        'aktual' => 'Sesuai',
        'status' => 'Berhasil'
    ],
    [
        'no' => 9,
        'skenario' => 'Metode offline',
        'harapan' => 'Tatap Muka',
        'aktual' => 'Tatap Muka',
        'status' => 'Berhasil'
    ],
    [
        'no' => 10,
        'skenario' => 'Metode hybrid',
        'harapan' => 'Hybrid',
        'aktual' => 'Hybrid',
        'status' => 'Berhasil'
    ],
    [
        'no' => 11,
        'skenario' => 'Akses langsung process.php',
        'harapan' => 'Redirect ke register.php',
        'aktual' => 'Redirect',
        'status' => 'Berhasil'
    ],
    [
        'no' => 12,
        'skenario' => 'Menambah fasilitas baru',
        'harapan' => 'Fasilitas baru muncul',
        'aktual' => 'Muncul',
        'status' => 'Berhasil'
    ]
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Test Matrix KursusKu UIN</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            text-align: center;
        }

        .status {
            text-align: center;
            font-weight: bold;
        }

        @media print {

            body {
                margin: 20px;
            }

            button {
                display: none;
            }

        }

    </style>

</head>

<body>

<h1>Tabel Test Matrix Pengujian Program</h1>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Skenario Pengujian</th>
            <th>Hasil yang Diharapkan</th>
            <th>Hasil Aktual</th>
            <th>Status</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($tests as $test): ?>

            <tr>

                <td>
                    <?= $test['no'] ?>
                </td>

                <td>
                    <?= htmlspecialchars($test['skenario']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($test['harapan']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($test['aktual']) ?>
                </td>

                <td class="status">
                    <?= htmlspecialchars($test['status']) ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<br>

<button onclick="window.print()">
    Cetak / Simpan sebagai PDF
</button>

</body>

</html>
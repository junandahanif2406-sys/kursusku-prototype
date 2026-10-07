# AI Usage Log - Pertemuan 6

| Masalah/Tujuan | Referensi dari AI | Keputusan Pengembang | Hasil Uji |
|---|---|---|---|
| Aturan biaya berdasarkan jenis peserta | Memahami cara menentukan diskon berdasarkan tipe peserta. | Menggunakan diskon 20% untuk mahasiswa, 15% untuk guru, dan 0% untuk umum. | Mahasiswa + Web Dasar = Rp240.000; Guru + PHP Dasar = Rp340.000; Umum + Laravel Dasar = Rp500.000. |
| Jumlah paket kursus | Memahami penggunaan perulangan untuk membuat pilihan jumlah paket. | Menggunakan `for` untuk menghasilkan pilihan 1–3 paket. | Pilihan 1, 2, dan 3 paket tampil pada form. |
| Minat tambahan kosong | Memahami cara menangani checkbox yang tidak dipilih. | Menggunakan array kosong sebagai nilai default dan menampilkan pesan khusus. | Ringkasan menampilkan "Belum memilih minat." tanpa warning. |
| Multiple checkbox | Memahami penggunaan `[]` pada checkbox agar beberapa pilihan dapat dikirim sebagai array. | Menggunakan `name="interests[]"` dan `foreach` pada halaman hasil. | Beberapa minat yang dipilih dapat tampil seluruhnya pada ringkasan. |
| Fasilitas kursus | Memahami penggunaan `foreach` untuk menampilkan data dari array. | Fasilitas disimpan dalam array `$facilities` dan ditampilkan menggunakan `foreach`. | Fasilitas baru yang ditambahkan ke array dapat muncul otomatis. |
| Ringkasan pendaftaran | Memahami cara menampilkan kembali data yang dikirim melalui form. | Membuat `process.php` untuk menampilkan data peserta, kursus, biaya, minat, metode belajar, dan catatan. | Ringkasan pendaftaran berhasil ditampilkan sesuai data yang dikirim. |
| Perulangan PHP | Memahami perbedaan `for`, `while`, `do-while`, dan `foreach`. | Membuat `loop-lab.php` untuk mencoba keempat jenis perulangan tersebut. | Keempat jenis perulangan berhasil dijalankan. |
| Validasi form | Memahami cara memeriksa data input yang kosong atau tidak valid. | Menambahkan validasi nama, email, nomor HP, program studi, kursus, tipe peserta, metode belajar, dan jumlah paket. | Input nama kosong dan email tidak valid menghasilkan pesan error. |
|
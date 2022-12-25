<!DOCTYPE html>
<html>

<head>
    <title><?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <style>
    .nav-link.active {
        color: red;
    }
    </style>
</head>

<body>

    <nav id="navbar_top" class="navbar navbar-dark fixed-top navbar-expand-lg bg-" style="background-color: #FF8C00;">
        <div class="container">
            <a class="navbar-brand fs-2" href="<?= BASEURL; ?>\HomeAdmin\index">Risol Mayo LPG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link mb-0 h1 fs-5" aria-current="page" href="<?= BASEURL; ?>\HomeAdmin\index">Home</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>\Admin\tampilkanAkunAdmin">Akun</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>\Admin\halamanLihatHarga">Harga Produk</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>\Admin\halamanLihatStok">Stok Produk</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>\Admin\halamanLaporan">Lihat Laporan</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>\Admin\halamanTambahKaryawan">Tambah
                        Karyawan</a>
                </div>
            </div>
        </div>
    </nav>
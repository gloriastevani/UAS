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
            <a class="navbar-brand fs-2" href="<?= BASEURL; ?>\homecustomer\index">Risol Mayo LPG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link mb-0 h1 fs-5" aria-current="page"
                        href="<?= BASEURL; ?>/homecustomer/index">Home</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/customer/halamanPemesanan">Pesan</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/customer/tampilkanAkunCustomer">Akun</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/customer/lihatKeranjang">Lihat Keranjang</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/about/halamanCustomer">About Us</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/contact/halamanCustomer">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
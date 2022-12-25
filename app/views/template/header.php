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
            <a class="navbar-brand fs-2" href="<?= BASEURL; ?>">Risol Mayo LPG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link mb-0 h1 fs-5" aria-current="page" href="<?= BASEURL; ?>">Home</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/login">Login</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/about">About Us</a>
                    <a class="nav-link mb-0 h1 fs-5" href="<?= BASEURL; ?>/contact">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>
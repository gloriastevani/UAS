<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br>
<div class="container mt-5">
    <h1>Laporan</h1>
    <form action="<?= BASEURL; ?>/Admin/lihatLaporan" method="post">
        <span>Pilih rentang tanggal: </span>
        <input type="date" name="tanggalAwal" />
        <span>-</span>
        <input type="date" name="tanggalAkhir" />
        <br>
        <button class=" mt-3 aturTombol" type="submit" style="padding: 8px 16px;" name="cari">Cari</button>
        <a href="<?= BASEURL; ?> /HomeAdmin/index"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </form>
</div>
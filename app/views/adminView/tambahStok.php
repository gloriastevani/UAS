<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br>
<div class="container mt-5">
    <h1>Tambah Stok Risol</h1>
    <form action="<?= BASEURL; ?>/Admin/tambahStok" method="post">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">Nama Produk</th>
        <th scope="col">Jumlah Stok</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><div class=" mb-3">
                <select name="daftar" id="daftar">
                <?php foreach($data['daftarNama'] as $namaR) {?>
                    <option value="<?php echo $namaR['namaRisol']; ?>"><?php echo $namaR['namaRisol']; ?></option>
                <?php }; ?>
                </select>
            </div></td>
            <td><input type="number" name="kolomTambahStok" required></td>
        </tr>
    </tbody>
    </table>
    <button class=" mt-3 aturTombol" type="submit" style="padding: 8px 16px;" name="simpan">Simpan</button>
    <a href="<?= BASEURL; ?> /Admin/halamanLihatStok"><button class="btn btn-danger fs-6" type="button"
        name="kembali">Kembali</button></a> 
    </form>
</div>
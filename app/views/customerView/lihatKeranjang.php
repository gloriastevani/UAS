<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturKeranjang.css">
<br><br><br><br>
<div class="container">
    <div style="text-align: center;">
        <h1>Keranjang</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nomor Nota</th>
                    <th scope="col">Tanggal Beli</th>
                    <th scope="col">Total Bayar</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Tanggal Antar</th>
                    <th scope="col">Tanggal Bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1;
                foreach($data['dataPemesanan'] as $data){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $data['noNota']; ?></td>
                    <td><?php echo $data['tglBeli']; ?></td>
                    <td><?php echo 'Rp ' . $data['totalBayar']; ?></td>
                    <td><?php echo $data['diskon'] . '%'; ?></td>
                    <td><?php echo $data['tglAntar']; ?></td>
                    <td><?php echo $data['tglBayar']; ?></td>
                </tr>
                <?php
                    $nomor++; } ?>
            </tbody>
        </table>
        <a href="<?= BASEURL; ?> /customer/halamanRevisi"><button style="padding: 8px 15px;" class="aturBtn fs-6"
                type="button" name="revisiPesanan">Revisi Pesanan</button></a>
        <a href="<?= BASEURL; ?> /customer/halamanBatalPesan"><button style="padding: 8px 15px;" class="aturBtn fs-6"
                type="button" name="batalPesan">Batalkan Pesanan</button></a>
        <a href="<?= BASEURL; ?> /HomeCustomer/index"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </div>
</div>
<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRevisiPesanan.css">
<br><br><br><br>
<div class="container">
    <div style="text-align: center;">
        <h1>Revisi Pesanan</h1>
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
                foreach($data['dataPemesanan'] as $d){ ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $d['noNota']; ?></td>
                    <td><?php echo $d['tglBeli']; ?></td>
                    <td><?php echo 'Rp ' . $d['totalBayar']; ?></td>
                    <td><?php echo $d['diskon'] . '%'; ?></td>
                    <td><?php echo $d['tglAntar']; ?></td>
                    <td><?php echo $d['tglBayar']; ?></td>
                    <form action="<?= BASEURL; ?>/customer/tampilanRevisiPesanan" method="post">
                        <td><button class="btn aturBtnRevisi" style="padding: 5px 10px; font-size: 15px;" type="submit"
                                value="<?= $d['noNota']; ?>" name="btnRevisi">Ubah</button>
                        </td>
                    </form>
                </tr>
                <?php
                    $nomor++; } ?>
            </tbody>
        </table>
        <a href="<?= BASEURL; ?> /customer/lihatKeranjang"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </div>
</div>
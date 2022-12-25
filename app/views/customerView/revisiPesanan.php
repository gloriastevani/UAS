<br><br><br><br>
<div class="container">
    <h2 style="text-align: center;">Revisi Pesanan</h2>
    <br>
    <form action="<?= BASEURL; ?>/customer/revisiPesanan" method="post">
        <input type="hidden" name="noNota" value="<?php echo $data1['detailPesanan'][0]['noNota'] ?>">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <img src="<?= BASEURL; ?>/img/risolmayo.jpeg" width="250px">
                    <div style="font-size: 20px;"><i><?php echo $data2['dataRisol'][0]['namaRisol'] ?></i></div>
                    <div>Harga: Rp <?php echo $data2['dataRisol'][0]['harga'] ?> /pcs</div>
                    <br>
                    <p>Isian risol : Smoked beef, Telur, Mayonais.
                        Creamy didalam renyah diluar. Menggunakan tepung panir klasik, tipis tetapi tetap renyah. Kulit
                        risoles produksi sendiri menggunakan telur dan tepung pilihan sehingga lembut dan wangi. Dikirim
                        dalam kondisi sudah digoreng.</p>
                </div>
                <div class="col" style="text-align: left;">
                    <br><br><br><br>
                    <div class=" mb-3">
                        <div>Jumlah Stok: <?php echo $data2['dataRisol'][0]['jumlahStok'] ?></div>
                    </div>
                    <div class=" mb-3">
                        <label for="jmlPesanMatang" class="form-label">Jumlah Pesanan:</label>
                        <input type="number" class="form-control" id="jmlPesanMatang" name="jmlPesanMatang"
                            maxlength="5" value="<?php echo $data1['detailPesanan'][0]['jumlahItem']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <img src="<?= BASEURL; ?>/img/risolmayofrozen.jpeg" width="250px">
                    <div style="font-size: 20px;"><i><?php echo $data2['dataRisol'][1]['namaRisol'] ?></i></div>
                    <div>Harga: Rp <?php echo $data2['dataRisol'][1]['harga'] ?> /pcs</div>
                    <br>
                    <p>Isian Risol : Smoked beef, Telur, Mayonais.
                        Creamy didalam renyah diluar. Menggunakan tepung panir klasik, tipis tetapi tetap renyah. Kulit
                        risoles produksi sendiri menggunakan telur dan tepung pilihan sehingga lembut dan wangi. Dikirim
                        dalam kondisi belum digoreng.</p>
                </div>
                <div class="col" style="text-align: left;">
                    <br><br><br><br>
                    <div class=" mb-3">
                        <div>Jumlah Stok: <?php echo $data2['dataRisol'][1]['jumlahStok'] ?></div>
                    </div>
                    <div class=" mb-3">
                        <label for="jmlPesanBeku" class="form-label">Jumlah Pesanan:</label>
                        <input type="number" class="form-control" id="jmlPesanBeku" name="jmlPesanBeku" maxlength="5"
                            value="<?php echo $data1['detailPesanan'][1]['jumlahItem']; ?>" required>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div style="text-align: center;">
            <div class=" mb-3">
                <label for="tglBayar" class="form-label">Tanggal Bayar:</label>
                <input type="date" id="tglBayar" name="tglBayar" value="<?php echo $data3['dataRisol2']['tglBayar']; ?>"
                    required>
            </div>
            <div class=" mb-3">
                <label for="tglAntar" class="form-label">Tanggal Antar:</label>
                <input type="date" id="tglAntar" name="tglAntar" value="<?php echo $data3['dataRisol2']['tglAntar']; ?>"
                    required>
            </div>
            <button class="btn btn-primary" style="padding: 7px 27px;" type="submit">Simpan Revisi</button>
            <a href="<?= BASEURL; ?> /customer/halamanRevisi"><button class="btn btn-danger fs-6" type="button"
                    name="kembali">Kembali</button></a>
        </div>
    </form>
    <br><br>
</div>
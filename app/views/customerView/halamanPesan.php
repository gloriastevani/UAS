<br><br><br><br>
<div class="container">
    <h2 style="text-align: center;">Pesan Risol</h2>
    <br>
    <form action="<?= BASEURL; ?>/customer/pemesanan" method="post">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <img src="<?= BASEURL; ?>/img/risolmayo.jpeg" width="250px">
                    <div style="font-size: 20px;"><i><?php echo $data['dataRisol'][0]['namaRisol'] ?></i></div>
                    <div>Harga: Rp <?php echo $data['dataRisol'][0]['harga'] ?> /pcs</div>
                    <br>
                    <p>Isian risol : Smoked beef, Telur, Mayonais.
                        Creamy didalam renyah diluar. Menggunakan tepung panir klasik, tipis tetapi tetap renyah. Kulit
                        risoles produksi sendiri menggunakan telur dan tepung pilihan sehingga lembut dan wangi. Dikirim
                        dalam kondisi sudah digoreng.</p>
                </div>
                <div class="col" style="text-align: left;">
                    <br><br><br><br>
                    <div class=" mb-3">
                        <div>Jumlah Stok: <?php echo $data['dataRisol'][0]['jumlahStok'] ?></div>
                    </div>
                    <div class=" mb-3">
                        <label for="jmlPesanMatang" class="form-label">Jumlah Pesanan:</label>
                        <input type="number" class="form-control" id="jmlPesanMatang" name="jmlPesanMatang"
                            maxlength="5" value="0" required>
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
                    <div style="font-size: 20px;"><i><?php echo $data['dataRisol'][1]['namaRisol'] ?></i></div>
                    <div>Harga: Rp <?php echo $data['dataRisol'][1]['harga'] ?> /pcs</div>
                    <br>
                    <p>Isian Risol : Smoked beef, Telur, Mayonais.
                        Creamy didalam renyah diluar. Menggunakan tepung panir klasik, tipis tetapi tetap renyah. Kulit
                        risoles produksi sendiri menggunakan telur dan tepung pilihan sehingga lembut dan wangi. Dikirim
                        dalam kondisi belum digoreng.</p>
                </div>
                <div class="col" style="text-align: left;">
                    <br><br><br><br>
                    <div class=" mb-3">
                        <div>Jumlah Stok: <?php echo $data['dataRisol'][1]['jumlahStok'] ?></div>
                    </div>
                    <div class=" mb-3">
                        <label for="jmlPesanBeku" class="form-label">Jumlah Pesanan:</label>
                        <input type="number" class="form-control" id="jmlPesanBeku" name="jmlPesanBeku" maxlength="5"
                            value="0" required>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div style="text-align: center;">
            <div class=" mb-3">
                <label for="tglBayar" class="form-label">Tanggal Bayar:</label>
                <input type="date" id="tglBayar" name="tglBayar" required>
            </div>
            <div class=" mb-3">
                <label for="tglAntar" class="form-label">Tanggal Antar:</label>
                <input type="date" id="tglAntar" name="tglAntar" required>
            </div>
            <button class="btn btn-primary" style="padding: 7px 27px;" type="submit">Beli</button>
            <a href="<?= BASEURL; ?> /HomeCustomer/index"><button class="btn btn-danger fs-6" type="button"
                    name="kembali">Kembali</button></a>
        </div>
    </form>
    <br><br>
</div>
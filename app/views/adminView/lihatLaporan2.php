<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br>
<div class="container mt-5">
    <h1 style="text-align: center;">Laporan</h1>
    <form action="<?= BASEURL; ?>/Admin/cetakLaporan" method="post">
        <div style="text-align: center;">
            <span>Rentang tanggal:</span>
            <span><b><u><input type="text" name="tglAwal" value="<?= $data2['tanggalAwal']; ?>" size="7px"
                            readonly></u></b></span>
            <span>s/d</span>
            <span><b><u><input type="text" name="tglAkhir" value="<?= $data2['tanggalAkhir']; ?>" size="7px"
                            readonly></u></b></span>
        </div>
        <hr>
        <table style="text-align: center;">
            <tr>
                <th>Customer yang paling banyak memesan:</th>
                <th>Total pembelian terbesar:</th>
                <th>Total keuntungan:</th>
                <th>Total pembelian semua risol:</th>
                <th>Total pembelian risol matang:</th>
                <th>Total pembelian risol beku:</th>
            </tr>
            <tr>
                <td><input type="text" id="cpalingBanyakPesan" name="cpalingBanyakPesan"
                        value="<?= $data1['namaPalingSeringBeli']['nama']; ?>" readonly></td>
                <td><input type="text" id="cbayarPalingBanyak" name="cbayarPalingBanyak"
                        value="<?= $data1['namaBayarTerbanyak']['nama']; ?>" readonly></td>
                <td><input type="text" id="totalKeuntungan" name="totalKeuntungan"
                        value="<?= 'Rp ' . $data1['untung']['totalKeuntungan']; ?>" readonly></td>
                <td><input type="text" id="jmlBeliSemuaRisol" name="jmlBeliSemuaRisol"
                        value="<?= $data1['totalBeliSemuaRisol']; ?>" readonly></td>
                <td><input type="text" id="jmlBeliRisolMatang" name="jmlBeliRisolMatang"
                        value="<?= $data1['totalBeliRisolMatang']['jumlahItem']; ?>" readonly></td>
                <td><input type="text" id="jmlBeliRisolBeku" name="jmlBeliRisolBeku"
                        value="<?= $data1['totalBeliRisolBeku']['jumlahItem']; ?>" readonly></td>
            </tr>
        </table>
        <br>
        <div style="text-align: center;">
            <button class=" mt-3 aturTombol" type="submit" style="padding: 8px 18px;" name="cetak">Cetak</button>
            <a href="<?= BASEURL; ?> /admin/halamanLaporan"><button class="btn btn-danger fs-6" type="button"
                    name="kembali">Kembali</button></a>
        </div>
    </form>
</div>
<br><br><br>
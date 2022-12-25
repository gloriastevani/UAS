<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
</head>

<body>
    <div style="margin: 35px;">
        <h1 style="text-align: center; font-size: 50px;">Laporan</h1>
        <div style="text-align: center; font-size: 20px;">
            <span>Rentang tanggal:
                <b><?= $data['tglAwal']; ?></b> s/d <b><?= $data['tglAkhir']; ?></b>
            </span>
        </div>
        <br>
        <table border='1' cellspacing='0' cellpadding='5' style="font-size: 17px; text-align: center;"">
        <tr>
            <th>Customer yang paling banyak memesan:</th>
            <th>Total pembelian terbesar:</th>
            <th>Total keuntungan:</th>
            <th>Total pembelian semua risol:</th>
            <th>Total pembelian risol matang:</th>
            <th>Total pembelian risol beku:</th>
        </tr>
        <tr>
            <td><?= $data['cpalingBanyakPesan']; ?></td>
            <td><?= $data['cbayarPalingBanyak']; ?></td>
            <td><?= $data['totalKeuntungan']; ?></td>
            <td><?= $data['jmlBeliSemuaRisol']; ?></td>
            <td><?= $data['jmlBeliRisolMatang']; ?></td>
            <td><?= $data['jmlBeliRisolBeku']; ?></td>
        </tr>
    </table>
    </div>
    <div style=" text-align: center;">
            <a href=" <?= BASEURL; ?> /HomeAdmin/index"><button type="button" name="kembali">Kembali</button></a>
    </div>

</body>
<script>
window.print();
</script>

</html>
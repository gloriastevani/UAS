<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br>
<div class="container mt-5">
    <h1>Daftar Harga Risol</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
  <?php  
      $nomor = 1;
    foreach($data['hargaRisol'] as $harga){ ?>
        <tr>
            <th><?php echo $nomor?></th>
            <td><?php echo $harga['namaRisol']; ?></td>
            <td><?php echo 'Rp ' . $harga['harga']; ?></td>
        </tr>
        <?php
            $nomor++;
    } ?>
  </tbody>
</table>
    <button class=" mt-3 aturTombol" type="button" style="padding: 10px 16px;" name="revisi"><a class="nav-link mb-0 h1 fs-6"
            href="<?= BASEURL; ?>/Admin/halamanRevisiHarga">Revisi</a></button>
    <a href="<?= BASEURL; ?> /HomeAdmin/index"><button class="btn btn-danger fs-6" type="button"
            name="kembali">Kembali</button></a>
</div>


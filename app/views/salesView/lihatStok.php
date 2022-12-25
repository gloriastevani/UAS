<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br>
<div class="container mt-5">
    <h1>Daftar Stok Risol</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Produk</th>
      <th scope="col">Jumlah Stok</th>
    </tr>
  </thead>
  <tbody>
  <?php  
      $nomor = 1;
    foreach($data['stokRisol'] as $stok){ ?>
        <tr>
            <th><?php echo $nomor?></th>
            <td><?php echo $stok['namaRisol']; ?></td>
            <td><?php echo $stok['jumlahStok']; ?></td>
        </tr>
        <?php
            $nomor++;
    } ?>
  </tbody>
</table>
    <button type='button' class='aturTombol' name='kembali'><a class="nav-link mb-0 h1 fs-5"
            href="<?= BASEURL; ?>/HomeSales/index">Kembali</a></button>
</div>
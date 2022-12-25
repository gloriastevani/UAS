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
      <th></th>
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
    <button class=" mt-3 aturTombol" type="button" style="padding: 10px 16px;" name="tambah"><a class="nav-link mb-0 h1 fs-6"
            href="<?= BASEURL; ?>/Admin/halamantambahStok">Tambah</a></button>
    <a href="<?= BASEURL; ?> /HomeAdmin/index"><button class="btn btn-danger fs-6" type="button"
            name="kembali">Kembali</button></a>
</div>
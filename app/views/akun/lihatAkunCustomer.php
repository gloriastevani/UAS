<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br><br>
<div class="container">
    <h1>Akun</h1>
    <form action='' method='post'>
        <div class=" mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50"
                value="<?= $data['akunCustomer']['nama']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat"
                rows="3" readonly><?= $data['akunCustomer']['alamat']; ?></textarea>
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= $data['akunCustomer']['email']; ?> " maxlength="50" readonly>
        </div>
        <div class=" mb-3">
            <label for="noTelepon" class="form-label">Nomor Telepon:</label>
            <input type="number" class="form-control" id="noTelepon" name="noTelepon"
                value="<?= $data['akunCustomer']['noTelepon']; ?>" maxlength="12" readonly>
        </div>
        <div class=" mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?= $data['akunCustomer']['username']; ?>" maxlength="15" placeholder="Maksimal 15 karakter" readonly>
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password"
                value="<?= $data['akunCustomer']['password']; ?>" maxlength="8" placeholder="Maksimal 8 karakter" readonly>
        </div>
        <a href="<?= BASEURL; ?> /Customer/halamanEditAkun"><button class=" mt-3 aturTombol" type="button" style="padding: 8px 18px;" name="edit">Edit</button></a>
        <a href="<?= BASEURL; ?> /HomeCustomer/index"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </form>
    <br><br><br>
</div>
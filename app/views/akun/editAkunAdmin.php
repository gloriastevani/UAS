<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br><br>
<div class="container">
    <h1>Edit Akun</h1>
    <form action='<?= BASEURL; ?>/admin/editAkunAdmin' method='post'>
        <input type="hidden" name="nip" value="<?= $data['akunAdmin']['nip']; ?>">
        <div class=" mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50"
                value="<?= $data['akunAdmin']['nama']; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat"
                rows="3"><?= $data['akunAdmin']['alamat']; ?></textarea>
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email"
                value="<?= $data['akunAdmin']['email']; ?>" maxlength="50">
        </div>
        <div class="mb-3">
        <label for="tglLahir" class="form-label">Tanggal Lahir:</label>
        <input type="date" name="tglLahir" value="<?= $data['akunAdmin']['tglLahir']; ?>"/>
        </div>
        <div class=" mb-3">
            <label for="noTelepon" class="form-label">Nomor Telepon:</label>
            <input type="number" class="form-control" id="noTelepon" name="noTelepon"
                value="<?= $data['akunAdmin']['noTelepon']; ?>" maxlength="12">
        </div>
        <div class=" mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username"
                value="<?= $data['akunAdmin']['username']; ?>" maxlength="15" placeholder="Maksimal 15 karakter">
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password"
                value="<?= $data['akunAdmin']['password']; ?>" maxlength="8" placeholder="Maksimal 8 karakter">
        </div>
        <button class=" mt-3 aturTombol" type="submit" style="padding: 8px 18px;" name="simpan">Simpan</button>
        <a href="<?= BASEURL; ?> /Admin/tampilkanAkunAdmin"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </form>
    <br><br><br>
</div>
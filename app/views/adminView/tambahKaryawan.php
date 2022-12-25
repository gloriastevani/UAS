<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturRegistrasi.css">
<br><br><br><br>
<div class="container">
    <h1>Tambah Karyawan</h1>
    <form action='<?= BASEURL; ?>/admin/tambahKaryawan' method='post'>
        <div class=" mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" maxlength="50" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat:</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class=" mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" maxlength="50" required>
        </div>
        <div class=" mb-3">
            <label for="tglLahir" class="form-label">Tanggal Lahir:</label>
            <input type="date" id=" tglLahir" name="tglLahir" required>
        </div>
        <div class=" mb-3">
            <label for="noTelepon" class="form-label">Nomor Telepon:</label>
            <input type="number" class="form-control" id="noTelepon" name="noTelepon" maxlength="12" required>
        </div>
        <div class=" mb-3">
            <label for="jenisKaryawan" class="form-label">Jenis Karyawan:</label>
            <select name="jenisKaryawan" id="jenisKaryawan">
                <option value="sales">Sales</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class=" mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" class="form-control" id="username" name="username" maxlength="15"
                placeholder="Maksimal 15 karakter" required>
        </div>
        <div class=" mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="text" class="form-control" id="password" name="password" maxlength="8"
                placeholder="Maksimal 8 karakter" required>
        </div>
        <div class=" mb-3">
            <label for="tglMasuk" class="form-label">Tanggal Masuk:</label>
            <input type="date" id="tglMasuk" name="tglMasuk" required>
        </div>
        <button class=" mt-3 aturTombol" type="submit" style="padding: 8px 18px;" name="tambah">Tambah</button>
        <a href="<?= BASEURL; ?> /HomeAdmin/index"><button class="btn btn-danger fs-6" type="button"
                name="kembali">Kembali</button></a>
    </form>
    <br><br><br>
</div>
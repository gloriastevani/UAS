<br><br><br>
<link rel="stylesheet" href="<?= BASEURL; ?>/css/aturLogin.css">
<div class="container">
    <div class='login'>
        <h1 class='judul'>Login</h1>
        <form action='<?= BASEURL; ?>/login/validasi' method='post'>
            <table>
                <tr>
                    <td class='atur'><label for='username'>Username</label></td>
                    <td><input type='text' id='username' name='username' maxlength="15" required></td>
                </tr>
                <tr>
                    <td class='atur'><label for='password'>Password</label></td>
                    <td><input type='password' id='password' name='password' maxlength="8" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type='submit' class='aturTombol' style="font-size: 18px;" name='login'>Login</button>
                    </td>
                </tr>
            </table>
        </form>
        <div class="aturLink">Belum punya akun?<a href=" <?= BASEURL; ?>/customer/">Daftar</a></div>
    </div>
</div>
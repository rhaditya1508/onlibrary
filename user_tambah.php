<h1 class="mt-4">Register Akun Petugas</h1>
<br>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_POST['register'])) {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $alamat = $_POST['alamat'];
                        $username = $_POST['username'];
                        $level = "petugas";
                        $password = md5($_POST['password']);
                        

                        $query = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,username,password,level) VALUES('$nama','$email','$alamat','$username','$password','$level')");

                        if ($query) {
                            echo '<script>alert("Akun Petugas Berhasil Dibuat.");</script>';
                        } else {
                            echo '<script>alert("Akun Petugas Gagal Dibuat.");</script>';
                        }
                    }
                    ?>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Lengkap</div>
                        <div class="col-md-8"><input type="username" class="form-control" name="nama"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Email</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="email"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Alamat</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="alamat"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Username</div>
                        <div class="col-md-8"><input type="username" class="form-control" name="username"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Password</div>
                        <div class="col-md-8"><input type="password" class="form-control" name="password"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8">
                        <button class="btn btn-success" type="submit" name="register" value="register">Register</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <a href="?page=user" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
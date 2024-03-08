<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register OnLibrary</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" rel="stylesheet" />
    <style>
        body {
            background-image: url('assets/bg1.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 20px;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group .fa {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #aaa;
        }

        .form-control {
            border-radius: 5px;
            padding-left: 40px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-footer {
            background-color: #007bff;
            color: #fff;
            border-radius: 0 0 10px 10px;
            padding: 15px 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-lg-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Halaman Register OnLibrary</h3>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_POST['register'])) {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $alamat = $_POST['alamat'];
                        $username = $_POST['username'];
                        $level = "peminjam";
                        $password = md5($_POST['password']);

                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,username,password,level) VALUES('$nama','$email','$alamat','$username','$password','$level')");

                        if ($insert) {
                            echo '<script>alert("Selamat, Anda berhasil register. Silahkan Login"); location.href="login.php"</script>';
                        } else {
                            echo '<script>alert("Register gagal, Silahkan coba kembali"); location.href="login.php"</script>';
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="nama" placeholder="Masukkan Nama Lengkap" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" placeholder="Masukkan Email" />
                        </div>
                        <div class="form-group">
                            <textarea name="alamat" rows="5" class="form-control"
                                placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="Masukkan Username" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password"
                                placeholder="Masukkan Password" />
                        </div>

                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-success" type="submit" name="register"
                                value="register">Register</button>
                            <a class="btn btn-primary" href="login.php">Login</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small">
                        &copy; 2024 OnLibrary.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
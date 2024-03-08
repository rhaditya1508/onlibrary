<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login OnLibrary</title>
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

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #e0a800;
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
                    <h3 class="text-center font-weight-light my-4">Login ke OnLibrary</h3>
                </div>
                <?php
                if (isset($_POST['login'])) {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $data = mysqli_query($koneksi, "SELECT*FROM user where username='$username' and password='$password'");
                    $cek = mysqli_num_rows($data);
                    if ($cek > 0) {
                        $_SESSION['user'] = mysqli_fetch_array($data);
                        echo '<script>alert("Selamat Datang, Login Berhasil"); location.href="index.php";</script>';
                    } else {
                        echo '<script>alert("Maaf, Username/Password Salah")</script>';
                    }
                }
                ?>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username"
                                placeholder="&#xf007; Masukkan Username" style="font-family:Arial, FontAwesome" />
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="password" name="password"
                                placeholder="&#xf023; Masukkan Password" style="font-family:Arial, FontAwesome" />
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                            <a class="btn btn-warning" href="register.php">Register</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
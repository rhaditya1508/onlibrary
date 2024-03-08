<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo '<script>alert("Tidak ada buku yang dipilih!");</script>';
    header("Location: halaman_sebelumnya.php");
    exit();
}

$id_buku = $_GET['id'];
$query_check_book = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
$result_check_book = mysqli_query($koneksi, $query_check_book);

if (!$result_check_book || mysqli_num_rows($result_check_book) == 0) {
    echo '<script>alert("Buku tidak ditemukan!");</script>';
    header("Location: halaman_sebelumnya.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rating = $_POST['rating'];
    $ulasan = $_POST['ulasan'];

    if (empty($ulasan) || empty($rating)) {
        echo '<script>alert("Pastikan semua data diisi");</script>';
    } else {
        $id_user = $_SESSION['user']['id_user']; 
        $query = "INSERT INTO ulasan (id_buku, id_user, ulasan, rating) VALUES ('$id_buku', '$id_user', '$ulasan', '$rating')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo '<script>alert("Ulasan berhasil ditambahkan!");</script>';
            header("Location: index.php?page=ulasan");
            exit();
        } else {
            echo '<script>alert("Gagal menambahkan ulasan: ' . mysqli_error($koneksi) . '");</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beri Ulasan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Berikan Ulasan</h1>
    <div class="card">
        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select class="form-control" name="rating" id="rating">
                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ulasan">Ulasan</label>
                    <textarea class="form-control" name="ulasan" id="ulasan" rows="5" placeholder="Tulis ulasan Anda di sini..."></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-send"></i>Kirim</button>
                    </div>
                    <div class="col-md-6">
                        <a href="index.php?page=ulasan&id=<?php echo $idbuku; ?>" class="btn btn-secondary btn-block">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</body>
</html>

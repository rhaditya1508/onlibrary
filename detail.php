<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
$buku = mysqli_fetch_array($query);

$queryUlasan = mysqli_query($koneksi, "SELECT ulasan.*, user.username
FROM ulasan
JOIN user ON ulasan.id_user = user.id_user WHERE id_buku='$id'");
$ulasan = [];
while ($row = mysqli_fetch_assoc($queryUlasan)) {
    $ulasan[] = $row;
}
$totalRating = 0;
$totalUlasan = count($ulasan);
foreach ($ulasan as $row) {
    $totalRating += $row['rating'];
}
if ($totalUlasan > 0) {
    $averageRating = $totalRating / $totalUlasan;
} else {
    $averageRating = 0; 
}
?>

<h1 class="mt-3">Detail Buku</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-center">
                        <?= $buku['judul']; ?>
                    </h3>
                    <tr>
                        <td style="width: 200px; height: 150px;">
                            <img class="w-100" src="./assets/img/<?= $buku['gambar']; ?>" alt="Sampul Buku">
                        </td>
                    </tr>
                    <ul class="list-group list-group-unbordered mb-3 mt-2">
                        <li class="list-group-item">
                            <b>Rating   :</b>
                            <label style="color:black" class="float-right">
                                <?= number_format($averageRating, 2); ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Penulis  :</b>
                            <label style="color:black" class="float-right">
                                <?= $buku['penulis']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Penerbit  :</b>
                            <label style="color:black" class="float-right">
                                <?= $buku['penerbit']; ?>
                            </label>
                        </li>
                        <li class="list-group-item">
                            <b>Tahun Terbit  :</b>
                            <label style="color:black" class="float-right">
                                <?= $buku['tahun_terbit']; ?>
                            </label>
                        </li>
                        <a href="pinjam.php?id=<?= $buku['id_buku']; ?>" class="btn btn-success btn-block mt-2">
                            <b>Pinjam</b>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4><i class="fas fa-bars" style="margin-right: 10px;"></i>Deskripsi Buku</h4>
                </div>

                <div class="card-body">
                    <p>
                        <?= $buku['deskripsi']; ?>
                    </p>
                </div>
            </div>
            <div class="card card-primary card-outline mt-3">
                <div class="card-header">
                    <h4><i class="fas fa-comment" style="margin-right: 10px;"></i>Ulasan</h4>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Ulasan</th>
                                <th>Rating</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ulasan as $row): ?>
                                <tr>
                                    <td>
                                        <?= $row['username']; ?>
                                    </td>
                                    <td>
                                        <?= $row['ulasan']; ?>
                                    </td>
                                    <td>
                                        <?= $row['rating']; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

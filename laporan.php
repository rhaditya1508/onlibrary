<h1 class="mt-4">Laporan Peminjaman</h1>
<br>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                <a href="cetak.php" target="_blank" class="btn btn-success"><i class="fa fa-print"></i>&nbsp;Cetak Laporan</a>
                </div>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user on user.id_user = peminjaman.id_user LEFT JOIN buku on buku.id_buku = peminjaman.id_buku");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $i++; ?>
                            </td>
                            <td>
                                <?php echo $data['nama']; ?>
                            </td>
                            <td>
                                <?php echo $data['judul']; ?>
                            </td>
                            <td>
                                <?php echo $data['tanggal_peminjaman']; ?>
                            </td>
                            <td>
                                <?php echo $data['tanggal_pengembalian']; ?>
                            </td>
                            <td>
                                <?php echo $data['status_peminjaman']; ?>
                            </td>
                            <td>
                                <form method="POST" action="proses_update.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>">
                                    <input type="submit" value="Kembalikan" class="btn btn-danger" style="margin-top: 5px; background-color: #e74c3c; border-color: #e74c3c;">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
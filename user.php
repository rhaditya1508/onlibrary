<h1 class="mt-4">User</h1>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
        <div class="mb-3">
        <a href="?page=user_tambah" class="btn btn-primary">Buat Akun</a>
        </div>
            <table class="table table-bordered mt-2" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Role</th>
                </tr>
                <?php
                $i = 1;
                    $query = mysqli_query($koneksi, "SELECT*FROM user");
                    while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['alamat']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
    </div>
</div>
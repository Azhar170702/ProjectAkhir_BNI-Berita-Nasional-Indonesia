<?php include('view/include/headerAdmin.php') ?>

<div class="row my-3">
    <div class="col-md">
        <table id="data" class="table table-striped table-responsive table-hover text-center" style="width:100%">
            <thead class="table-dark">
                <tr>
                    <th>Gambar Berita</th>
                    <th>Judul Berita</th>
                    <th>Deskripsi Berita</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($berita as $row) : ?>
                <tr style="text-align: left;">
                <th><img src="upload/<?= $row['gb_berita'] ?>" style="width: 150px; height: 150px"> </th>
                <th><p><?= $row['judul_berita'] ?></p></th>
                <th><p><?= $row['des_berita'] ?></p></th>
                <th>
                    <div class="box-aksi" style="font-size:24px">
                        <a href="index.php?page=berita&aksi=editBerita&id=<?= $row['id_berita'] ?>">
                            <i class="fa fa-gear" style="color: black;"></i>
                        </a>
                    </div>
                    <div class="box-aksi" style="font-size:24px">
                        <a href="index.php?page=berita&aksi=hapusBerita&id=<?= $row['id_berita'] ?>">
                            <i class="fa fa-trash" style="color: black;"></i>
                        </a>
                    </div>
                </th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('view/include/footer.php') ?>
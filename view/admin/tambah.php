<?php include('view/include/headerAdmin.php') ?>

<form method="POST" action="index.php?page=berita&aksi=addBerita" enctype="multipart/form-data">
  <label for="fname">Judul Berita</label><br>
  <input type="text" class="text" name="judul_berita"><br>
  <label for="lname">Deskripsi Berita</label><br>
  <textarea type="text" class="text" name="des_berita"></textarea>

  <label for="lname">Gambar Berita</label><br>
  <input type="file" id="lname" name="gb_berita"><br>
  
  <input type="submit" name="submit" class="button">

</form>

<?php include('view/include/footer.php') ?>
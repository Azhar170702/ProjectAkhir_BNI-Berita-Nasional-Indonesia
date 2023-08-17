<form method="POST" action="index.php?page=berita&aksi=updateBerita&id=<?=$data['id_berita']?>">
	<input type="hidden" name="namafoto" value="<?= $data['gb_berita'] ?>">
<label for="judul_berita">Judul Berita</label>
<input type="text" id="judul_berita" name="judul_berita" value="<?=$data['judul_berita']?>">	
<br>
<label for="des_berita">Deskripsi Berita</label>
<input type="text" id="des_berita" name="des_berita" value="<?=$data['des_berita']?>">
<br>
<label for="lname">Gambar Berita</label><br>
  <input type="file" id="lname" name="gb_berita"><br>
<input type="submit" name="submit">	
</form>
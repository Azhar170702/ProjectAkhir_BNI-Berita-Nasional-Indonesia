<?php  
	class BeritaModel {
		public function getBerita() {
	        $sql = "SELECT * FROM berita";
	        $query = koneksi()->query($sql);
	        $hasil = [];
	        while ($data = $query->fetch_assoc()) {
	                $hasil[] = $data;
	        }
	        return $hasil;
	    }

		public function getBeritaById($id) {
	        $sql = "SELECT * FROM berita WHERE id_berita = '$id'";
	        $query = koneksi()->query($sql);
	        return $query->fetch_assoc();
	    }
		
	    public function prosesAddBerita($judul_berita, $des_berita, $gb_berita) {
	        $id = null;
	        $sql = "INSERT INTO berita(id_berita, judul_berita, des_berita, gb_berita)
	        VALUES ('$id','$judul_berita', '$des_berita', '$gb_berita')";
	        return koneksi()->query($sql);
	    }

	    public function getGambarBerita($id) {
	        $sql = "SELECT gb_berita FROM berita WHERE id_berita like '$id'";
	        $query = koneksi()->query($sql);
	        return $query->fetch_assoc();
	    }

	    public function prosesUpdateBerita($id, $judul_berita, $des_berita, $gb_berita)
	    {
	        $sql = "UPDATE berita SET judul_berita = '$judul_berita', des_berita = '$des_berita', gb_berita = '$gb_berita' WHERE id_berita LIKE '$id' ";
	        return koneksi()->query($sql);
	    }

	    public function prosesDeleteBerita($id)
	    {
	        $sql = "DELETE FROM berita WHERE id_berita = '$id'";
	        return koneksi()->query($sql);
	    }
	}
?>
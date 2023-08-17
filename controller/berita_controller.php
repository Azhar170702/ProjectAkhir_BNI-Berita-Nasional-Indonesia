<?php  
	class BeritaController{
		private $model;

		public function __construct() {
		    $this->model = new BeritaModel();
		}

		public function index() {
			require_once("view/admin/berita.php");
		}

        public function daftarBerita() {
            $berita = $this->model->getBerita();
            extract($berita);
            require_once("view/admin/berita.php");
        }    

        public function showBerita() {
            $berita = $this->model->getBerita();
            extract($berita);
            require_once("view/pengunjung/Berita.php");
        } 

        public function tambahBerita() {
            require_once("view/admin/tambah.php");
        }

        public function addBerita() {
            $judul_berita = $_POST['judul_berita'];
            $des_berita = $_POST['des_berita'];

            $gb_berita = $_FILES['gb_berita']['tmp_name'];
            $lokasi = __DIR__ . '/../upload/';
            $namaFile = $judul_berita . ".jpg";

            if (move_uploaded_file($gb_berita, $lokasi.$namaFile)) {
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=gagal upload");
            } else {
                // echo ;
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=gagal upload");
            }

            $query = $this->model->prosesAddBerita($judul_berita, $des_berita, $namaFile);
            if ($query) {
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=berhasil daftar");
            } else {
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=gagal daftar");
            }
        }

        public function deleteBerita() {
            $id = $_GET['id'];
            $getgambar = $this->model->getGambarBerita($id);
            $data = $getgambar['gb_berita'];
            $lokasi = __DIR__ . '/../upload_berita/';
            if (file_exists($lokasi . $data)) {
                unlink($lokasi . $data);
            }

            if ($this->model->prosesDeleteBerita($id)) {
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=berhasil hapus berita");
            } else {
                header("location: index.php?page=berita&aksi=daftarBerita&pesan=Gagal hapus");
            }
        }

        public function editBerita() {
            $id = $_GET['id'];
            $data = $this->model->getBeritaById($id);
            extract($data);
            require_once("view/admin/edit.php");
        }

        public function updateBerita() {

            $id = $_GET['id'];
            $judul_berita = $_POST['judul_berita'];
            $des_berita = $_POST['des_berita'];


            $namagambar = $_FILES['gb_berita']['name'];
            $getgambar = $_POST['namafoto'];
            $namaFile = $judul_berita . ".jpg";
            $lokasi = __DIR__ . '/../upload/';

            if (isset($namagambar)) {

                $gb_berita = $_FILES['gb_berita']['tmp_name'];

                if (file_exists($lokasi . $getgambar)) {
                    unlink($lokasi . $getgambar);
                    if (move_uploaded_file($gb_berita, $lokasi . $namaFile)) {
                        if ($this->model->prosesUpdateBerita($id, $judul_berita, $des_berita, $namaFile)) {
                            header("location: index.php?page=berita&aksi=daftarBerita&pesan=Berhasil Ubah Data");
                        } else {
                            unlink($lokasi . $namaFile);
                            header("location: index.php?page=berita&aksi=daftarBerita&pesan=Gagal Ubah Data");
                        }
                    } else {
                        header("location: index.php?page=berita&aksi=daftarBerita
                            &pesan=Gagal Upload Gambar");
                    }
                } else { // langsung masuk ke sini
                    header("location: index.php?page=berita&aksi=daftarBerita&pesan=Gagal Menghapus Gambar lama");
                }
            } else {
                $namaFile = $getgambar;
                if ($this->model->prosesUpdateBerita($id, $judul_berita, $des_berita, $namaFile)) {
                    header("location: index.php?page=berita&aksi=daftarBerita&pesan=Berhasil Ubah Data&id");
                } else {
                    unlink($lokasi . $namaFile);
                    header("location: index.php?page=berita&aksi=daftarBerita&pesan=Gagal Ubah Data");
                }
            }
        }
    }
?>
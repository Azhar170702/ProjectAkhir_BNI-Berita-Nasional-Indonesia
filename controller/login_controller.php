<?php  
	class LoginController {
		private $model;

	    public function __construct() {
	        $this->model = new LoginModel();
	    }

	    public function index() {
	        require_once("view/admin/index.php");
	    }

	    public function logout() {
	    	session_destroy();
	        require_once("View/user/index.php");
	    }

	    public function loginAdmin() {
	        $user = $_POST['user'];
	        $pass = $_POST['pass'];
	        $data = $this->model->prosesLoginAdmin($user, $pass);
	        if ($data) {
	        	$_SESSION['nama_user'] = 'admin';
            	$_SESSION['admin'] = $data;
	            header("location: index.php?page=berita&aksi=daftarBerita&pesan=berhasil login");
	        } else {
	            header("location: index.php?page=berita&aksi=login&pesan=email atau password salah");
	        }
	    }

	    public function home(){
	    	require_once("View/user/index.php");
	    }

	}
?>
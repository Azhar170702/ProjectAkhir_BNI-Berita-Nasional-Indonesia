<?php  
	//database
	require_once "koneksi/koneksidb.php";

	//Model
	require_once "models/berita_model.php";
	require_once "models/login_model.php";

	//Controller
	require_once "controller/berita_controller.php";
	require_once "controller/login_controller.php";

	//Routing
	if (($_GET['page']) && isset($_GET['aksi'])) {
		session_start();
		$page = $_GET['page'];
    	$aksi = $_GET['aksi'];

    	if ($page == "berita") {
    		$login = new LoginController();
    		$berita =  new BeritaController();
    		
    		// Pengunjung
    		if ($aksi == 'view') {
            	$login->home();
	        } elseif ($aksi == 'login') {
	        	$login->index();
	        } elseif ($aksi == 'loginAdmin') {
	        	$login->loginAdmin();
	        } elseif ($aksi == 'daftarBerita') {
	        	$berita->daftarBerita();
	        } elseif ($aksi == 'logout') {
	        	$login->logout();
	        } elseif ($aksi == 'tambahBerita') {
	        	$berita->tambahBerita();
	        } elseif ($aksi == 'addBerita') {
	        	$berita->addBerita();
	        } elseif ($aksi == 'hapusBerita') {
	        	$berita->deleteBerita();
	        } elseif ($aksi == 'editBerita') {
	        	$berita->editBerita();
	        } elseif ($aksi == 'updateBerita') {
	        	$berita->updateBerita();
	        }
	        else {
	        	require_once "view/error.php";
	        }
    	} else {
    		header("location: index.php?page=berita&aksi=view");
    	}
	} else {
		header("location: index.php?page=berita&aksi=view");
	}
?>

<!-- // if ($aksi == 'view') {
	            //     $arc->index();

	            if ($aksi == 'view') {
	                $arc->index();
	            }
	            } -->
<?php  
	class LoginModel {
		public function prosesLoginAdmin($user,$pass) {
            $sql = "SELECT * from login where user = '$user' AND pass='$pass'";
            $query = koneksi()->query($sql);
            return $query->fetch_assoc();
        }
	}
?>
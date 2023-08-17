<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
</head>

<body id="bg-login">
	<div class="box-login">
		<h2>login</h2>
		<form method="POST" action="index.php?page=berita&aksi=loginAdmin">
			<input type="text" name="user" placeholder="username" class="input-control" required>
			<input type="password" name="pass" placeholder="password" class="input-control" required>
			<input type="submit" name="submit" value="login" class="btm"> <br>
			<!-- <center><a href="home.php">kembali</a></center> --> 
			
		</form>
	</div>
</body>
</html>
<?php 
session_start();
if (!isset($_COOKIE)) {
	# code...
	die(header("location:verifikasiLogin.php"));	
}
if (!isset($_SESSION["username"])) {
	# code...
	die(header("location:verifikasiLogin.php"));
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Selamat Datang</title>
 </head>
 <body>
 	<form action="terimaUpload.php" method="post" enctype="multipart/form-data">
	 	<table>
	 		<tr>
	 			<td width="300px">
	 				Silahkan Upload File Anda
	 			</td>
	 			<td>
	 				<input type="file" name="fileUpload">
	 			</td>
	 		</tr>
	 		<tr>
	 			<td colspan="2">
	 				<button name="submit">Upload</button>
	 			</td>
	 		</tr>
	 	</table>
 	</form>
 
 </body>
 </html>

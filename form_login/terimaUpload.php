<?php 
session_start();
	if (!isset($_SESSION["username"])) {
	# code...
	die(header("location:verifikasiLogin.php"));
}
	if ($_FILES["fileUpload"]["name"] == "") {
		# code...
		echo "<script>
                alert('Harap Memilih File Terlebih Dahulu!!!');
                document.location.href = 'login.php';
              </script>";
	}

	if (isset($_POST["submit"])) {
		# code...
		if ($_FILES["fileUpload"]["type"] == "image/png" || $_FILES["fileUpload"]["type"] == "image/jpg" || $_FILES["fileUpload"]["type"] == "image/jpeg"){
			# code...
				# code...
				$namaFile = basename($_FILES["fileUpload"]["name"]);
				$namaSementara = $_FILES["fileUpload"]["tmp_name"];
				$dir = "upload/";
				$fullPath = $dir.$namaFile;
			if (!file_exists($fullPath)) {
				$terUpload = move_uploaded_file($namaSementara, $fullPath);
				
				if ($terUpload) {
					# code...
					session_destroy();
					setcookie("KUKIS", "user", time()-3600);
					echo "Upload Berhasil";
					echo "<script>
	                alert('Silahkan Login Lagi Untuk Upload Gambar');
	                document.location.href = 'login.php';
	              </script>";
				}
				else{
					echo "GAGAL!!!!";
				}
			}
			else{
				echo "Nama File Sudah Terpakai ";
				echo "<a href='home.php'>Kembali</a>";
			}
		}
		else{
		echo "<p style='color:red'>File Harus PNG JPG JPEG</p>";
		}
	}


 ?>
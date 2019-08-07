<?php 
session_start();
if (!isset($_SESSION["username"]) || $_SESSION["username"] == "") {
		# code...
		echo "<script>
                alert('Harap Login Terlebih Dahulu!!!');
                document.location.href = 'login.php';
              </script>";
}
if (isset($_SESSION["username"])) {
		# code...
		die(header("location:home.php"));
}
if (!isset($_COOKIE)) {
	# code...
	echo "<script>
                alert('KUKIS GAK KEBACA!!!');
                document.location.href = 'login.php';
              </script>";	
}

?>
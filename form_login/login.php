<?php  
session_start();
$conn = mysqli_connect("localhost", "root", "", "formlogin") ;
if (isset($_SESSION["username"])) {
	# code...
	die(header("location:verifikasiLogin.php"));
}
if (isset($_POST["submit"])) {
	# code...
	if (isset($_POST["username"]) && isset($_POST["password"])) {
		# code...
		$UserName = $_POST["username"];
		$password = $_POST["password"];

		$sql = "SELECT id,password FROM tbl_user WHERE userName = '$UserName'";
		$query = mysqli_query($conn,$sql);
		if (mysqli_num_rows($query)) {
			# code...
			$row = mysqli_fetch_assoc($query);
			if ($password === $row["password"]) {
				# code...
				setcookie("KUKIS", "user", time()+3600);
				$_SESSION["username"] = $UserName;
				header("location:verifikasiLogin.php"); 
			}
			else{
				echo "<p style='color:red'>Password Yang Anda Masukan Salah</p>";
			}
		}
		else {
			echo "<p style='color:red'>UserName Yang Anda Masukan Salah</p>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td>
					UserName
				</td>
				<td>
					: <input type="text" name="username">
				</td>
			</tr>
			<tr>
				<td>
					Password

				</td>
				<td>
					: <input type="password" name="password">
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<button name="submit">Login</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
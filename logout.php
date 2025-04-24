<?php
	function logout() {
		if (isset($_SESSION['email'])) {
			unset($_SESSION['email']);
			unset($_SESSION['firstname']);
			unset($_SESSION['lastname']);
			unset($_SESSION['mobilenum']);
			unset($_SESSION['password']);
			session_destroy();
			header("Location: index.php");
		}
	}
?>
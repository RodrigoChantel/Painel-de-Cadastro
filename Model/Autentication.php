<?php
session_start();

if(!$_SESSION['usuario_login']) {
	header('Location: http://localhost/cpainel/index.php');
	exit();
}


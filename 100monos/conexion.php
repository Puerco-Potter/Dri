<?php
	$servername="localhost";
		$username="root";
		$password="root";
		$dbname="drinelmo_arbol";
		$conn = new mysqli($servername, $username, $password, $dbname);
		// server should keep session data for AT LEAST 1 hour
		ini_set('session.gc_maxlifetime', 5400);
		// each client should remember their session id for EXACTLY 1 hour
		session_set_cookie_params(5400);
		session_start();
		$usuario="ADMIN";
		$contrasena="admin";
?>
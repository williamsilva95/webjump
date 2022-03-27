<?php

function session_checker()
{

	if (!isset($_SESSION['id'])) {

		header("Location:../index.php");

		exit();
	}
}
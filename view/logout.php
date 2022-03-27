<?php
session_start();
session_destroy(); # Destruir todas as sessões do navegador

header("Location: ../index.php");
?>
<?php
$mysqli = new mysqli("db", "kad", "kadpassword", "myapp_db");

if ($mysqli->connect_error) {
    die("❌ Erreur de connexion : " . $mysqli->connect_error);
} else {
    echo "✅ Connexion réussie à la base de données MySQL depuis PHP !";
}
?>

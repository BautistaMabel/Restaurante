<?php
class Database {
    public static function connect() {
        $host = "localhost";
        $dbname = "proyecto_2_db";
        $user = "root";
        $pass = ""; // Cambiar si tu usuario de MySQL tiene contraseña

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

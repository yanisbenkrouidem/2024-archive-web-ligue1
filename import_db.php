<?php
// Script pour importer la base de données Ligue 1 vers Aiven MySQL

// Utilise les mêmes variables d'environnement Vercel
$host = getenv('DB_HOST') ?: 'localhost';
$port = getenv('DB_PORT') ?: '3306';
$dbname = getenv('DB_DATABASE') ?: 'ligue1';
$username = getenv('DB_USERNAME') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE                  => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Désactiver la vérification des clés primaires pour Aiven (si nécessaire)
    $pdo->exec('SET SESSION sql_require_primary_key = 0;');
    
    // Lire le fichier SQL
    $sql = file_get_contents(__DIR__ . '/basededonnée/if0_38934862_bdfoot2benkrouidembelkhiri.sql');
    
    if (!$sql) {
        die("Erreur : Impossible de lire le fichier SQL.");
    }

    // Exécuter les requêtes
    $pdo->exec($sql);
    echo "Importation de la base de données terminée avec succès !\n";

} catch (\PDOException $e) {
    echo "Erreur d'importation : " . $e->getMessage() . "\n";
}
?>

<?php
session_start();

// التحقق من وجود جلسة
if (!isset($_SESSION['Id_Clt'])) {
    echo "Vous devez vous connecter pour passer une commande.";
    exit();
}

// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "Base_Client");

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

// استرجاع البيانات
$id_client = $_SESSION['Id_Clt'];
$vendeur = $_POST['Vendeur_prod'];
$prix = $_POST['Prix_prod'];
$ref = $_POST['Ref_prod'];
$colr = $_POST['Colr_prod'];
$qant = $_POST['Qant_prod'];

// تنفيذ إدخال الطلب
$sql = "INSERT INTO Commande_produit (Id_client, Vendeur_prod, Prix_prod, Ref_prod, Colr_prod, Qant_prod)
VALUES ($id_client, '$vendeur', '$prix', '$ref', '$colr', $qant)";

if ($conn->query($sql) === TRUE) {
    echo "Commande enregistrée avec succès.";
} else {
    echo "Erreur : " . $conn->error;
}

$conn->close();
?>
<?php
session_start();


$conn = new mysqli("localhost", "root", "", "Base_Client");

if ($conn->connect_error) {
    die("Erreur de connexion: " . $conn->connect_error);
}

// استرجاع البيانات من النموذج
$mail = $_POST['Mail_Clt'];
$mot = $_POST['Mot_Clt'];

// التحقق من وجود العميل
$sql = "SELECT * FROM Client WHERE Mail_Clt='$mail' AND Mot_Clt='$mot'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $client = $result->fetch_assoc();
    $_SESSION['Id_Clt'] = $client['Id_Clt'];
    $_SESSION['No_Clt'] = $client['No_Clt'];
    $_SESSION['Pno_Clt'] = $client['Pno_Clt'];
    echo "Bienvenue, " . $client['Pno_Clt'] . ". Vous êtes connecté.";
} else {
    echo "Email ou mot de passe incorrect.";
}

$conn->close();
?>
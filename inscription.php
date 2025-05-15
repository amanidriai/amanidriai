<?php
// الاتصال بقاعدة البيانات
$conn = new mysqli("localhost", "root", "", "Base_Client");

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Échec de la connexion: " . $conn->connect_error);
}

// استرجاع البيانات من النموذج
$No_Clt = $_POST['No_Clt'];
$Pno_Clt = $_POST['Pno_Clt'];
$Age_Clt = $_POST['Age_Clt'];
$Wi_Clt = $_POST['Wi_Clt'];
$Tel_Clt = $_POST['Tel_Clt'];
$Mail_Clt = $_POST['Mail_Clt'];
$Adr_Clt = $_POST['Adr_Clt'];
$Mot_Clt = $_POST['Mot_Clt'];
$Sexe_Clt = $_POST['Sexe_Clt'];

// تنفيذ استعلام الإدخال
$sql = "INSERT INTO Client (No_Clt, Pno_Clt, Age_Clt, Wi_Clt, Tel_Clt, Mail_Clt, Adr_Clt, Mot_Clt, Sexe_Clt)
VALUES ('$No_Clt', '$Pno_Clt', $Age_Clt, '$Wi_Clt', $Tel_Clt, '$Mail_Clt', '$Adr_Clt', '$Mot_Clt', '$Sexe_Clt')";

if ($conn->query($sql) === TRUE) {
    echo "Inscription réussie.";
} else {
    echo "Erreur : " . $conn->error;
}

$conn->close();
?>
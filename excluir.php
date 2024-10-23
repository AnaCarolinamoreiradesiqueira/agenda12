<?php
 $host = "localhost:3306";
 $user = "root";
 $pass = "";
$dbname = "cadastro";
$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$nmevent = $_POST['nmevent'];
$dtevent = $_POST['dtevent'];


$sql = "DELETE FROM cadastro WHERE nmevent = ? AND dtevent = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nmevent, $dtevent);

if ($stmt->execute()) {
    echo "Registro excluído com sucesso.";
} else {
    echo "Erro ao excluir o registro: " . $conn->error;
}

$stmt->close();
$conn->close();


header("Location: lista.php");
exit();
?>

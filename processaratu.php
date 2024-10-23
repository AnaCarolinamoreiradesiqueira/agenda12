<?php
 $host = "localhost:3306";
 $user = "root";
 $pass = "";
$dbname = "cadastro";
$conn = new mysqli($host, $user, $pass, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $old_nmevent = $_POST['old_nmevent'];
    $old_dtevent = $_POST['old_dtevent'];
    $nmevent = $_POST['nmevent'];
    $dtevent = $_POST['dtevent'];
    $hrincevent = $_POST['hrincevent'];
    $hrfimevent = $_POST['hrfimevent'];
    $descrievent = $_POST['descrievent'];
    $localevent = $_POST['localevent'];
    $responevent = $_POST['responevent'];

    
    $query = "UPDATE cadastro SET nmevent = ?, dtevent = ?, hrincevent = ?, hrfimevent = ?, descrievent = ?, localevent = ?, responevent = ? WHERE nmevent = ? AND dtevent = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssisss", $nmevent, $dtevent, $hrincevent, $hrfimevent, $descrievent, $localevent, $responevent, $old_nmevent, $old_dtevent);
    
    if ($stmt->execute()) {
       
        header("Location: lista.php"); 
        exit;
    } else {
        echo "Erro ao atualizar o evento: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo "Método de requisição inválido.";
}

$conn->close();
?>

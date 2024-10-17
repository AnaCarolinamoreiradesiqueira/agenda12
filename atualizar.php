<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleatu.css">
   
</head>
<?php
$host = "localhost:3306";
$user = "root";
$pass = "planejamento";
$dbname = "teste";
$conn = new mysqli($host, $user, $pass, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nmevent = $_POST['nmevent'];
    $dtevent = $_POST['dtevent'];

    
    $query = "SELECT * FROM cadastro WHERE nmevent = ? AND dtevent = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $nmevent, $dtevent);
    $stmt->execute();
    $result = $stmt->get_result();
    $evento = $result->fetch_assoc();

  
    if (!$evento) {
        echo "Evento não encontrado.";
        exit;
    }

    
    ?>
    <h2>Atualizar Evento</h2>
    <form action="processaratu.php" method="post">
        <input type="hidden" name="old_nmevent" value="<?php echo htmlspecialchars($evento['nmevent']); ?>">
        <input type="hidden" name="old_dtevent" value="<?php echo htmlspecialchars($evento['dtevent']); ?>">
        
        <label>Nome do Evento:</label>
        <input type="text" name="nmevent" value="<?php echo htmlspecialchars($evento['nmevent']); ?>" required><br><br>
        
        <label>Data do Evento:</label>
        <input type="date" name="dtevent" value="<?php echo htmlspecialchars($evento['dtevent']); ?>" required><br><br>
        
        <label>Horário de Início:</label>
        <input type="time" name="hrincevent" value="<?php echo htmlspecialchars($evento['hrincevent']); ?>" required><br><br>
        
        <label>Horário de Fim:</label>
        <input type="time" name="hrfimevent" value="<?php echo htmlspecialchars($evento['hrfimevent']); ?>" required><br><br>
        
        <label>Descrição do Evento:</label>
        <textarea name="descrievent" required><?php echo htmlspecialchars($evento['descrievent']); ?></textarea><br><br>
        
        <label>Local do Evento:</label>
        <input type="text" name="localevent" value="<?php echo htmlspecialchars($evento['localevent']); ?>" required><br><br>
        
        <label>Responsável do Evento:</label>
        <input type="text" name="responevent" value="<?php echo htmlspecialchars($evento['responevent']); ?>" required><br><br>
        
        <input type="submit" value="Atualizar">
    </form>
    <?php
} else {
    echo "Método de requisição inválido.";
}

$conn->close();
?>
</body>
</html>
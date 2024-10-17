<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylelista.css">
   
</head>
<?php
$servername = "localhost";
$username = "root";
$password = "planejamento";
$dbname = "teste";
$conn = new mysqli($servername, $username, $password, $dbname);

$dataPesquisa = isset($_POST['data_evento']) ? $_POST['data_evento'] : '';


if ($dataPesquisa) {
    $stmt = $conn->prepare("SELECT * FROM cadastro WHERE dtevent = ?");
    $stmt->bind_param("s", $dataPesquisa);
    $stmt->execute();
    $resultselect = $stmt->get_result();

    if ($resultselect->num_rows > 0) {
        echo "<table border=3px> 
                <tr> 
                    <td>NOME DO EVENTO</td> 
                    <td>DATA DO EVENTO</td> 
                    <td>HORARIO DE INICIO</td> 
                    <td>HORARIO DE FIM</td> 
                    <td>DESCRIÇÃO DO EVENTO</td> 
                    <td>LOCAL DO EVENTO</td> 
                    <td>RESPONSÁVEL DO EVENTO</td>
                    
                </tr>";

        while ($escrever = $resultselect->fetch_assoc()) {
            echo "<tr>
                    <td>" . htmlspecialchars($escrever['nmevent']) . "</td>
                    <td>" . htmlspecialchars($escrever['dtevent']) . "</td>
                    <td>" . htmlspecialchars($escrever['hrincevent']) . "</td>
                    <td>" . htmlspecialchars($escrever['hrfimevent']) . "</td>
                    <td>" . htmlspecialchars($escrever['descrievent']) . "</td>
                    <td>" . htmlspecialchars($escrever['localevent']) . "</td>
                    <td>" . htmlspecialchars($escrever['responevent']) . "</td>
<td>
 <form action='atualizar.php' method='post' style='display:inline;'>
                    <input type='hidden' name='nmevent' value='" . htmlspecialchars($escrever['nmevent']) . "'>
                    <input type='hidden' name='dtevent' value='" . htmlspecialchars($escrever['dtevent']) . "'>
                    <input type='submit' value='Atualizar'>
                </form>
                <p>
                <form action='excluir.php' method='post' style='display:inline;'>
                    <input type='hidden' name='nmevent' value='" . htmlspecialchars($escrever['nmevent']) . "'>
                    <input type='hidden' name='dtevent' value='" . htmlspecialchars($escrever['dtevent']) . "'>
                    <input type='submit' value='Excluir' onclick='return confirm(\"Tem certeza que deseja excluir?\");'>
                </form>
            </td>
          </tr>";


        }

        echo "</table>";
    } else {
        echo "<p>Não tem evento agendado para esta data.</p>";
    }
    ?>

    <button onclick="window.location.href='index.php';">Voltar</button>
    
    <?php
    exit();


    $stmt->close();
} 

$conn->close();
?>
</body>
</html>

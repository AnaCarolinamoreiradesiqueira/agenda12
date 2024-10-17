<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylelista.css">
</head>

<body>
<?php
$host = "localhost:3306";
$user = "root";
$pass = "planejamento";
$dbname = "teste";
$conn = new mysqli($host, $user, $pass, $dbname);

$resultselect = mysqli_query($conn, "SELECT * FROM cadastro;");

echo "<table border='3px'> 
        <tr> 
            <td>NOME DO EVENTO</td> 
            <td>DATA DO EVENTO</td> 
            <td>HORARIO DE INICIO</td> 
            <td>HORARIO DE FIM</td> 
            <td>DESCRIÇÃO DO EVENTO</td> 
            <td>LOCAL DO EVENTO</td> 
            <td>RESPONSÁVEL DO EVENTO</td> 
            <td>AÇÕES</td>
        </tr>";

while($escrever = mysqli_fetch_array($resultselect)) {
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

echo "<br><br>";
?>

<button onclick="window.location.href='index.php';">Voltar</button>

<?php
mysqli_close($conn);
?>
</body>
</html>

<?php
$NMEVENT = $_POST['nmevent'];
$DTEVENT = $_POST['dtevent'];
$HRINCEVENT = $_POST['hrincevent'];
$HRFIMEVENT = $_POST['hrfimevent'];
$DESCRIEVENT = $_POST['descrievent'];
$LOCALEVENT = $_POST['localevent'];
$RESPONEVENT = $_POST['responevent'];
$host = "localhost:3306";
$user = "root";
$pass = "";
$dbname = "cadastro";
$conn = new mysqli($host, $user, $pass, $dbname);


$resultinsert = mysqli_query($conn, "INSERT INTO cadastro (nmevent, dtevent, hrincevent, hrfimevent, descrievent, localevent, responevent) VALUES ('$NMEVENT', '$DTEVENT', '$HRINCEVENT', '$HRFIMEVENT', '$DESCRIEVENT', '$LOCALEVENT', '$RESPONEVENT')");


    
    
    if ($resultinsert) {
        echo "<p>Cadastro realizado!</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php'; 
                }, 3000); // 3000 milliseconds = 3 seconds
              </script>";
    } else {
        echo "<p>Erro ao realizar o cadastro: " . mysqli_error($conn) . "</p>";
    }
    
    $conn->close();
    ?>
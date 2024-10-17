<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styleagen.css">
    <title>AGENDA DE COMPROMISSOS</title>
</head>
<body>
<div class="background"></div>
<div class="linha">
    <form action="dados.php" method="post">
        <h2>Cadastro de compromissos</h2>
        
        <label for="nmevent">Nome do evento:</label>
        <input type="text" id="nmevent" name="nmevent" required>
        
        <label for="dtevent">Data do evento:</label>
        <input type="date" id="dtevent" name="dtevent" required>
        
        <label for="hrincevent">Horário de início:</label>
        <input type="time" id="hrincevent" name="hrincevent" required>
        
        <label for="hrfimevent">Horário do fim:</label>
        <input type="time" id="hrfimevent" name="hrfimevent" required>
        
        <label for="descrievent">Descrição do evento:</label>
        <input type="text" id="descrievent" name="descrievent" required>
        
        <label for="localevent">Local do evento:</label>
        <input type="text" id="localevent" name="localevent" required>
        
        <label for="responevent">Responsável do evento:</label>
        <input type="text" id="responevent" name="responevent" required>
        
        <button type="submit">Cadastrar evento</button>
    </form>

    <div>
        <h2>Consultar compromissos</h2>
        <form method="post" action="consultar.php">
            <label for="data_evento">Pesquise por data do compromisso:</label>
            <input type="date" id="data_evento" name="data_evento">
            <input type="submit" value="Pesquisar">
        </form>
        <br>
        <a href="lista.php"><button type="button">Lista de compromissos</button></a>
    </div>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        const inputs = this.querySelectorAll('input[required]');
        let allFilled = true;

        inputs.forEach(input => {
            if (!input.value) {
                allFilled = false;
                input.style.borderColor = 'red';
            } else {
                input.style.borderColor = '';
            }
        });

        if (!allFilled) {
            alert('Por favor, preencha todos os campos obrigatórios!');
            event.preventDefault();
        }
    });
</script>
</body>
</html>

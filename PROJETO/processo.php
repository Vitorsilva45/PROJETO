<script>
const select = document.getElementById("queixa_principal");
const campoOutro = document.getElementById("campo_outro");
const outroMotivo = document.getElementById("outro_motivo");

select.addEventListener("change", function () {
    if (this.value === "Outro") {
        campoOutro.style.display = "block";
        outroMotivo.required = true;
    } else {
        campoOutro.style.display = "none";
        outroMotivo.required = false;
        outroMotivo.value = "";
    }
});
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function limpar($valor) {
        return htmlspecialchars(trim($valor));
    }

    $nome = limpar($_POST['nome'] ?? '');
    $data_nascimento_crua = limpar($_POST['data_nascimento'] ?? '');
    $sexo = limpar($_POST['sexo'] ?? '');
    $cpf = limpar($_POST['cpf'] ?? '');
    $rg = limpar($_POST['rg'] ?? '');
    $endereco = limpar($_POST['endereco'] ?? '');
    $telefone = limpar($_POST['telefone'] ?? '');
    $email = limpar($_POST['email'] ?? '');
    $profissao = limpar($_POST['profissao'] ?? '');
    $queixa = limpar($_POST['queixa_principal'] ?? '');
    $tratamento = limpar($_POST['tratamento'] ?? 'Não informado'); // Capturando o campo esquecido

    // Formatando a data de AAAA-MM-DD para DD/MM/AAAA
    $data_nascimento = "";
    if (!empty($data_nascimento_crua)) {
        $date = new DateTime($data_nascimento_crua);
        $data_nascimento = $date->format('d/m/Y');
    }

} else {
    die("Acesso inválido.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Recebido</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: #f0f2f5;
        padding: 30px;
    }

    .box {
        max-width: 700px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #2e7d32;
        margin-bottom: 20px;
        border-bottom: 2px solid #2e7d32;
        padding-bottom: 10px;
    }

    p {
        margin-bottom: 12px;
        font-size: 16px;
        color: #333;
        line-height: 1.5;
    }

    strong {
        color: #0056b3;
    }

    .btn {
        display: inline-block;
        margin-top: 20px;
        background: #0056b3;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: 0.3s;
    }

    .btn:hover {
        background: #003d80;
    }
    </style>
</head>

<body>

    <div class="box">
        <h1>Cadastro Recebido com Sucesso</h1>

        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo $data_nascimento; ?></p>
        <p><strong>Sexo:</strong> <?php echo $sexo; ?></p>
        <p><strong>CPF:</strong> <?php echo $cpf; ?></p>
        <p><strong>RG:</strong> <?php echo $rg; ?></p>
        <p><strong>Endereço:</strong> <?php echo $endereco; ?></p>
        <p><strong>Telefone:</strong> <?php echo $telefone; ?></p>
        <p><strong>E-mail:</strong> <?php echo $email; ?></p>
        <p><strong>Profissão:</strong> <?php echo $profissao; ?></p>
        <p><strong>Queixa Principal:</strong> <?php echo $queixa; ?></p>
        <p><strong>Em tratamento médico?</strong> <?php echo $tratamento; ?></p>

        <a href="index.html" class="btn">Voltar</a>
    </div>

</body>

</html>
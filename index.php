<?php
include("conexao.php");
include_once ("ViaCEP.php");
function validar_dados($data) {
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data;
}
function usuarioJaExiste($cpf, $email) {
    global $conn;
    $sql_select = "SELECT * FROM usuarios WHERE cpf='$cpf' OR email='$email'";
    $result = $conn->query($sql_select);
    return $result->num_rows > 0;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = validar_dados($_POST['nome']);
    $cpf = validar_dados($_POST['cpf']);
    $email = validar_dados($_POST['email']);
    $data_nascimento = validar_dados($_POST['data']);
    $senha = validar_dados($_POST['senha']);
    $cep = validar_dados($_POST['cep']);
    $rua = isset($_POST['rua']) ? validar_dados($_POST['rua']) : '';
    $estado = isset($_POST['estado']) ? validar_dados($_POST['estado']) : '';
    $cidade = isset($_POST['cidade']) ? validar_dados($_POST['cidade']) : '';
    $bairro = isset($_POST['bairro']) ? validar_dados($_POST['bairro']) : '';

    if (usuarioJaExiste($cpf, $email)) {
        echo "O registro já existe.";
        exit();
    }

    $sql_select = "SELECT * FROM usuarios WHERE nome='$nome' AND cpf='$cpf' AND email='$email' AND data_nasc='$data_nascimento' AND senha='$senha' AND cep='$cep' AND rua='$rua' AND estado='$estado' AND cidade='$cidade' AND bairro='$bairro'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        echo "O registro já existe.";
        exit();
    }

    $sql_insert = "INSERT INTO usuarios (nome, cpf, email, data_nasc, senha, estado, cidade, rua, cep, bairro) 
                    VALUES ('$nome', '$cpf', '$email', '$data_nascimento', '$senha', '$estado', '$cidade', '$rua', '$cep', '$bairro')";
    
    if ($conn->query($sql_insert) === TRUE) {
    } else {
        echo "Erro: " . $sql_insert . "<br>" . $conn->error;
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="style.css"  rel="stylesheet">
</head>

<body>
    <h1 id="titulo">Cadastro</h1>
    <P id="subtitulo">Complete com suas informações</P>
    <br>
   
    <form class="formulario" method="POST">
        <div class="mb-3" id="div">
            <label for="exampleInputEmail1" class="form-label" req >Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" aria-describedby="emailHelp" required>
            <label for="exampleInputnumber" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="emailHelp" required>
            <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
            <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" required>
            <label for="datanasc" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="data" name="data" aria-describedby="emailHelp" required>
            <br>
            <h6>Digite o seu CEP</h6>
            <input type="text" class="form-control" id="cep" name="cep" required>
            <input type="text" placeholder="Rua" id="rua" name="rua" disabled>
            <input type="text"placeholder="Bairro" id="bairro" name="bairro" disabled>
            <input type="text" placeholder="Cidade" id="cidade" name="cidade" disabled>
            <input type="text" placeholder="Estado" id="estado" name="estado" disabled>
            <h6> Selecione seu Gênero</h6>
            <br>
            <label class="custom-radio">
            <input type="radio" name="genero"> Masculino
            </label>
            <label class="custom-radio">
            <input type="radio" name="genero"> Feminino
            </label>
            <label class="custom-radio">
            <input type="radio" name="genero"> Prefiro não informar
            </label>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label" required >Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" require>
            <label for="exampleInputPassword1" class="form-label" >Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmsenha" name="confirma_senha" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Confirmar</label>
        </div>
        <button type="submit" id ="botao" class="btn btn-primary" onclick="validarFormulario()">Cadastrar</button>
        <br>
        <br>
        <a href="Lista.php">
        <button id="botao" type="button">Acessar Lista de Cadastro</button>
        </a>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>

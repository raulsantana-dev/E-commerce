<?php
session_start();
include_once("conexao.php");
function validar_dados($data) {
    $data = trim($data);
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $id = $_POST['id'];
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

    // Executar a consulta de atualização
    $sql_update = "UPDATE usuarios SET nome='$nome', cpf='$cpf', email='$email', data_nasc='$data_nascimento', senha='$senha', cep='$cep', rua='$rua', estado='$estado', cidade='$cidade', bairro='$bairro' WHERE id=$id";

    if ($conn->query($sql_update) === TRUE) {
        $_SESSION['update_done'] = true; // Marque a atualização como feita
        echo "Update realizado";
        header('Location: Lista.php');
        exit(); // Pare a execução do script após o redirecionamento
    } else {
        echo "Erro: " . $sql_update . "<br>" . $conn->error;
    }
}
?>

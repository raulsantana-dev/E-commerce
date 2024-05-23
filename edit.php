<?php
if (!empty($_GET['id']))
{
    include_once('conexao.php');

    $id = $_GET['id'];
    function validar_dados($data) {
        $data = trim($data);
        $data = stripslashes($data); 
        $data = htmlspecialchars($data); 
        return $data;
    }

    $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";
    $result = $conn->query($sqlSelect);
    if($result-> num_rows > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $_GET['id'];
            $nome = validar_dados($row ['nome']);
            $cpf = validar_dados($row ['cpf']);
            $email = validar_dados($row ['email']);
            $data_nascimento = validar_dados($row ['data_nasc']);
            $senha = validar_dados($row ['senha']);
            $cep = validar_dados($row ['cep']);
            $rua = isset($row ['rua']) ? validar_dados($row ['rua']) : '';
            $estado = isset($row ['estado']) ? validar_dados($row ['estado']) : '';
            $cidade = isset($row ['cidade']) ? validar_dados($row ['cidade']) : '';
            $bairro = isset($row ['bairro']) ? validar_dados($row ['bairro']) : '';
        }
   
    }
    else{
        header('Location: index.php');
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
    <h1 id="titulo"></h1>
    <P id="subtitulo">Atualize suas informaçoes</P>
    <br>
   
    <form class="formulario" action="salvaEdit.php" method="POST">
        <div class="mb-3" id="div">
            <label for="exampleInputEmail1" class="form-label" req >Nome Completo</label>
            <input type="text" class="form-control" id="nome" value="<?php echo $nome?>" name="nome" aria-describedby="emailHelp" required>
            <label for="exampleInputnumber" class="form-label">CPF</label>
            <input type="text" class="form-control" id="cpf" value="<?php echo $cpf?>" name="cpf" aria-describedby="emailHelp" required>
            <label for="exampleInputEmail1" class="form-label">Endereço de Email</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email?>" name="email" aria-describedby="emailHelp" required>
            <label for="datanasc" class="form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="data" value="<?php echo $data_nascimento?>" name="data" aria-describedby="emailHelp" required>
            <br>
            <h6>Digite o seu CEP</h6>
            <input type="text" class="form-control" id="cep" value="<?php echo $cep?>" name="cep" required>
            <input type="text" placeholder="Rua" id="rua"  value="<?php echo $rua?>" name="rua" disabled>
            <input type="text"placeholder="Bairro" id="bairro" value="<?php echo $bairro?>" name="bairro" disabled>
            <input type="text" placeholder="Cidade" id="cidade" value="<?php echo $cidade?>" name="cidade" disabled>
            <input type="text" placeholder="Estado" id="estado" value="<?php echo $estado?>" name="estado" disabled>
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
            <input type="password" class="form-control" id="senha" value="<?php echo $senha?>" name="senha" require>
            <label for="exampleInputPassword1" class="form-label" >Confirmar Senha</label>
            <input type="password" class="form-control" id="confirmsenha" name="confirma_senha" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Confirmar</label>
        </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    
    <input type="submit" name="update" value="Atualizar">
        <br>
        <br>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>

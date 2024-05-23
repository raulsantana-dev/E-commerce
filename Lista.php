<?php
include("conexao.php");
$sql_select = "SELECT * FROM usuarios";

$result = $conn->query($sql_select);

if ($result === FALSE) {
    echo "Erro na consulta: " . $conn->error;
} else {
    echo "<h1 Lista De Usuários Cadastrados</h1>";
    echo "<table border='1'>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Editar cadastros</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['id'] . " </td>
                <td>" . $row['nome'] . "</td>
                <td>" . $row['cpf'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['data_nasc'] . "</td>
                <td>
                <a class= 'btn btn-primary' href='edit.php?id=$row[id]'.>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                 <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                </svg>
                </a>
                </td>
             </tr>";
    }

    echo "</table>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css"  rel="stylesheet">
    <title>Lista de usuarios Cadastrados</title>
</head>
<body>

</body>
</html>
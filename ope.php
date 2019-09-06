<?php 
// session_start inicia a sessão
session_start();
// as variáveis email e senha recebem os dados digitados na página anterior
$email = $_POST['email'];
$senha = $_POST['senha'];
$conn = mysqli_connect("localhost", "admin", "admin", "agrocomunicacao");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// A variavel $result pega as varias $email e $senha, faz uma 
//pesquisa na tabela de usuarios
$sql = "SELECT * FROM usuario 
WHERE email = '$email' AND senha= '$senha'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    /*while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Email: " . $row["email"]. " - Senha: " . $row["senha"]. "<br>";
    }*/ 
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:site.php');
} else {
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
    header('location:login.html');
}
$conn->close();
?>
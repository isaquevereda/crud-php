<?php
if (isset($_POST['criar'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nome = validate($_POST['nome']);
    $email = validate($_POST['email']);
    
    $user_data = 'nome='.$nome.'&email='.$email;

    if (empty($nome)){
        header("Location: ../index.php?error=Nome é necessário&$user_data");
    } else if (empty($email)){
        header("Location: ../index.php?error=Email é necessário&$user_data");
    } else{
        $sql = "INSERT INTO users(nome, email) 
                VALUES('$nome', '$email')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: ../read.php?success=Criado com sucesso");
        } else {
            header("Location: ../index.php?error=Ocorreu um erro&$user_data");
        }
    }
}
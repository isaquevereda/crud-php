<?php

if (isset($_GET['id'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: read.php");
    }
} else if(isset($_POST['editar'])) {
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_POST['id']);
    $nome = validate($_POST['nome']);
    $email = validate($_POST['email']);
    
    if (empty($nome)){
        header("Location: ../update.php?id=$id&error=Nome é necessário");
    } else if (empty($email)){
        header("Location: ../update.php?id=$id&error=Email é necessário");
    } else{
        $sql = "UPDATE users 
                SET nome='$nome', email='$email' 
                WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if ($result){
            header("Location: ../read.php?success=Editado com sucesso");
        } else {
            header("Location: ../update.php?error=Ocorreu um erro");
        }
    }
}
else {
    header("Location: read.php");
}
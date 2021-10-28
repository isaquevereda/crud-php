<?php include "php/read.php";  ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="box">
            <h4 class="display-4 text-center">Usuários</h4><hr>
            <?php if (isset($_GET['success'])) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_GET['success']; ?>
            </div>
            <?php } ?>
            <?php if (mysqli_num_rows($result)){?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 0;
                    while($rows = mysqli_fetch_assoc($result)){
                    $i++;
                    ?>
                        <tr>
                            <th scope="row"><?=$i?></th>
                            <td><?=$rows['nome']?></td>
                            <td><?=$rows['email']?></td>
                            <td>
                                <a href="update.php?id=<?=$rows['id']?>" class="btn btn-success"><i class="bi bi-pen"></i> Editar</a>
                                <a href="php/delete.php?id=<?=$rows['id']?>" class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <?php }?>
                <div class="link-right">
                    <a href="index.php" class="link-primary">Criar</a>
                </div>
        </div>
    </div> 
</body>
</html>
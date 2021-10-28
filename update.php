<?php include "php/update.php";  ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="php/update.php" method="post">
            <h4 class="display-4 text-center">Editar</h4><hr><br>
            <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
            <?php } ?>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="nome" class="form-control" id="nome" name="nome" value="<?=$row['nome']?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?=$row['email']?>">
            </div>
            <input type="text" name="id" value="<?=$row['id']?>" hidden>
            <button type="submit" class="btn btn-primary" name="editar">Editar</button>
            <a href="read.php" class="link-primary">Usuários</a>
        </form>
    </div>    
</body>
</html>
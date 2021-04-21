<?php include 'connect.php';?>
<!doctype html>
    <html lang="en">
    <head>
        <title>MyProject</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body class="bg-body text-white">

    <!----------------------Project navbar section----------------------------->

        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorie
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                
                                $query = "SELECT * FROM categorie";
                                $result = $mysql->query($query);
                                while($row = $result->fetch_assoc()): 
                            ?>
                            <a class="dropdown-item" href="#"><?php echo $row['nome'];?></a>
                            <?php endwhile;?>
                        </div>
                    </li>
                    <li class="nav-item add-menu">
                        <a class="nav-link" href="./Project/create.php">Crea Progetto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </nav>

    <!----------------------Project container section----------------------------->

        <div class="container">
            <div class="row justify-content-center col-12">
                <?php 
                    $mysql = new mysqli('localhost', 'test', 'test', 'todo_db');
                    if($mysql->connect_error){
                        echo "failed to connect to mysql";
                    }
                    $query = "SELECT * FROM progetti";
                    $result = $mysql->query($query);    
                    while($row=$result->fetch_assoc()):    
                ?>
                <div class="m-3">
                <?php if($row['attivo']==true): ?>
                    <div class="card text-dark h-100" style="width: 18rem;">
                <?php else: ?>
                    <div class="card text-light bg-inactive col-lg-3 h-150" style="width: 18rem;">
                <?php endif; ?>
                        <?php if($row['categoria']==1): ?>
                            <img src="./img/web.jpeg" alt="Web" class="card-img-top">
                        <?php elseif($row['categoria']==2): ?>
                            <img src="./img/cybersecurity.jpg" alt="Web" class="card-img-top">
                        <?php elseif($row['categoria']==3): ?>
                            <img src="./img/challenge.jpg" alt="Web" class="card-img-top">
                        <?php elseif($row['categoria']==4): ?>
                            <img src="./img/unict.png" alt="Web" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <h3 class="card-title"><?php echo $row['nome']?></h3>
                            <p class="card-text"><?php echo $row['descrizione']?></p>
                            <?php if($row['attivo']==true): ?>
                                <a href="./Todo/project.php?project=<?php echo $row['id']?>" class="btn btn-sm btn-outline-success">Apri</a>
                                <a href="./Project/edit.php?edit=<?php echo $row['id']?>" class="btn btn-sm btn-outline-warning">Modifica</a>
                                <a href="./Project/delete.php?delete=<?php echo $row['id']?>" class="btn btn-sm btn-outline-danger">Elimina</a>
                            <?php else: ?>
                                <a href="#" class="btn btn-sm btn-light">Recupera</a>
                                <a href="./Project/delete.php?delete=<?php echo $row['id']?>" class="btn btn-sm btn-outline-danger">Elimina</a>
                            <?php endif; ?>
                                
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!----------------------Project add button section----------------------------->

        <a href="./Project/create.php" class="btn btn-accent btn-action-lg btn-raised btn-pr bg-primary">
            <i class="fas fa-2x fa-plus"></i>
        </a>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
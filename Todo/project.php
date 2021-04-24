<?php include '../connect.php';?>
<!doctype html>
    <html lang="en">
    <head>
        <title>MyProject</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/form_style.css">
    </head>
    <body class="bg-body text-white">
    <?php
        $id = $_GET['project'];
        $query = "SELECT * FROM progetti WHERE id = '$id'";
        $result = $mysql->query($query) or die($mysql->error);
        if(count($result)==1){
            $project = $result->fetch_assoc();
        } 
    ?> 
    <!----------------------Project navbar section----------------------------->

        <nav class="navbar navbar-expand-lg navbar-dark bg-black">
            <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../index.php">Dashboard <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categorie
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                                $mysql = new mysqli('localhost', 'test', 'test', 'todo_db');
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

    <!----------------------Project detail and todo----------------------------->
                           
    <div class="jumbotron bg-secondary">
        <h1 class="display-4"><?php echo $project['nome']?></h1>
        <p class="lead"><?php echo $project['descrizione']?></p>
    </div>                     
    <div class="container">
        <div class="row">
            <?php
                $query_2 = "SELECT * FROM todos WHERE id_progetto = '$project[id]'";
                $result_2 = $mysql->query($query) or die($mysql->error);
            ?> 
            <div class="table-responsive">
                <table class="table">
                    <caption>List of users</caption>
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($todos = $result_2->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $todos['titolo']?></td>
                            <td>
                                <?php if($todos['completato']==0):?>
                                <button type="button" class="btn btn-success">Success</button>
                                <?php else: ?>
                                <button type="button" class="btn btn-dark">Dark</button>
                                <?php endif; ?>
                                <button type="button" class="btn btn-warning">Warning</button>
                            </td>
                        </tr>
                        <?php endwhile ?>
                    </tbody>
                </table>
            </div>                                  
        </div>
    </div>                                 
  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
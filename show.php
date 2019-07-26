<?php
//function getTask($data){
//$pdo=new PDO('mysql:host=192.168.10.10; dbname=notepad_crud; charset=utf8','homestead', 'secret');
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$sql='Select * from  tasks where id=:id';
//$stmt=$pdo->prepare($sql);
//$stmt->execute($data);
//$task=$stmt->fetch(PDO::FETCH_ASSOC);
//return $task;
//}
//$task = getTask($_GET);
$id = $_GET['id'];
require 'database/querybilder.php';
$my_getOne = new querybilder();
//$task = $my_getOne->getOne($_GET);
$task = $my_getOne->getOne("tasks", $id);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>My NotePad</title>
</head>
<body>

<div class="container">

    <div class="row text-center text-center">
        <div class="col-md-12 bg-info"><h1>My NotePad</h1></div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <th scope="row"><?= $task['id'];?></th>
                        <td><?= $task['title'];?></td>
                        <td class="text-left"><?= $task['content'];?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="web/index.php" name="Go back">Go back...</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-info"><h1></h1></div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
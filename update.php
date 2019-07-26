<?php

$data= [
        'id'=>$_GET['id'],
        'title'=>$_POST['title'],
        'content'=>$_POST['content']
       ];

require 'database/querybilder.php';
$my_updateTask = new querybilder();
$my_updateTask->update('tasks', $data);

Header('Location: /index.php');
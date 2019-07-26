<?php
class querybilder{

//    public function connect(){
//        $pdo = new PDO('mysql:host=192.168.10.10; dbname=notepad_crud; charset=utf8', 'homestead', 'secret');
//        $pdo->setAttribute(PDO::ERRMODE_EXCEPTION, PDO::ATTR_ERRMODE);
//        return $pdo;
//    }

    public $pdo;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=192.168.10.10; dbname=notepad_crud; charset=utf8', 'homestead','secret');
    }

    public function selectAll($table){
        $sql="select * from $table";
        $stmt=$this->pdo->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteOne($table, $id)
    {
        $sql = "delete from $table where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    //var_dump($result);
    }

    public function getOne($table, $id){
        $sql="Select * from  $table where id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $task=$stmt->fetch(PDO::FETCH_ASSOC);
        return $task;
    }

    function update($title, $data){
        $fields = '';

        foreach ($data as $key => $value) {
            $fields .=$key . "=:" . $key.",";
        }
        $fields = rtrim($fields, ",");

        $sql = "update $title set $fields WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
    }

    public function add($table, $data)
    {
        $arr = array_keys ($data);
        $keys = implode(',',$arr);
        $values = ":".implode(', :', $arr);
        $sql = "insert into $table($keys) values ($values)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
//var_dump($result);
    }

    public function changStatusUsers($id, $status){
        $sql = "update users set status_ban=:status where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $return = $stmt->fetch(PDO::FETCH_ASSOC);
        return $return;
    }

    public function getStatusUsers($id){
        $sql = "Select status_ban from users where id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['status_ban']==0){
            return 'normal';
        }else{
            return 'banned';
        }

    }

    public function fullName($id){
        $sql="select email from users where id=:id";
        $stmt=$this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addImg($id, $img){
        $sql = 'update users set img=:img where id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
//$edit = new querybilder();
//$task=$edit->show();
//var_dump($task);



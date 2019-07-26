<?php
class Auth{
    public $db;

    public function __construct(querybilder $db)
    {
        $this->db = $db;
    }

    public function registration($email, $password){
        $this->db->add('users', [
                                    'email' => $email,
//                                    'password' => md5($password)
                                    'password' => $password
                                    ]);
    }

    public function login($email, $password){
        $sql = "Select * from users where email=:email and password = :password LIMIT 1";
        $stmt = $this->db->pdo->prepare($sql);
        $stmt ->bindParam(":email", $email);
        $stmt ->bindParam(":password", $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
//        return $user;
        if($user){
            $_SESSION['user'] = $user;
            return true;
        }else{
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        return $_SESSION;
    }

    public function check(){
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }

    public function currentuser(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
    }

}
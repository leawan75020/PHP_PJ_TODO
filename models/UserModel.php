<?php



include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/models/BD.php";

class UserModel extends DB
{
  
  private $email;
  private $password;

  function __construct($email, $password)
  {
    parent:: __construct();
    $this->email = $email;
    $this->password = $password;

  }

  function addToDB(){
    $stmt = $this->getConnect() -> prepare('INSERT INTO users(email,password) VALUES(?,?)');

    $stmt->bindParam(1, $this->email);
    $stmt->bindParam(2, $this->password);
    $stmt ->execute();
  }
  
  function fetch(): array{
    //declarer la requet sql
    $stmt = $this->getConnect() -> prepare('SELECT * FROM users WHERE email=?');
    //ajout du parametre
    $stmt->bindParam(1, $this->email);

    //execute la requete
    $res= $stmt ->execute();
    //recuperer les info retournées par la requete
    $userFromDB= $stmt ->fetch(PDO::FETCH_ASSOC);//[email:lea@gmail.com,password: mdp]

    return $userFromDB;

  }

}
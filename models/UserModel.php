<?php



include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/models/DB.php";

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

    //si la requete ne retourner rien 0
    if(is_bool($userFromDB)){//retourne vrai si c'est un boolean
      return [];

    }

    return $userFromDB;

  }

  static function fetchByID($id){
        $connect = DB::getConnection();
        $stmt= $connect->getConnect() ->prepare('SELECT * FROM users WHERE id =?');
        $stmt->bindParam(1 , $id);
        $res = $stmt ->execute();
        $userFromDB = $stmt->fetch(PDO::FETCH_ASSOC);
        return $userFromDB;
    }

    function saveImageToDB($image){
        $stmt= $this->getConnect() ->prepare('UPDATE users SET avatarURL=? WHERE email=?');
        $stmt->bindParam(1 , $image);
        $stmt->bindParam(2 , $this->email);
        $stmt->execute();
        //pas de fetch car il n y a pas de résultat à recuperer
    }

}
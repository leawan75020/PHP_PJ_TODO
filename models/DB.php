<?php





class DB
{
    private $connect;
    
    function __construct(){
      //connexion a la BD Mysql av l'invocation de pilot
      $dsn ='mysql:dbname=todo;host=localhost';
      $user ='root';
      $password = '';
      $this->connect = New PDO($dsn, $user, $password);

    }
    /**
     * Get the value of connect
     */ 
    //set the value of connection
    public function getConnect(){
      return $this->connect;
    }

    static function getConnection(){
      //static car je ne veut pas changer cette fonction
      return new self();
    }
  }
<?php



include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/models/UserModel.php";


class UserController
{
    private $email;
    private $password;
    private $id;
    private $avatarURL;
    private $role;
    

    private const MIN_PASSWORD_LENGTH =6;

    function __construct(string $email, string $password)
    {
      $this->email = $email;
      $this->password = $password;
     
    }

    function isEmailValid():bool
    {
      return filter_var($this->email, FILTER_VALIDATE_EMAIL);
    }

    function isPasswordValid():bool
    {
      return strlen($this->password) >= self:: MIN_PASSWORD_LENGTH;
    }
    function isDATAValid():bool
    {
      return $this->isEmailValid() && $this ->isPasswordValid();
    }
    
    function signupUser()
    {
    //save des infos dans les BD

    $userModel = new UserModel($this->email,$this->password);
    
    $userModel->addToDB();
    var_dump( $this->email);

    }

    //.get the value of email
    public function getEmail(){
      return $this->email;
    }
    /**
     * set the value of email
     * @return self
     */

    public function setPassword($password){
      $this->password = $password;
      return $this;
    }

    function exist()
    {

    //
    $userModel = New UserModel($this->email,$this->password);

    $userTab = $userModel ->fetch();
    var_dump($userTab);


    if(count($userTab) === 0){
      return false;
    }else{
      $this->id = $userTab['id'];
      $this->avatarURL = $userTab['avatar'];
      $this->role = $userTab['role'];


      return true;
    }
    


    
    }


}
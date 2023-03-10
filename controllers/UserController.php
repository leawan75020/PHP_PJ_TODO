<?php



include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/models/UserModel.php";
include_once $_SERVER['DOCUMENT_ROOT']."/PHPcours/TODO/controllers/TodoController.php";


class UserController
{
    private $email;
    private $password;
    private $id;
    private $avatarURL;
    private $role;
    private $todos =[];


    private $userModel;
    

    private const MIN_PASSWORD_LENGTH =6;

    function __construct(string $email, string $password)
    {
      $this->email = $email;
      $this->password = $password;

      $this->userModel= new UserModel($email,$password);
     
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
    //generer une chaine de caractére des erreurs
    function getErrors(){
        //declaration d'un tableau d'erreurs
        $errors= [];
        if(!($this->isEmailValid())){ //si l'email n'est pas valide
            //ajouter l'erreur au tableau
            array_push($errors, "emailError=InputInvalid");
        }

        if(!($this->isPasswordValid())){ // si le mdp n'est pas valide
            //ajouter l'erreur au tableau
            array_push($errors, "passwordError=InputInvalid");            
        }

        //retourner la chaine de caractére des erreurs
        return join("&", $errors);
        //emailError=InputInvalid&passwordError=InputInvalid
    }


    
    function signupUser()
    {
    //save des infos dans les BD

    $userModel = new UserModel($this->email,$this->password);
    
    $userModel->addToDB();
    

    }

    //.get the value of email
    public function getEmail(){
      return $this->email;
    }
    /**
     * set the value of email
     * @return self
     */

     public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 

    public function setPassword($password){
      $this->password = $password;
      return $this;
    }

    function exist()
    {

    $userModel = New UserModel($this->email,$this->password);
        //recup le tableau des info de user
    //user tab contient le tableau des info du user et fetch les cherchers

    $userTab = $userModel ->fetch();
    
    

    // //si le tableau est vide donc le user n'exist pas
    if(count($userTab) === 0){
      return false;
    }else{ // cas ou user exist bel et bien

      //enregistrer les info de user afin de creer sa session
      $this->id = $userTab['id'];
      if ($userTab['avatarURL'] == null){
            $this->avatarURL = "./images/users/profil-avatar.jpg";
         }else{
            $this->avatarURL = $userTab['avatarURL'];
        }
      $this->role = $userTab['role'];


      return true;
    };
    }
    
    function isPasswordCorrect(){

      $userModel = New UserModel($this->email,$this->password);
        //recup le tableau des info de user
    //user tab contient le tableau des info du user et fetch les cherchers

    $userTab = $userModel ->fetch();
    
    return $userTab['password'] === $this->password;

    }


    static function createUserFromId($id){

          $userFromDB = UserModel::fetchByID($id);
          $controller = new self($userFromDB['email'], $userFromDB['password']);
          $controller -> id = $id;
          $controller -> role = $userFromDB['role'];
          $controller -> avatarURL = $userFromDB['avatarURL'];

          $controller ->todos = TodoController::fetchAll($id); 

          return $controller;
      }


      function saveImage($avatar){
          $this-> userModel-> saveImageToDB($avatar);
          return $avatar;
      }

      function addTodo($todo){
            $todoController = new TodoController($todo, $this->id);
            $todoController->addTodo();
        }  
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of avatarURL
     */ 
    public function getAvatarURL()
    {
        return $this->avatarURL;
    }

    /**
     * Set the value of avatarURL
     *
     * @return  self
     */ 
    public function setAvatarURL($avatarURL)
    {
        $this->avatarURL = $avatarURL;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
    /**
     * Get the value of todos
     */ 
    public function getTodos()
    {
        return $this->todos;
    }

     function validateTodo($todoID){
        TodoController::validateTodo($todoID);
    }
    
     function removeTodo($todoID){
        TodoController::removeTodo($todoID);
    }
} 
    
    
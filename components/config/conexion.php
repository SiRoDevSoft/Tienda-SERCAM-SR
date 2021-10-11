<?php
// Class Database{
 
//  private $server = "mysql:host=localhost;dbname=sitio";
//  private $username = "root";
//  private $password = "";
//  private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
//  protected $conecDB;
  
//  public function open(){
//       try{
//           $this->conecDB = new PDO($this->server, $this->username, $this->password, $this->options);
//           return $this->conecDB;
//       }
//       catch (PDOException $e){
//           echo "Hay algún problema en la conexión: " . $e->getMessage();
//       }

//  }

//  public function close(){
//         $this->conecDB = null;
//   }

// }

// $pdo = new Database();